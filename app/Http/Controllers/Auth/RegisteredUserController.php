<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('login.register', ['title' => 'Register Page']);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'username' => ['required', 'string', 'alpha_num', 'lowercase', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_picture' => ['required', 'image', 'mimes:png,jpg,svg', 'max:2048'],
            'address' => ['required', 'string', 'max:500'],
            'gender' => ['required', 'string', 'in:male,female'],
            'phone_number' => ['required', 'numeric', 'digits_between:10,13'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'skills' => ['required', 'string', 'max:400'],
            'social_links' => ['required', 'array', 'min:1'],
            'social_links.*.platform' => ['required', 'string', 'in:x,github,linkedin'],
            'social_links.*.link' => ['required', 'url'],
            'bio' => ['string', 'max:400'],
            'educations' => ['required', 'array', 'min:1'],
            'educations.*.institution' => ['required', 'string', 'max:255'],
            'educations.*.degree' => ['required', 'string', 'max:200'],
            'educations.*.start_date' => ['required', 'date', 'before:end_date'],
            'educations.*.end_date' => ['required', 'date', 'after:start_date'],
            'educations.*.link' => ['nullable', 'url'],
            'work_experiences' => ['required', 'array', 'min:1'],
            'work_experiences.*.company' => ['required', 'string', 'max:300'],
            'work_experiences.*.position' => ['required', 'string', 'max:255'],
            'work_experiences.*.start_date' => ['required', 'date', 'before:end_date'],
            'work_experiences.*.end_date' => ['nullable', 'date', 'after:start_date'],
            'work_experiences.*.description' => ['required', 'string', 'max:300']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'profile_picture' => $request->file('profile_picture')->store('profile-pictures', 'public'),
            'address' => $request->address,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'skills' => $request->skills,
            'sosial_links' => json_encode($request->social_links),
            'bio' => $request->bio,
            'educations' => json_encode($request->educations),
            'work_experiences' => json_encode($request->work_experiences)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
