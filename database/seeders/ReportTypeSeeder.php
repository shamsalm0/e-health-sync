<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('report_types')->insert([
            ['name' => 'Single'],
            ['name' => 'Multiple & single result'],
            ['name' => 'Multiple & double result'],
            ['name' => 'No Report'],
        ]);
    }
}
