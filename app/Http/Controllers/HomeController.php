<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show home page
     */
    public function index() {
        return view('homes.index', ['title' => 'Home Page']);
    }

    /**
     * Show user CV page
     */
    
}
