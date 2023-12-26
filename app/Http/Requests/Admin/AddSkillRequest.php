<?php

namespace App\Http\Requests\Admin;

use App\Enums\TypeSkill;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddSkillRequest extends FormRequest
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
            'type_skill' => ['required', Rule::enum(TypeSkill::class)],
            'name_skill' => ['required', 'max:50'],
            'icon_skill' => ['required', 'image', 'file', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
        ];
    }
}
