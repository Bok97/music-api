<?php

namespace App\Http\Services\v1\User;

use App\Http\Resources\v1\User\Playlist\PlaylistCollection;
use App\Http\Resources\v1\User\Playlist\PlaylistResource;
use App\Http\Resources\v1\User\Playlist\RecommendationCollection;
use App\Models\Playlist;
use App\Models\SongGenre;
use App\Traits\ApiResponder;

class PlaylistService
{
    use ApiResponder;

    public function index($user)
    {
        $playlists = $user->playlists()->orderByDesc('created_at')->get();

        return $this->successResponse('Successfully retrived playlists', new PlaylistCollection($playlists));
    }

    public function show($id)
    {
        return $this->successResponse('Successfully retrived playlist details', new PlaylistResource(Playlist::find($id)));
    }

    public function toggle($user, $genreId)
    {
        $playlist = Playlist::where('genre_id', $genreId)->first();

        if (empty($playlist)) {
            Playlist::create([
                'genre_id' => $genreId,
                'user_id' => $user->id,
            ]);
        } else {
            $playlist->delete();
        }
        return $this->successResponseWithMessageOnly('Successfully toggle playlist');
    }

    public function recommendation($user)
    {
        $historySongs = $user->histories->pluck('song_id')->toArray();

        $likedSongs = $user->likedSongs->pluck('song_id')->toArray();

        $songs = array_unique(array_merge($historySongs, $likedSongs));

        $arrayIds = SongGenre::whereIn('song_id', $songs)->pluck('genre_id')->unique()->toArray();

        $genreIds = array_values($arrayIds);

        $recommendationSongs = SongGenre::whereNotIn('song_id', $songs)->whereIn('genre_id', $genreIds)->inRandomOrder()->limit(20)->get();

        return $this->successResponse('Successfully retrived playlist recommendations', new RecommendationCollection($recommendationSongs));
    }
}
