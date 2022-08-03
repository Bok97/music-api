<?php

namespace Database\Seeders;

use App\Models\Playlist;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    public function run()
    {
        Playlist::create([
            'user_id' => 1,
            'genre_id' => 1,
        ]);
        Playlist::create([
            'user_id' => 1,
            'genre_id' => 2,
        ]);
    }
}
