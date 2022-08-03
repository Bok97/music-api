<?php

namespace App\Http\Resources\v1\User\Subscription;

use App\Utilities\Format\DateTimeUtility;
use App\Utilities\Format\MoneyUtility;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->subscriptionPlan->title,
            'description' => $this->subscriptionPlan->description,
            'days' => $this->subscriptionPlan->number_of_days,
            'startOn' => DateTimeUtility::formatDateTimeToExtractMonth($this->start_at),
            'endOn' => DateTimeUtility::formatDateTimeToExtractMonth($this->end_at),
            'price' => MoneyUtility::formatPriceToDecimal($this->subscriptionPlan->price_cents),
            'status' => $this->status,
        ];
    }
}
