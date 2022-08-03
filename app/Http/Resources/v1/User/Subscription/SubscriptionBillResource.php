<?php

namespace App\Http\Resources\v1\User\Subscription;

use App\Utilities\Format\MoneyUtility;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionBillResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'totalAmount' => MoneyUtility::formatPriceToDecimal($this->paid_amount_cents),
            'paymentMethod' => $this->method,
            'subscription' => new SubscriptionResource($this->subscription),
        ];
    }
}
