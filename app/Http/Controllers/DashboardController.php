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
        // Check if user has verified their email
        if (!Auth::user()->hasVerifiedEmail()) {
            session()->flash('NotVerify', 'Please verify your email to access all our features.');
        }
        
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'user' => Auth::user(),
        ]);
    }
}
