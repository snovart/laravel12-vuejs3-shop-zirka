<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display the main page.
     */
    public function index()
    {
        // Render main Blade view
        return view('front.main');
    }
}
