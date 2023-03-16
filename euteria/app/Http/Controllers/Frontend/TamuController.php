<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DPRD\Tamu;
use App\Models\Utility\Kecamatan;
use App\Models\Utility\Provinsi;
use App\Traits\GRecaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TamuController extends Controller
{
    use GRecaptcha;

    public function index()
    {
        return view('frontend.tamu.index');
    }

    public function show_registrasi()
    {
        return view('frontend.tamu.register');
    }

    public function registrasi(Request $request)
    {
        DB::beginTransaction();
        try {
            $cek_captcha = $this->recaptcha_validation($request->input('g-recaptcha-response'));
        
            if (!$cek_captcha->success) {
                return redirect()->back()->with('error-message','Captcha Salah');
            }


            Tamu::create($request->all());
            DB::commit();
            return redirect()->route('index.tamu.index')->with('success-message','Registrasi Tamu Berhasil');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
    }
}
