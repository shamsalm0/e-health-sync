<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('test_groups')->insert([
            ['name' => 'Skin'],
            ['name' => 'Digital X-Ray'],
            ['name' => 'HISTOPATHOLOGY'],
            ['name' => 'MICROBILOGY'],
            ['name' => 'IMMUNOLOGY'],
            ['name' => 'SEROLOGY'],
            ['name' => 'URINE'],
            ['name' => 'STOOL'],
            ['name' => 'FLUID'],
            ['name' => 'Serum'],
            ['name' => 'USG'],
            ['name' => 'Physiotherapy'],
            ['name' => 'ETT'],
            ['name' => 'Sputum'],
            ['name' => 'CT Scan'],
            ['name' => 'Heart'],
            ['name' => 'Endoscopy'],
            ['name' => 'Pus'],
            ['name' => 'Swab'],
            ['name' => 'Emergency'],
            ['name' => 'Dental'],
            ['name' => 'Blood'],
            ['name' => 'OPD'],
            ['name' => 'Eye'],
            ['name' => 'Blood Glucose'],
            ['name' => 'Blood Hormone Test'],
            ['name' => 'PHC Setabgonj'],
            ['name' => 'Surgical'],
            ['name' => 'Others'],
            ['name' => 'Vacutainer Tube'],
            ['name' => 'Niddle'],
            ['name' => 'Biochemistry'],
            ['name' => 'Pathology'],
            ['name' => 'IMMUNOCHEMISTRY'],
            ['name' => 'Not For Referral & Special Test'],
            ['name' => 'Echocardiogram'],
            ['name' => 'Dialysis'],
            ['name' => 'Clinical Pathology'],
            ['name' => 'Hematology'],
            ['name' => 'Cytology'],
            ['name' => 'Urinary Albumin Creatinine Ratio'],
        ]);
    }
}
