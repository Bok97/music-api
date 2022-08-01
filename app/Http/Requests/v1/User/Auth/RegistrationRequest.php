<?php

namespace App\Http\Requests\v1\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => ['required', 'string'],
            'confirmPassword' => ['required', 'same:password'],
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'This email is registered!',
            'confirmPassword.same' => 'Confirm password is not same as password!',
        ];
    }
}
