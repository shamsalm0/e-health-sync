<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('designations')->insert([
            [
                'name' => 'Doctor',
                'grade_id' => 1,
            ],
            [
                'name' => 'Ass. Doctor',
                'grade_id' => 2,
            ],
            [
                'name' => 'Manager',
                'grade_id' => 1,
            ],
            [
                'name' => 'Ass. Manager (Admin)',
                'grade_id' => 2,
            ],
            [
                'name' => 'Officer',
                'grade_id' => 1,
            ],
            [
                'name' => 'Sales Man-Pharmacy',
                'grade_id' => 3,
            ],
            [
                'name' => 'RMO',
                'grade_id' => 1,
            ],
            [
                'name' => 'Accounts Manager',
                'grade_id' => 1,
            ],
            [
                'name' => 'House keeping Officer',
                'grade_id' => 3,
            ],
            [
                'name' => 'Admin Department',
                'grade_id' => 2,
            ],
            [
                'name' => 'Computer Operator',
                'grade_id' => 2,
            ],
            [
                'name' => 'Receptionist',
                'grade_id' => 2,
            ],
            [
                'name' => 'Cashier',
                'grade_id' => 2,
            ],
            [
                'name' => 'Pharmacy Sales Man',
                'grade_id' => 2,
            ],
            [
                'name' => 'Pharmacy Manager',
                'grade_id' => 2,
            ],
            [
                'name' => 'Word Boy',
                'grade_id' => 2,
            ],
            [
                'name' => 'PCO',
                'grade_id' => 2,
            ],
            [
                'name' => 'Cleaner',
                'grade_id' => 2,
            ],
            [
                'name' => 'Lab Assistant',
                'grade_id' => 2,
            ],
            [
                'name' => 'X-Ray Technician',
                'grade_id' => 2,
            ],
            [
                'name' => 'Peon',
                'grade_id' => 2,
            ],
            [
                'name' => 'Store Keeper',
                'grade_id' => 2,
            ],
            [
                'name' => 'Store Officer',
                'grade_id' => 2,
            ],
            [
                'name' => 'Accounts Officer',
                'grade_id' => 2,
            ],
            [
                'name' => 'Executive Director',
                'grade_id' => 1,
            ],
            [
                'name' => 'Chairman',
                'grade_id' => 1,
            ],
            [
                'name' => 'Managing Director',
                'grade_id' => 1,
            ],
            [
                'name' => 'Director',
                'grade_id' => 1,
            ],
            [
                'name' => 'Lab Technician',
                'grade_id' => 2,
            ],
            [
                'name' => 'Landry Man',
                'grade_id' => 2,
            ],
            [
                'name' => 'Cafeteria Manager',
                'grade_id' => 2,
            ],
            [
                'name' => 'Security Officer',
                'grade_id' => 1,
            ],
            [
                'name' => 'Security Guard',
                'grade_id' => 2,
            ],
            [
                'name' => 'Security In Charge',
                'grade_id' => 2,
            ],
            [
                'name' => 'Ultrasonography',
                'grade_id' => 4,
            ],
            [
                'name' => 'Ultrasonogram Ass.',
                'grade_id' => 4,
            ],
            [
                'name' => 'Lab Technologist',
                'grade_id' => 3,
            ],
            [
                'name' => 'Senior Staff Nurse',
                'grade_id' => 3,
            ],
            [
                'name' => 'Nurse',
                'grade_id' => 4,
            ],
            [
                'name' => 'Nursing Supervisor',
                'grade_id' => 3,
            ],
            [
                'name' => 'OT Boy',
                'grade_id' => 4,
            ],
            [
                'name' => 'Marketing Officer',
                'grade_id' => 3,
            ],
            [
                'name' => 'Driver',
                'grade_id' => 4,
            ],
            [
                'name' => 'Engineer (Electrical & IT)',
                'grade_id' => 2,
            ],
        ]);
    }
}
