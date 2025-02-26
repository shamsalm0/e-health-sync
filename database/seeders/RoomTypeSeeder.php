<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('room_types')->insert([
            ['name' => 'Lab Room'],
            ['name' => 'Operation Room'],
            ['name' => 'Admission Room'],
        ]);
    }
}
