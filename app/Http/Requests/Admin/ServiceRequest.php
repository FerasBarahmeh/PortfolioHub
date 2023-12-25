<?php

namespace App\Http\Requests\Admin;

use App\Models\Service;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
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
            'name_service' => ['required', 'max:35', Rule::unique(Service::class)],
            'description' => ['required', 'max:100'],
            'image_service' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],

        ];
    }
}
