<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:50',
            'password' => 'required|string|min:2|max:50',
            'confirm' => 'required|same:password',
            'email' => 'required|email|unique:accounts,email',
            'phone' => 'required|string|min:8|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Username is required!',
            'name.min' => 'username is minimum 2 characters',
            'name.max' => 'username is maximum 50 characters',
            'password.required' => 'Password is required!',
            'password.min' => 'Password is minimum 2 characters',
            'password.max' => 'Password is maximum 50 characters',
            'confirm.required' => 'Confirm is required!',
            'confirm.sam' => 'Password and Confirm must be the same!',
            'email.required' => 'Email is required!',
            'email.email' => 'Email must be right format!',
            'email.unique' => 'Email is duplicated!',
            'phone.required' => 'Phone is required!',
            'phone.min' => 'Phone is minimum 8 number!',
            'phone.max' => 'Phone is maximum 10 number!',
        ];
    }
}
