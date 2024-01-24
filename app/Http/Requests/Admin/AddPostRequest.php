<?php

namespace App\Http\Requests\Admin;

use App\Models\PostTranslation;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddPostRequest extends FormRequest
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
            'title' => ['required', Rule::unique(PostTranslation::class)],
            'content' => ['required'],
            'brief' => ['required', 'string', 'max:255'],
            'layout_img' => ['required', 'file', 'image', 'mimes:png,jpg,jpeg'],
        ];
    }
}
