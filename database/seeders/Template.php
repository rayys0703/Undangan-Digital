<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template extends Seeder
{
    public function run()
    {
        $template = [
            [
                'id' => 1,
                'name' => 'Night Wedding',
                'price' => 5000,
                'desc' => 'The night wedding template.',
                'image' => '1.jpg',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Simple Wedding',
                'price' => 0,
                'desc' => 'First template wedding by rare.in',
                'image' => '2.jpg',
                'created_at' => now(),
            ],
        ];

        DB::table('template')->insert($template);

        $audio = [
            [
                'id' => 1,
                'name' => 'Ed Sheeran - Perfect',
                'file' => 'Ed Sheeran - Perfect.mp3',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Ed Sheeran - The Joker And The Queen',
                'file' => 'Ed Sheeran - The Joker And The Queen.mp3',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Bee Gees - How Deep Is Your Love',
                'file' => 'Bee Gees - How Deep Is Your Love.mp3',
                'created_at' => now(),
            ],
        ];

        DB::table('audio_template')->insert($audio);
    }
}
