<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ArtistSeeder::class,
            AlbumSeeder::class,
            GenreSeeder::class,
            SongSeeder::class,
            SongGenreSeeder::class,
            PlaylistSeeder::class,
            HistorySeeder::class,
            LikedSongSeeder::class,
        ]);
    }
}
