<?php

namespace App\Http\Resources\v1\User\LikedSong;

use Illuminate\Http\Resources\Json\JsonResource;

class LikedSongResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'songs' => [
                'id' => $this->song->id,
                'name' => $this->song->name,
                'album' => [
                    'name' => $this->song->album->name,
                    'year' => $this->song->album->year,
                ],
                'artist' => [
                    'name' => $this->song->album->artist->name,
                    'description' => $this->song->album->artist->description,
                ],
            ],
        ];
    }
}
