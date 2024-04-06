<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserdataUndanganSeeder extends Seeder
{
    public function run()
    {
        // Insert data into userdata_undangan table
        DB::table('userdata_undangan')->insert([
            'user_id' => 1,
            'total_undangan' => 2,
            'undangan_dilihat' => 125,
            'total_ucapan' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
