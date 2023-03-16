<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\Seo;
use Illuminate\Http\Request;

class ResellerController extends Controller
{
    use Seo;

    public function __construct()
    {
        $this->keywords = ['morita','st morita'];
        $this->default_logo = asset('frontend/images/logo.png');
    }

    public function index(Request $request)
    {
        $kotas = [
            1 => 'Jakarta Pusat',
            2 => 'Jakarta Utara',
            3 => 'Jakarta Timur',
            4 => 'Jakarta Selatan',
            5 => 'Jakarta Barat',
        ];

        $this->meta('Beranda','Official website St Morita',$this->keywords,$this->default_logo);        
        return view('frontend.index.resellers.index', compact('kotas'));
    }
}
