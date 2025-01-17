<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            ['name' => 'Medicine Specialist', 'type' => 1],
            ['name' => 'General Surgery Specialist', 'type' => 1],
            ['name' => 'Cardiology Specialist', 'type' => 1],
            ['name' => 'ENT Specialist', 'type' => 1],
            ['name' => 'Eye Specialist', 'type' => 1],
            ['name' => 'Heart Specialist', 'type' => 1],
            ['name' => 'Chest Specialist', 'type' => 1],
            ['name' => 'Dental Specialist', 'type' => 1],
            ['name' => 'Child Specialist', 'type' => 1],
            ['name' => 'Orthopedics', 'type' => 1],
            ['name' => 'Diabetics Specialist', 'type' => 1],
            ['name' => 'Neurosurgery Specialist', 'type' => 1],
            ['name' => 'Urology Surgery Specialist', 'type' => 1],
            ['name' => 'Child Surgery Specialist', 'type' => 1],
            ['name' => 'Cancer Specialist', 'type' => 1],
            ['name' => 'Gynaecologist Specialist', 'type' => 1],
            ['name' => 'Skin & VD', 'type' => 1],
            ['name' => 'Neuro Medicine Specialist', 'type' => 1],
            ['name' => 'Gastro-enterology', 'type' => 1],
            ['name' => 'Nephrology', 'type' => 1],
            ['name' => 'Respiratory Medicine', 'type' => 1],
            ['name' => 'Burn & Plastic Surgery', 'type' => 1],
            ['name' => 'Eurosurgery', 'type' => 1],
            ['name' => 'Palliative Medicine', 'type' => 1],
            ['name' => 'Physiotherapy', 'type' => 1],
            ['name' => 'Food & Nutrition', 'type' => 1],
            ['name' => 'Paediatrics', 'type' => 1],
            ['name' => 'Gynecology', 'type' => 1],
            ['name' => 'Paediatrics Medicine', 'type' => 1],
            ['name' => 'Radio Therapy', 'type' => 1],
            ['name' => 'Eurology', 'type' => 1],
            ['name' => 'U.S.G', 'type' => 1],
            ['name' => 'Pathology', 'type' => 1],
            ['name' => 'E.C.G', 'type' => 1],
            ['name' => 'ECO', 'type' => 1],
            ['name' => 'Endoscopy', 'type' => 1],
        ]);
    }
}
