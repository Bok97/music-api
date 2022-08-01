<?php

namespace App\Http\Requests\v1\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'updateType' => ['required', 'string', 'in:email,name,phone,password,address'],
            'email' => ['nullable', 'required_if:updateType,==,email', 'string', 'unique:users,email,' . $this->user()->id],
            'name' => ['nullable', 'required_if:updateType,==,name', 'string'],
            'phone' => ['nullable', 'required_if:updateType,==,phone', 'string', 'unique:users,phone,' . $this->user()->id],
            'currentPassword' => ['nullable', 'required_if:updateType,==,password', 'string'],
            'newPassword' => ['nullable', 'required_if:updateType,==,password', 'string', 'different:currentPassword'],
            'confirmPassword' => ['nullable', 'required_if:updateType,==,password', 'string', 'same:newPassword'],
            'addressOne' => ['nullable', 'required_if:updateType,==,address', 'string'],
            'addressTwo' => ['nullable', 'required_if:updateType,==,address', 'string'],
            'postcode' => ['nullable', 'required_if:updateType,==,address', 'string'],
            'city' => ['nullable', 'required_if:updateType,==,address', 'string'],
            'state' => ['nullable', 'required_if:updateType,==,address', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'This email is registered by other user!',
            'phone.unique' => 'This phone is registered by other user!',
        ];
    }
}
