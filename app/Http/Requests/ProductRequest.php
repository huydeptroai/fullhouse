<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_id' => [
                'required',
                'string'
            ],
            'product_name' => [
                'required',
                'string'
            ],
            'product_description' => [
                'required',
                'string'
            ],
            'image' => [
                'required',
                'mimes:jpeg,png,jpg,gif',
                'max:2048'
            ]
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Product_id is required!',
            'product_id.string' => 'Product_id is string!',
            'product_name.required' => 'Product name is required!',
            'product_name.string' => 'Product name is string!',
            'product_description.required' => 'Product description is required!',
            'product_description.string' => 'Product description is string!',
            'image.required' => 'Image is required!',
            'image.max' => 'Image is maximum 2048!',
            'image.mimes' => 'Product_name must be jpeg,png,jpg,gif',
        ];
    }
}