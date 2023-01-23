<?php

namespace App\Http\Controllers;

use App\BasicExtended;
use App\BasicExtra;
use App\Language;
use App\Menu;
use App\PaymentGateway;
use Illuminate\Http\Request;
use Artisan;
use ZipArchive;

class UpdateController extends Controller
{
    public function version()
    {
        return view('updater.version');
    }

    public function recurse_copy($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    @copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    public function upversion()
    {
        $assets = array(
            ['path' => 'assets/admin/js', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'assets/admin/css', 'type' => 'folder', 'action' => 'replace'],

            ['path' => 'assets/front/css', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'assets/front/js', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'assets/front/fonts', 'type' => 'folder', 'action' => 'replace'],

            ['path' => 'assets/user/css', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'assets/user/js', 'type' => 'folder', 'action' => 'replace'],

            ['path' => 'core/config', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'core/database/migrations', 'type' => 'folder', 'action' => 'add'],
            ['path' => 'core/resources/views', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'core/routes/web.php', 'type' => 'file', 'action' => 'replace'],
            ['path' => 'core/app', 'type' => 'folder', 'action' => 'replace'],

            ['path' => 'version.json', 'type' => 'file', 'action' => 'replace'],
            ['path' => 'sw.js', 'type' => 'file', 'action' => 'replace']
        );

        foreach ($assets as $key => $asset) {
            // if updater need to replace files / folder (with/without content)
            if ($asset['action'] == 'replace') {
                if ($asset['type'] == 'file') {
                    @copy('updater/' . $asset["path"], $asset["path"]);
                }
                if ($asset['type'] == 'folder') {
                    @unlink($asset["path"]);
                    $this->recurse_copy('updater/' . $asset["path"], $asset["path"]);
                }
            }
            // if updater need to add files / folder (with/without content)
            elseif ($asset['action'] == 'add') {
                if ($asset['type'] == 'folder') {
                    $this->recurse_copy('updater/' . $asset["path"], $asset["path"]);
                }
            }
        }

        // // vendor replace
        // @rmdir('core/vendor');
        // $zip = new ZipArchive;
        // if ($zip->open('updater/vendor.zip') === TRUE) {
        //     $zip->extractTo('core/');
        //     $zip->close();
        // }

        // // bootstrap replace
        // @rmdir('core/bootstrap');
        // $zip = new ZipArchive;
        // if ($zip->open('updater/bootstrap.zip') === TRUE) {
        //     $zip->extractTo('core/');
        //     $zip->close();
        // }

        $this->updateLanguage();

        Artisan::call('config:clear');
        // run migration files
        Artisan::call('migrate');

        // $this->delete_directory('updater');

        \Session::flash('success', 'Updated successfully');
        return redirect('updater/success.php');
    }

    function delete_directory($dirname)
    {
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while ($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname . "/" . $file))
                    unlink($dirname . "/" . $file);
                else
                    $this->delete_directory($dirname . '/' . $file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }

    public function updateLanguage()
    {
        $langCodes = [];
        $languages = Language::all();
        foreach ($languages as $key => $language) {
            $langCodes[] = $language->code;
        }
        $langCodes[] = 'default';

        foreach ($langCodes as $key => $langCode) {
            // read language json file
            $data = file_get_contents('core/resources/lang/' . $langCode . '.json');

            // decode default json
            $json_arr = json_decode($data, true);


            // new keys
            $newKeywordsJson = file_get_contents('updater/language.json');
            $newKeywords = json_decode($newKeywordsJson, true);
            foreach ($newKeywords as $key => $newKeyword) {
                // # code...
                if (!array_key_exists($key, $json_arr)) {
                    $json_arr[$key] = $key;
                }
            }

            // push the new key-value pairs in language json files
            file_put_contents('core/resources/lang/' . $langCode . '.json', json_encode($json_arr));
        }
    }
}
