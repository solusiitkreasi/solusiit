<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DPRD\Aspirasi;
use App\Models\Utility\Kecamatan;
use App\Traits\Response;
use App\Traits\GRecaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AspirasiController extends Controller
{
    use Response;
    use GRecaptcha;

    public function store(Request $request)
    {
        
        $cek_captcha = $this->recaptcha_validation($request->input('g-recaptcha-response'));
        
        if (!$cek_captcha->success) {
            return $this->bad_request(['data'=>'Captcha Salah']);
        }
        
        $kecamatan = Kecamatan::find($request->ms_kecamatan_id);

        $request->merge([
            'ms_kota_id'=>$kecamatan->ms_kota_id,
            'ms_provinsi_id'=>$kecamatan->ms_provinsi_id
        ]);

        Aspirasi::create($request->all());

        return $this->success();
    }
}
