<?php

namespace App\Http\Requests\v1\User\Subscription;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SubscriptionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge(['id' => $this->route('id')]);
    }

    public function rules()
    {
        return [
            'id' => ['required', Rule::exists('subscriptions')->where(function ($query) {
                return $query->where('user_id', Auth::id());
            }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Subscription not found',
        ];
    }
}
