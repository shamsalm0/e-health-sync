<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('emp_exams')->insert([
            ['name' => 'SSC', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Dakhil', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'SSC Vocational', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'HSC', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Alim', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Business Management', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'HSC Vocational', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Diploma', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bachelor of Science (B.Sc Pass)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Master Of Business Administration (MBA)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => "Bachelor of Arts (B.A Hon's)", 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => "BA (Hon's)", 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => "Master's", 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'B.S.C in Nursing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'MPH', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Diploma in Midwifery', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Diploma In Nursing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Diploma in Orthopedic', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Eight', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Masters of Business Studies (MBS) Major in Accounting', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bachelor of Business Studies (BBS)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bachelor Of Business Administration (BBA)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
