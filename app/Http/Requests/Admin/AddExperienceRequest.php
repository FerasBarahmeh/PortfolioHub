<?php

namespace App\Http\Requests\Admin;

use App\Rules\ValidDateRule;
use App\Rules\ValidYear;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddExperienceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name_organisation' => ['required', 'max:70'],
            'organisation_url' => ['required', 'url', 'max:255'],
            'join_date' => ['required', new ValidYear],
            'leave_date' => ['required', new ValidYear],
            'career_title' => ['required', 'string', 'max:100'],
            'job_description' => ['required', 'string', 'max:200'],
        ];
    }
}
