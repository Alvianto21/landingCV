<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserAppearanceRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.editProfile', [
            'user' => $user,
            'title' => 'Edit Profile'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserAppearanceRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->update([
            'address' => $validated['address'],
            'bio' => $validated['bio'],
            'date_of_birth' => $validated['date_of_birth'],
            'educations' => json_encode($validated['educations']),
            'gender' => $validated['gender'],
            'phone_number' => $validated['phone_number'],
            'place_of_birth' => $validated['place_of_birth'],
            'skills' => $validated['skills'],
            'social_links' => json_encode($validated['social_links']),
            'work_experiences' => json_encode($validated['work_experiences'])            
        ]);

        return redirect(route('dashboard', absolute: false))->with('AppearanceSuccessUpdate', 'Update appearance successfull');
    }
}
