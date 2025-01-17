<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamBoardsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('emp_boards')->insert([
            ['name' => 'Dhaka', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Rajshahi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Chittagong', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Jessore', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Comilla', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Barisal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Sylhet', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Dinajpur', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Madrasah Board', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Technical Education Board', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bangladesh Open University', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
