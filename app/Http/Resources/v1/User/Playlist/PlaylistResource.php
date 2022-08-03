<?php

namespace App\Http\Resources\v1\User\Playlist;

use App\Http\Resources\v1\User\Playlist\Song\SongCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'genres' => [
                'name' => $this->genre->name,
                'description' => $this->genre->description,
            ],
            'songs' => new SongCollection($this->genre->songGenres),
        ];
    }
}
