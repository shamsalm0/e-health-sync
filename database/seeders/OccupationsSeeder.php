<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccupationsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('occupations')->insert([
            ['name' => 'Doctor'],
            ['name' => 'Nurse'],
            ['name' => 'Surgeon'],
            ['name' => 'Pharmacist'],
            ['name' => 'Lab Technician'],
            ['name' => 'Radiologist'],
            ['name' => 'Anesthetist'],
            ['name' => 'Physiotherapist'],
            ['name' => 'Pathologist'],
            ['name' => 'Dietician'],
            ['name' => 'Medical Technologist'],
            ['name' => 'Ward Boy'],
            ['name' => 'Cleaner'],
            ['name' => 'Receptionist'],
            ['name' => 'Cashier'],
            ['name' => 'Administrative Staff'],
            ['name' => 'Housekeeper'],
            ['name' => 'Ambulance Driver'],
            ['name' => 'Security Guard'],
            ['name' => 'Operation Theatre Attendant'],
            ['name' => 'Blood Bank Technician'],
            ['name' => 'Medical Records Officer'],
            ['name' => 'Emergency Medical Officer'],
            ['name' => 'Billing Officer'],
            ['name' => 'HR Officer'],
            ['name' => 'IT Technician'],
            ['name' => 'Phlebotomist'],
            ['name' => 'Hospital Administrator'],
            ['name' => 'Community Health Worker'],
            ['name' => 'Dental Assistant'],
            ['name' => 'Medical Assistant'],
            ['name' => 'Electrician'],
            ['name' => 'Plumber'],
            ['name' => 'Laundry Worker'],
            ['name' => 'Cafeteria Worker'],
            ['name' => 'Hospital Porter'],
        ]);
    }
}
