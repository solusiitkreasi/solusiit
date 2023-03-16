<?php

namespace App\Http\Controllers;

use App\Models\Backend\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{    
    public function index(Request $request)
    {
        return view('backend.dashboard.index');
    }
}
