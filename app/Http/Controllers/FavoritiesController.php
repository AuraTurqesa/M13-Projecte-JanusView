<?php

namespace App\Http\Controllers;
use Illuminate\View\View;

use Illuminate\Http\Request;

class FavoritiesController extends Controller
{
    public function index(): View 
    {
        return view('favorities.index');
    }
}
