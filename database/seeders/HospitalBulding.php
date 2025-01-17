<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalBulding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hospital_buildings')->insert([
            ['branch_id' => '1', 'name' => 'Momota Dhaka'],
            ['branch_id' => '2', 'name' => 'Momota Barishal'],
        ]);
    }
}
