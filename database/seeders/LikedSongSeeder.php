<?php

namespace Database\Seeders;

use App\Models\LikedSong;
use Illuminate\Database\Seeder;

class LikedSongSeeder extends Seeder
{
    public function run()
    {
        $likedSongs = array(
            array('song_id' => 6),
            array('song_id' => 7),
            array('song_id' => 8),
            array('song_id' => 9),
            array('song_id' => 15),
        );

        foreach ($likedSongs as $data) {
            LikedSong::create([
                'user_id' => 1,
                'song_id' => $data['song_id'],
            ]);
        }
    }
}
