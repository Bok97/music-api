<?php

namespace App\Http\Requests\v1\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResendEmailVerificationCodeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => ['required', 'string', 'in:register,updateEmail,forgotPassword'],
            'email' => ['required', 'string', 'exists:users,email'],
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'Invalid email!',
        ];
    }
}
