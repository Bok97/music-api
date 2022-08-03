<?php

namespace App\Http\Resources\v1\User\Subscription;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SubscriptionPlanCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $returnCollections = [];
        if (count($this->collection) > 0) {
            $returnCollections = $this->collection->map(function ($plan) {
                return new SubscriptionPlanResource($plan);
            });
        }
        return $returnCollections;
    }
}
