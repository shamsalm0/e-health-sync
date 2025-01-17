<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('emp_types')->insert([
            ['name' => 'Doctor'],
            ['name' => 'Nurse'],
            ['name' => 'Word Boy'],
            ['name' => 'Lab Attendant'],
            ['name' => 'OT Attendant'],
            ['name' => 'Cleaner'],
            ['name' => 'Cash'],
            ['name' => 'Driver'],
            ['name' => 'Lab Doctor'],
            ['name' => 'Computer Operator'],
            ['name' => 'House Keeping'],
            ['name' => 'Administration'],
            ['name' => 'Lift Operator'],
            ['name' => 'Cafeteria'],
            ['name' => 'PCO'],
            ['name' => 'Accounts'],
            ['name' => 'Reception'],
            ['name' => 'Landry'],
            ['name' => 'Billing Section'],
            ['name' => 'Pharmacy'],
            ['name' => 'Medical Technologist'],
        ]);
    }
}
