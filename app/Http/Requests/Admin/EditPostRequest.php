<?php

namespace App\Http\Requests\Admin;

use App\Models\PostTranslation;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditPostRequest extends FormRequest
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
        $id = $this->route('post');
        return [
            'title' => ['required', Rule::unique(PostTranslation::class)->ignore($id)],
            'content' => ['required'],
            'brief' => ['required', 'string', 'max:255'],
        ];
    }
}
