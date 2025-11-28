<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebInfoController extends Controller
{
    public function index(): View 
    {
        return view('web_info.index');
    }
}
