<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\v1\User\Genre\GenreRequest;
use App\Http\Requests\v1\User\Playlist\PlaylistRequest;
use App\Http\Services\v1\User\PlaylistService;

class PlaylistController extends ApiController
{
    public function index(PlaylistService $playlistService)
    {
        return $playlistService->index($this->user());
    }

    public function show(PlaylistRequest $request, PlaylistService $playlistService)
    {
        return $playlistService->show($request->id);
    }

    public function toggle(GenreRequest $request, PlaylistService $playlistService)
    {
        return $playlistService->toggle($this->user(), $request->id);
    }

    public function recommendation(PlaylistService $playlistService)
    {
        return $playlistService->recommendation($this->user());
    }
}
