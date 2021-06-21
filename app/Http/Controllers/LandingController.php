<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('pages.p_landing');
    }

    public function guru()
    {
        return view('pages.p_guru');
    }
}
