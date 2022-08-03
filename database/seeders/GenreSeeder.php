<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = array(
            array('name' => 'Hip Hop', 'description' => 'Dance with me'),
            array('name' => 'Extreme', 'description' => 'Do yourself be confidence'),
            array('name' => 'Happy', 'description' => 'Happy as always'),
            array('name' => 'Alone Again', 'description' => 'Chill and focus'),
        );

        foreach ($genres as $data) {
            Genre::create([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
        }
    }
}
