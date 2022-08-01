<?php

namespace App\Http\Requests\v1\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
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
