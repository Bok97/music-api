<?php

namespace App\Http\Services\v1\User;

use App\Http\Resources\v1\User\LikedSong\LikedSongCollection;
use App\Models\LikedSong;
use App\Traits\ApiResponder;

class LikedSongService
{
    use ApiResponder;

    public function index($user)
    {
        $likedSongs = LikedSong::where('user_id', $user->id)->orderByDesc('created_at')->get();

        return $this->successResponse('Successfully retrived liked songs', new LikedSongCollection($likedSongs));
    }

    public function toggle($user, $songId)
    {
        $likedSong = LikedSong::where('song_id', $songId)->first();

        if (empty($likedSong)) {
            LikedSong::create([
                'song_id' => $songId,
                'user_id' => $user->id,
            ]);
        } else {
            $likedSong->delete();
        }
        return $this->successResponseWithMessageOnly('Successfully toggle liked song');
    }
}
