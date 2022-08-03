<?php

namespace App\Http\Resources\v1\User\Subscription;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SubscriptionBillCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $returnCollections = [];
        if (count($this->collection) > 0) {
            $returnCollections = $this->collection->map(function ($bill) {
                return new SubscriptionBillResource($bill);
            });
        }
        return $returnCollections;
    }
}
