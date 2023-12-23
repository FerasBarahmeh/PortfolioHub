<?php

namespace App\Http\Requests\Admin;

use App\Models\DomainsSocialMedia;
use App\Rules\HexColor;
use App\Rules\ValidDomain;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DomainSocialMediaRequest extends FormRequest
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
            'domain' => ['required', new ValidDomain, Rule::unique(DomainsSocialMedia::class)],
            'icon_name' => ['required', Rule::unique(DomainsSocialMedia::class)],
            'hex_color' => ['required', new HexColor(), Rule::unique(DomainsSocialMedia::class)]
        ];
    }
}
