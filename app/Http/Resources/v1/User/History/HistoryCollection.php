<?php

namespace App\Http\Resources\v1\User\History;

use Illuminate\Http\Resources\Json\ResourceCollection;

class HistoryCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $returnCollections = [];
        if (count($this->collection) > 0) {
            $returnCollections = $this->collection->map(function ($history) {
                return new HistoryResource($history);
            });
        }
        return $returnCollections;
    }
}
