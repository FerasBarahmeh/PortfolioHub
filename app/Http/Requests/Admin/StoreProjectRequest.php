<?php

namespace App\Http\Requests\Admin;

use App\Models\Project;
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
            'name_project' => ['required', 'string', 'min:3', 'max:30', Rule::unique(Project::class)],
            'github_url' => ['required', 'url', 'max:255'],
            'finish_date' => ['required', 'date', new ValidDateRule()],
            'discretion' => ['required', 'max:255'],
            'project_images' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'service_id.required' => 'Please provide the necessary service information.',
            'service_id.numeric|service_id.gt' => 'can\'t find this service in our database.',
            'service_id.exists' => 'The selected service is not recognized. Please check and try again.',

            'name_project.required' => 'Please enter a name for your project.',
            'name_project.string' => 'The project name should be a valid text.',
            'name_project.min' => 'The project name should have at least :min characters.',
            'name_project.max' => 'The project name should not exceed :max characters.',
            'name_project.unique' => 'This project name is already in use. Please choose a different one.',

            'github_url.required' => 'Please provide a valid GitHub URL for your project.',
            'github_url.url' => 'The GitHub URL should be a valid web address.',
            'github_url.max' => 'The GitHub URL should not exceed :max characters.',

            'finish_date.required' => 'Please select a realistic finish date for your project.',
            'finish_date.date' => 'The finish date should be a valid date.',
            'finish_date.valid_date' => 'The finish date should be set in the future for ongoing projects.',

            'discretion.required' => 'Please provide additional details or notes about your project in the discretion field.',
            'discretion.max' => 'The provided information should not exceed :max characters.',

            'project_images.required' => 'Please upload at least one image to showcase your project.',
        ];
    }

}
