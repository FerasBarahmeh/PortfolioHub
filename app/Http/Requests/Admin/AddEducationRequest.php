<?php

namespace App\Http\Requests\Admin;

use App\Rules\ValidDateRule;
use App\Rules\ValidYear;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddEducationRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'grade' => ['required', 'string', 'max:10'],
            'organisation_url' => ['required', 'url', 'max:255'],
            'organisation_name' => ['required', 'string', 'max:100'],
            'start_date' => ['required', new ValidYear],
            'finish_date' => ['required', new ValidYear],
        ];
    }
}
