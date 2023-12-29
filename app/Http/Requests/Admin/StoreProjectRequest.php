<?php

namespace App\Http\Requests\Admin;

use App\Models\Service;
use App\Rules\ValidDateRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
            'service_id' => ['required', 'numeric', 'gt:0', Rule::exists(Service::class, 'id')],
            'name_project' => ['required', 'string', 'min:4', 'max:30'],
            'github_url' => ['required', 'url', 'max:255'],
            'finish_date' => ['required', 'date', new ValidDateRule()],
            'discretion' => ['required', 'max:255'],
        ];
    }
}
