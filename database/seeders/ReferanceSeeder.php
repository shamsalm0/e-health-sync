<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('references')->insert([
            [
                'branch_id' => 1,
                'name' => 'Exta - Dr. Md.',
                'district_id' => rand(1, 10),
                'upazila_id' => rand(1, 10),
                'department_id' => 10,
            ],
            [
                'branch_id' => 1,
                'name' => 'PROF. DR. SYED ZAHID HOSSAIN',
                'district_id' => rand(1, 10),
                'upazila_id' => rand(1, 10),
                'department_id' => 9,
            ],
            [
                'branch_id' => 1,
                'name' => 'DR. MUJIBUR RAHMAN',
                'district_id' => rand(1, 10),
                'upazila_id' => rand(1, 10),
                'department_id' => 9,
            ],
            [
                'branch_id' => 1,
                'name' => 'DR. WAKIL AHMED',
                'district_id' => rand(1, 10),
                'upazila_id' => rand(1, 10),
                'department_id' => 17,
            ],
            [
                'branch_id' => 1,
                'name' => 'Dr. Ashis Kumar Halder',
                'district_id' => rand(1, 10),
                'upazila_id' => rand(1, 10),
                'department_id' => 9,
            ],
            [
                'branch_id' => 1,
                'name' => 'DR.S.M. IQBALUR RAHMAN',
                'district_id' => rand(1, 10),
                'upazila_id' => rand(1, 10),
                'department_id' => 4,
            ],
            [
                'branch_id' => 1,
                'name' => 'Dr. LAILA FARZANA URMI',
                'district_id' => rand(1, 10),
                'upazila_id' => rand(1, 10),
                'department_id' => 4,
            ],
            [
                'branch_id' => 1,
                'name' => 'DR. MD. HARUN OR RASHID',
                'district_id' => rand(1, 10),
                'upazila_id' => rand(1, 10),
                'department_id' => 4,
            ],
            [
                'branch_id' => 1,
                'name' => 'DR. MD. SHAH ALAM TALUKDER',
                'district_id' => rand(1, 10),
                'upazila_id' => rand(1, 10),
                'department_id' => 16,
            ],
            [
                'branch_id' => 1,
                'name' => 'PROF. DR. TARIT KUMAR SAMADDER',
                'district_id' => rand(1, 10),
                'upazila_id' => rand(1, 10),
                'department_id' => 15,
            ],
        ]);
    }
}
