<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait GRecaptcha{

    public function site_key()
    {
        return '6LeMuCMbAAAAAEo0lY2emRDOJdZiTrpnxBpDbgAB';
    }

    public function secret_key()
    {
        return '6LeMuCMbAAAAAO3M_VPZ3uTjuuxNWI96wcO0HwsX';
    }

    public function validation_url()
    {
        return 'https://www.google.com/recaptcha/api/siteverify';
    }


    public function recaptcha_validation($response)
    {
        $data = Http::asForm()->post($this->validation_url(),[
            'secret'=>$this->secret_key(),
            'response'=>$response
        ]);

        $data = json_decode($data);

        return $data;
    }



}