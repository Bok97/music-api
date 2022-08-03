<?php

namespace Database\Seeders;

use App\Models\SongGenre;
use Illuminate\Database\Seeder;

class SongGenreSeeder extends Seeder
{
    public function run()
    {
        $songs = array(
            array('genre_id' => 1, 'song_id' => 1),
            array('genre_id' => 1, 'song_id' => 2),
            array('genre_id' => 1, 'song_id' => 3),
            array('genre_id' => 1, 'song_id' => 4),
            array('genre_id' => 1, 'song_id' => 5),
            array('genre_id' => 1, 'song_id' => 10),
            array('genre_id' => 1, 'song_id' => 11),
            array('genre_id' => 1, 'song_id' => 12),
            array('genre_id' => 1, 'song_id' => 13),
            array('genre_id' => 1, 'song_id' => 14),

            array('genre_id' => 2, 'song_id' => 6),
            array('genre_id' => 2, 'song_id' => 7),
            array('genre_id' => 2, 'song_id' => 8),
            array('genre_id' => 2, 'song_id' => 9),
            array('genre_id' => 2, 'song_id' => 15),
            array('genre_id' => 2, 'song_id' => 16),
            array('genre_id' => 2, 'song_id' => 17),
            array('genre_id' => 2, 'song_id' => 18),
            array('genre_id' => 2, 'song_id' => 19),
            array('genre_id' => 2, 'song_id' => 20),

            array('genre_id' => 3, 'song_id' => 21),
            array('genre_id' => 3, 'song_id' => 31),
            array('genre_id' => 3, 'song_id' => 22),
            array('genre_id' => 3, 'song_id' => 32),
            array('genre_id' => 3, 'song_id' => 23),
            array('genre_id' => 3, 'song_id' => 24),
            array('genre_id' => 3, 'song_id' => 25),
            array('genre_id' => 3, 'song_id' => 30),
            array('genre_id' => 3, 'song_id' => 33),
            array('genre_id' => 3, 'song_id' => 34),

            array('genre_id' => 4, 'song_id' => 50),
            array('genre_id' => 4, 'song_id' => 34),
            array('genre_id' => 4, 'song_id' => 38),
            array('genre_id' => 4, 'song_id' => 29),
            array('genre_id' => 4, 'song_id' => 28),
            array('genre_id' => 4, 'song_id' => 50),
            array('genre_id' => 4, 'song_id' => 37),
            array('genre_id' => 4, 'song_id' => 36),
            array('genre_id' => 4, 'song_id' => 48),
            array('genre_id' => 4, 'song_id' => 49),
        );

        foreach ($songs as $data) {
            SongGenre::create([
                'genre_id' => $data['genre_id'],
                'song_id' => $data['song_id'],
            ]);
        }
    }
}
