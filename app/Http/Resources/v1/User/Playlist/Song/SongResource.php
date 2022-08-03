<?php

namespace App\Http\Resources\v1\User\Playlist\Song;

use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->song->id,
            'name' => $this->song->name,
            'genre' => [
                'id' => $this->genre->id,
                'name' => $this->genre->name,
                'description' => $this->genre->description,
            ],
            'album' => [
                'id' => $this->song->album->id,
                'name' => $this->song->album->name,
                'year' => $this->song->album->year,
            ],
            'artist' => [
                'name' => $this->song->album->artist->name,
                'description' => $this->song->album->artist->description,
            ],
        ];
    }
}
