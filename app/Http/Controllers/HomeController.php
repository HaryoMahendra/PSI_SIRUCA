<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function dashboard()
    {
        $activeMenu = 'dashboard';      
        return view('dashboard', compact('activeMenu'));
    }
}
