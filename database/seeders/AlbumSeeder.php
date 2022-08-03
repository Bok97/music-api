<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    public function run()
    {
        Album::create([
            'artist_id' => 1,
            'name' => 'Justice',
            'year' => 2021,
        ]);

        Album::create([
            'artist_id' => 2,
            'name' => 'Shockwave',
            'year' => 2021,
        ]);

        Album::create([
            'artist_id' => 3,
            'name' => 'World Of Walker',
            'year' => 2021,
        ]);

        Album::create([
            'artist_id' => 4,
            'name' => 'Happier Than Ever',
            'year' => 2021,
        ]);

        Album::create([
            'artist_id' => 5,
            'name' => '2pac VS Eminem',
            'year' => 2021,
        ]);
    }
}
