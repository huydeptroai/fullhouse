<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|string',
            'category_name' => 'required|string',
            'category_name_1' => 'required|string',
            'category_name_2' => 'required|string'
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Category_id is required!',
            'category_id.string' => 'Category_id is string!',
            'category_name.required' => 'Category name is required!',
            'category_name.string' => 'Category name is string!',
            'category_name_1.required' => 'Category name 1 is required!',
            'category_name_1.string' => 'Category name 1 is string!',
            'category_name_2.required' => 'Category name 2 is required!',
            'category_name_2.string' => 'Category name 2 is string!'
        ];
    }
}