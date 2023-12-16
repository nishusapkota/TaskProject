<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'slug' => 'required|unique:questions,slug,' . $this->route('question')->id,
            'options' => 'required|array',
            'answer' => ['required', 'in:' . implode(',', request('options'))],
            'weightage' => 'required|numeric|min:10|max:20',
            'status' => 'nullable|boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'answer.in' => "answer must be one of the option",

        ];
    }
}
