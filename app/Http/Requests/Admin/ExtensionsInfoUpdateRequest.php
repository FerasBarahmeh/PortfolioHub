<?php

namespace App\Http\Requests\Admin;

use App\Rules\ValidDateRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ExtensionsInfoUpdateRequest extends FormRequest
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
            'job_title' => ['required', 'max:25',],
            'phone' => ['required', 'numeric', 'digits:10'],
            'BOD' => ['date', new ValidDateRule()],
            'location' => ['max:70'],
            'about' => ['max:255'],
        ];
    }
}
