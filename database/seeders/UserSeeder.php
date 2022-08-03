<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $array = [
            [
                'name' => 'user1',
                'email' => 'user1@mail.com',
                'phone' => '+60123123456',
                'address' => 'Bangunan Jabatan Agama Islam Jln Meru',
                'postcode' => 41050,
                'city' => 'Klang',
                'state' => 'Selangor',
                'phone' => '+6012345123',
            ],
            [
                'name' => 'user2',
                'email' => 'user2@mail.com',
                'phone' => '+60123123456',
                'address' => '2 19 Jln 15/48A Off Jln Sentul',
                'postcode' => 51100,
                'city' => 'Kuala Lumpur',
                'state' => 'Wilayah Persekutuan',
                'phone' => '+6109871234',
            ],
        ];

        foreach ($array as $data) {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'email_verified' => true,
                'password' => Hash::make('password'),
                'address' => $data['address'],
                'postcode' => $data['postcode'],
                'city' => $data['city'],
                'state' => $data['state'],
                'phone' => $data['phone'],
            ]);
        }
    }
}
