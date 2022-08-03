<?php

namespace App\Http\Resources\v1\User\Subscription;

use App\Utilities\Format\MoneyUtility;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionPlanResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'days' => $this->number_of_days,
            'price' => MoneyUtility::formatPriceToDecimal($this->price_cents),
        ];
    }
}
