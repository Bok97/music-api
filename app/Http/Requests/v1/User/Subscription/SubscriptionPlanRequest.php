<?php

namespace App\Http\Requests\v1\User\Subscription;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriptionPlanRequest extends FormRequest
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
            'id' => ['required', Rule::exists('subscription_plans')->where(function ($query) {
                return $query->where('status', 'active');
            }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Subscription plan not found',
        ];
    }
}
