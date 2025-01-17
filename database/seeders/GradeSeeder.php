<?php

namespace Database\Seeders;

use App\Models\Admin\Library\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    public function run(): void
    {
        $gradeData = [
            [
                'name' => 'Grade A up',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Grade A',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Grade B',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Grade C',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Grade D',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Grade E',
                'status' => 1,
                'created_by' => 1,
            ],
        ];

        foreach ($gradeData as $grade) {
            Grade::create($grade);
        }
    }
}
