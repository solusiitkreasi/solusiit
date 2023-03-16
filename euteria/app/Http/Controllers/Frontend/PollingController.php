<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Polling\Polling;
use App\Models\Polling\PollingAnswer;

use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PollingController extends Controller
{
    use Response;

    public function store(Request $request)
    {
        // session('ip_address'=>PollingAnswer::get_client_ip());
        // $cek = PollingAnswer::where('polling_id',$request->polling_id)->where('ip_address',PollingAnswer::get_client_ip())->get();
        
        if(session('ip_address'))
        {
            return $this->bad_request(['data'=>'Anda Sudah Melakukan Polling']);
        }
        
        $data = PollingAnswer::create($request->all());
        if($data)
        {
            session(['ip_address'=>PollingAnswer::get_client_ip()]);
            return $this->success();
        }

        return $this->bad_request();
    }

    public function question($polling_id)
    {
        $data =  Polling::with('polling_question')->find($polling_id);

        return $this->success(['data'=>$data]);

    }
}
