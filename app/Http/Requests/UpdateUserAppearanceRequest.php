<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserAppearanceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bio' => ['required', 'string', 'max:400'],
            'skills' => ['required', 'string', 'max:400'],
            'gender' => ['required', 'string', 'in:male,female'],
            'address' => ['required', 'string', 'max:500'],
            'phone_number' => ['required', 'numeric', 'digits_between:10,13'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'social_links' => ['required', 'array', 'min:1'],
            'social_links.*.platform' => ['required', 'string', 'in:x,github,linkedin'],
            'social_links.*.link' => ['required', 'url'],
            'educations' => ['required', 'array', 'min:1'],
            'educations.*.institution' => ['required', 'string', 'max:255'],
            'educations.*.degree' => ['required', 'string', 'max:200'],
            'educations.*.start_date' => ['required', 'date', 'before:educations.*.end_date'],
            'educations.*.end_date' => ['required', 'date', 'after:educations.*.start_date'],
            'educations.*.link' => ['nullable', 'url'],
            'work_experiences' => ['required', 'array', 'min:1'],
            'work_experiences.*.company' => ['required', 'string', 'max:300'],
            'work_experiences.*.position' => ['required', 'string', 'max:255'],
            'work_experiences.*.start_date' => ['required', 'date', 'before:work_experiences.*.end_date'],
            'work_experiences.*.end_date' => ['nullable', 'date', 'after:work_experiences.*.start_date'],
            'work_experiences.*.description' => ['required', 'string', 'max:300']
        ];
    }
}
