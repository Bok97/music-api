<?php

namespace App\Http\Requests\v1\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class EmailVerificationCodeRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'Invalid email!',
        ];
    }
}
