<?php

namespace App\Http\Resources\v1\User\Playlist;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PlaylistCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $returnCollections = [];
        if (count($this->collection) > 0) {
            $returnCollections = $this->collection->map(function ($playlist) {
                return new PlaylistResource($playlist);
            });
        }
        return $returnCollections;
    }
}
