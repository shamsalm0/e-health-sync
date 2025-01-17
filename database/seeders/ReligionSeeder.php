<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('religions')->insert([
            ['name' => 'Islam'],
            ['name' => 'Christianity'],
            ['name' => 'Hinduism'],
            ['name' => 'Buddhism'],
            ['name' => 'Judaism'],
            ['name' => 'Sikhism'],
            ['name' => 'Other'],
        ]);
    }
}
