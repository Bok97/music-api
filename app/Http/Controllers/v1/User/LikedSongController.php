<?php

namespace App\Http\Controllers\v1\User;

use App\Http\Controllers\ApiController;
use App\Http\Requests\v1\User\Song\SongRequest;
use App\Http\Services\v1\User\LikedSongService;

class LikedSongController extends ApiController
{
    public function index(LikedSongService $likedSongService)
    {
        return $likedSongService->index($this->user());
    }

    public function toggle(SongRequest $request, LikedSongService $likedSongService)
    {
        return $likedSongService->toggle($this->user(), $request->id);
    }
}
