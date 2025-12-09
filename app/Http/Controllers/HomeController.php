<?php

namespace App\Http\Controllers;

use App\Models\User;
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
     * Search user CV
     */
    public function usercv(Request $request) {
        $validated = $request->validate([
            'search' => 'required|string|alpha_num'
        ]);

        // Find user by username
        $username = $validated['search'];

        $user = User::whereUsername($username)->first();

        if (!$user) {
            return back()->with('FindError', 'User not found.');
        }

        return redirect()->route('landingcv', ['user' => $username]);
    }
    public function landingcv(User $user) {
        return view('homes.userscv', [
            'title' => "CV of " . $user->username,
            'user' => $user,
        ]);
    }
}
