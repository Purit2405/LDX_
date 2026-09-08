<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display the public home page.
     */
    public function index()
    {
        return view('public.index');
    }
}