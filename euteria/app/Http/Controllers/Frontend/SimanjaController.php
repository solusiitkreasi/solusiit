<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Simanja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use GuzzleHttp;

class SimanjaController extends Controller
{
    public function index(Request $request, $simanja_slug)
    {

        
        $data = Simanja::index_simanja($simanja_slug);
        
        if($data);
        {
            $title = ucwords($simanja_slug);
            if($simanja_slug == 'video')
            {
                $data = Simanja::index_simanja($simanja_slug,$request->page);        
                if($data==null)
                {
                    return redirect()->route('simanja.index',$simanja_slug);
                }

                
            }
            return view('frontend.simanja.index.'.$simanja_slug,compact(['data','title']));
        }

        return redirect()->route('index.menu',$simanja_slug);
    }

    public function show($simanja_slug,$simanja_sub_slug)
    {

        $master_data = Simanja::index_simanja($simanja_slug);
        if($master_data);
        {
            $filter_master_data = array_filter($master_data,function($value,$key) use ($simanja_sub_slug){
                return Str::slug($value->nama_master) == $simanja_sub_slug;
            },ARRAY_FILTER_USE_BOTH);
            $filter_master_data = array_values($filter_master_data);

            
            $ms_master_id = $filter_master_data[0]->ms_master_id;
            
            $data = Simanja::akd([
                'ms_master_id'=>$ms_master_id
            ]);
            
            $title = $filter_master_data[0]->nama_master;
            
            return view('frontend.simanja.show.'.$simanja_slug,compact(['data','title']));
        }
        
        return redirect()->route('index.menu',$simanja_slug);
    }
}
