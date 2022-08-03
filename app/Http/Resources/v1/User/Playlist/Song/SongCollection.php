<?php

namespace App\Http\Resources\v1\User\Playlist\Song;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SongCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $returnCollections = [];
        if (count($this->collection) > 0) {
            $returnCollections = $this->collection->map(function ($song) {
                return new SongResource($song);
            });
        }
        return $returnCollections;
    }
}
