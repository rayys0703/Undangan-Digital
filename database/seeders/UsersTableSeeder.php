<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Ray',
                'email' => 'rayya@gmail.com',
                'password' => Hash::make('123123123'),
                'role' => 2, // admin
            ],
            [
                'name' => 'Indra',
                'email' => 'indra@gmail.com',
                'password' => Hash::make('123123123'),
                'role' => 1,
            ],
            [
                'name' => 'Rivai',
                'email' => 'rivai@gmail.com',
                'password' => Hash::make('123123123'),
                'role' => 1,
            ],
        ];

        DB::table('users')->insert($users);

        $userdata_undangan = [
            [
                'users_id' =>
                    DB::table('users')->where('email', 'indra@gmail.com')->first()->id,
                    'created_at' => now(),
            ],
            [
                'users_id' => 
                    DB::table('users')->where('email', 'rivai@gmail.com')->first()->id,
                    'created_at' => now(),
            ],
        ];

        DB::table('userdata_undangan')->insert($userdata_undangan);

        $userdata_acara = [
            [
                'users_id' =>
                    DB::table('users')->where('email', 'indra@gmail.com')->first()->id,
                'created_at' => now(),
            ],
            [
                'users_id' => 
                    DB::table('users')->where('email', 'rivai@gmail.com')->first()->id,
                'created_at' => now(),
            ],
        ];

        DB::table('userdata_acara')->insert($userdata_acara);
    }
}
