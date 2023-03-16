<?php

namespace App\Http\ViewComposers;

use App\Models\Backend\Setting;
use Illuminate\View\View;

class Header
{
    
    public function __construct()
    {

    }
        
    public function compose(View $view)
    {
        
        //setting
        $settings = Setting::get();
        if(count($settings))
        {
            foreach($settings as $row){            
                $setting[$row->name] = $row->value;
            }
            $setting = (object) $setting;
        }
        else{
            $setting = null;
        }

        $view->with([
            'setting' => $setting            
        ]);
    }
}
