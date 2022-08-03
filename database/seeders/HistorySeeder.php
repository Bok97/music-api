<?php

namespace Database\Seeders;

use App\Models\History;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    public function run()
    {
        $histories = array(
            array('song_id' => 1),
            array('song_id' => 2),
            array('song_id' => 3),
            array('song_id' => 4),
            array('song_id' => 5),
        );

        foreach ($histories as $data) {
            History::create([
                'user_id' => 1,
                'song_id' => $data['song_id'],
            ]);
        }
    }
}
