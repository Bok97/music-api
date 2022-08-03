<?php

namespace App\Http\Resources\v1\User\Playlist;

use App\Http\Resources\v1\User\Playlist\Song\SongResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecommendationCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $returnCollections = [];
        if (count($this->collection) > 0) {
            $returnCollections = $this->collection->map(function ($recommendation) {
                return new SongResource($recommendation);
            });
        }
        return $returnCollections;
    }
}
