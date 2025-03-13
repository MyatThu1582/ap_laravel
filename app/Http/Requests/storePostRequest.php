<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title"=> "required|unique:posts|max:255",
            "description"=> "required|max:255",
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'title.unique:posts' => 'A message is required',
            'title.max:255' => 'A title is too long',
            'description.required' => 'A description is required',
            'description.max:255' => 'A description is too long',
        ];
    }
}
