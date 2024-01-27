<?php

namespace App\Http\Requests\Admin;

use App\Enums\TypeSkill;
use App\Models\SkillTranslation;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditSkillRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'type_skill' => ['required', Rule::enum(TypeSkill::class)],
            'name_skill' => ['required', 'max:50',  Rule::unique(SkillTranslation::class)->ignore($id)],
        ];
    }
}
