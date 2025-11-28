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
        ]);
    }
}
