<?php

use App\Models\Backend\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Setting::list() as $row) {
            Setting::create([
                'name'=>Str::slug($row['name'],'_'),
                'display_name'=>$row['display_name'],
                'form'=>$row['form'],
                'type'=>$row['type'],
                'icon'=>$row['icon'],
                'status'=>$row['status'],
                'value'=>$row['value'],
            ]);
        }
    }
}
