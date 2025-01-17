<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalBranch extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hospital_branches')->insert([
            ['name' => 'Dhaka'],
            ['name' => 'Barishal'],
        ]);
    }
}
