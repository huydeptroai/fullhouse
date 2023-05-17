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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => [
                'required',
                'string'
            ],
            'category_name' => [
                'required',
                'string'
            ],
            'category_description' => [
                'string'
            ],
            'image' => [
                'required',
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
            ]
        ];
    }
}
