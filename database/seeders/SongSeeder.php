<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    public function run()
    {
        $songs = array(
            array('album_id' => '1', 'name' => '2 Much'),
            array('album_id' => '1', 'name' => 'Deserve You'),
            array('album_id' => '1', 'name' => 'As I Am'),
            array('album_id' => '1', 'name' => 'Off My Face'),
            array('album_id' => '1', 'name' => 'Holy'),
            array('album_id' => '1', 'name' => 'Unstable'),
            array('album_id' => '1', 'name' => 'Die for You'),
            array('album_id' => '1', 'name' => 'Anyone'),
            array('album_id' => '1', 'name' => 'Loved by You'),
            array('album_id' => '1', 'name' => 'Lonely'),

            array('album_id' => '2', 'name' => 'Fairytale'),
            array('album_id' => '2', 'name' => 'Supernovacane'),
            array('album_id' => '2', 'name' => 'Jiggle it'),
            array('album_id' => '2', 'name' => 'Back It Up'),
            array('album_id' => '2', 'name' => 'Back In Time'),
            array('album_id' => '2', 'name' => 'House Party'),
            array('album_id' => '2', 'name' => 'Pushin Stacks'),
            array('album_id' => '2', 'name' => 'Hitta'),
            array('album_id' => '2', 'name' => 'Candy Kid'),
            array('album_id' => '2', 'name' => 'VIBR8'),

            array('album_id' => '3', 'name' => 'Time'),
            array('album_id' => '3', 'name' => 'Man On The Moon'),
            array('album_id' => '3', 'name' => 'Out Of Love'),
            array('album_id' => '3', 'name' => 'Sorry'),
            array('album_id' => '3', 'name' => 'On My Way'),
            array('album_id' => '3', 'name' => 'OK'),
            array('album_id' => '3', 'name' => 'Not You'),
            array('album_id' => '3', 'name' => 'Heading Home'),
            array('album_id' => '3', 'name' => 'Fake A Smile'),
            array('album_id' => '3', 'name' => 'World We Used To Know'),

            array('album_id' => '4', 'name' => 'Getting Older'),
            array('album_id' => '4', 'name' => 'my future'),
            array('album_id' => '4', 'name' => 'NDA'),
            array('album_id' => '4', 'name' => 'Happier Than Ever'),
            array('album_id' => '4', 'name' => 'Everybody Dies'),
            array('album_id' => '4', 'name' => 'Therefore I Am'),
            array('album_id' => '4', 'name' => 'Male Fantasy'),
            array('album_id' => '4', 'name' => 'GOLDWING'),
            array('album_id' => '4', 'name' => 'Lost Cause'),
            array('album_id' => '4', 'name' => 'Oxytocin'),

            array('album_id' => '5', 'name' => 'California Love'),
            array('album_id' => '5', 'name' => 'Runnin'),
            array('album_id' => '5', 'name' => 'How Do U Want It'),
            array('album_id' => '5', 'name' => 'Wanted Dead Or Alive'),
            array('album_id' => '5', 'name' => 'Venom'),
            array('album_id' => '5', 'name' => 'Without Me'),
            array('album_id' => '5', 'name' => 'Love Yourself'),
            array('album_id' => '5', 'name' => 'Not Afraid'),
            array('album_id' => '5', 'name' => 'Zues'),
            array('album_id' => '5', 'name' => 'Superman'),
        );

        foreach ($songs as $data) {
            Song::create([
                'album_id' => $data['album_id'],
                'name' => $data['name'],
            ]);
        }
    }
}
