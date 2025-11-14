<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     */
    public function index() {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'user' => Auth::user(),
            'links' => json_decode(Auth::user()->sosial_links, true),
            'works' => json_decode(Auth::user()->work_experiences, true),
            'educations' => json_decode(Auth::user()->educations, true)
        ]);
    }
}
