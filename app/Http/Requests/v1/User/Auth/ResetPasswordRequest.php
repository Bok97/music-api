<?php

namespace App\Http\Requests\v1\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => ['required', 'string', 'exists:users,email'],
            'verificationCode' => ['required', 'integer'],
            'password' => ['required', 'string'],
            'confirmPassword' => ['required', 'same:password'],
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'Invalid email!',
            'confirmPassword.same' => 'Confirm password is not same as password!',
        ];
    }
}
