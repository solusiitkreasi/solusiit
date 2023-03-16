<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Setting;
use App\Traits\Response;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    use Response;
    use Upload;

    public function __construct()
    {
        
        $this->middleware('role:superadmin',['only'=>['create']]);
    }

    public function index()
    {
        $setting = Setting::get();
        $data=[];
        foreach($setting as $row)
        {
            $data[$row->name] = $row->value;
        }
        return view('backend.setting.index',compact(['data']));
    }

    public function store(Request $request)
    {     
        
        if($request->has('new_setting'))
        {
            DB::beginTransaction();
            try {
                $request->merge([
                    'name'=>Str::slug($request->display_name,'_'),
                    'icon'=>'fa fa-file'
                ]);
                Setting::create($request->all());
                DB::commit();
                return redirect()->route('admin.setting.index');
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->with('error-message',$e->getMessage());
            }
            
        }else{
            foreach($request->all() as $key=>$row)
            {
                if($key != '_token')
                {
                    $name = $key;
                    $value = $row;
                    /* JIKA IMAGE */
                    if(is_uploaded_file($request->$key))
                    {
                        $name = str_replace('file_','',$key);
                        $value = $this->upload($request->$key, 'image/setting', str_replace('file_','',$key).'_'.strtotime('now'));                    
                        $value = $value['file_name'];
    
                    }
                    
    
                    $data = Setting::where('name',$name)->first();
                    if($data)
                    {
                        $data->update(['value'=>$value]);   
                    }
                }
            }
            
            return $this->success();

        }

    }

    public function get_setting()
    {
        $data = Setting::get();

        return $this->success(['data'=>$data]);
    }


    public function create()
    {
        $data = null;
        return view('backend.setting.form',compact(['data']));
    }

    
}
