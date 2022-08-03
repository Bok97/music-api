<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    public function run()
    {
        $array = [
            [
                'name' => 'Justin Bieber',
                'description' => 'My Name is Justin Bieber',
            ],
            [
                'name' => 'Marshmello',
                'description' => 'My Name is Marshmello',
            ],
            [
                'name' => 'Alan Walker',
                'description' => 'My Name is Alan Walker',
            ],
            [
                'name' => 'Ellie Bellish',
                'description' => 'My Name is Ellie Bellish',
            ],
            [
                'name' => 'Eminem',
                'description' => 'My Name is Eminem',
            ],
        ];

        foreach ($array as $data) {
            Artist::create([
                'name' => $data['name'],
                'description' => $data['description'],
            ]);
        }
    }
}
