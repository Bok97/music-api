<?php

namespace App\Http\Resources\v1\User\LikedSong;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LikedSongCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $returnCollections = [];
        if (count($this->collection) > 0) {
            $returnCollections = $this->collection->map(function ($likedsong) {
                return new LikedSongResource($likedsong);
            });
        }
        return $returnCollections;
    }
}
