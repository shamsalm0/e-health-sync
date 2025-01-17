<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('test_names')->insert([
            [
                'test_group_id' => 6,
                'name' => 'Blood Group',
                'department_id' => 2,
                'cost' => 100,
                'lab_room_id' => 1,
                'sample_room_id' => 1,
                'uom_id' => 5,
                'report_type_id' => 1,
            ],
            [
                'test_group_id' => 5,
                'name' => 'C-4',
                'department_id' => 1,
                'cost' => 1200,
                'lab_room_id' => 1,
                'sample_room_id' => 1,
                'uom_id' => 10,
                'report_type_id' => 2,
            ],
            [
                'test_group_id' => 6,
                'name' => 'HB% Electrophoresis',
                'department_id' => 2,
                'cost' => 1850,
                'lab_room_id' => 1,
                'sample_room_id' => 1,
                'uom_id' => 14,
                'report_type_id' => 3,
            ],
            [
                'test_group_id' => 6,
                'name' => 'Anti-HCV',
                'department_id' => 12,
                'cost' => 650,
                'lab_room_id' => 1,
                'sample_room_id' => 1,
                'uom_id' => 1,
                'report_type_id' => 1,
            ],
            [
                'test_group_id' => 11,
                'name' => 'USG Of Joint, Muscle and Nerve',
                'cost' => 1500,
                'department_id' => 10,
                'lab_room_id' => 6,
                'sample_room_id' => 6,
                'uom_id' => 16,
                'report_type_id' => 2,
            ],
            [
                'test_group_id' => 16,
                'name' => 'ECG',
                'department_id' => 6,
                'cost' => 400,
                'lab_room_id' => 7,
                'sample_room_id' => 7,
                'uom_id' => 18,
                'report_type_id' => 3,
            ],
            [
                'test_group_id' => 13,
                'name' => 'ETT',
                'department_id' => 6,
                'cost' => 2500,
                'lab_room_id' => 7,
                'sample_room_id' => 7,
                'uom_id' => 13,
                'report_type_id' => 1,
            ],
            [
                'test_group_id' => 5,
                'name' => 'Biochamical Sugar Protin',
                'department_id' => 1,
                'cost' => 700,
                'lab_room_id' => 1,
                'sample_room_id' => 1,
                'uom_id' => 14,
                'report_type_id' => 2,
            ],
            [
                'test_group_id' => 21,
                'name' => 'Sputum for AFB',
                'department_id' => 2,
                'cost' => 550,
                'lab_room_id' => 1,
                'sample_room_id' => 1,
                'uom_id' => 11,
                'report_type_id' => 3,
            ],
            [
                'test_group_id' => 21,
                'name' => 'Complete denture Lower',
                'department_id' => 9,
                'cost' => 6000,
                'lab_room_id' => 12,
                'sample_room_id' => 12,
                'uom_id' => 10,
                'report_type_id' => 1,
            ],
            [
                'test_group_id' => 11,
                'name' => 'Complete denture Upper',
                'department_id' => 9,
                'cost' => 6000,
                'lab_room_id' => 12,
                'sample_room_id' => 12,
                'uom_id' => 5,
                'report_type_id' => 2,
            ],
            [
                'test_group_id' => 21,
                'name' => 'Complete denture Full',
                'department_id' => 9,
                'cost' => 12000,
                'lab_room_id' => 12,
                'sample_room_id' => 12,
                'uom_id' => 4,
                'report_type_id' => 3,
            ],
            [
                'test_group_id' => 26,
                'name' => 'Anti HBc Total',
                'department_id' => 4,
                'cost' => 1200,
                'lab_room_id' => 1,
                'sample_room_id' => 1,
                'uom_id' => 1,
                'report_type_id' => 1,
            ],
            [
                'test_group_id' => 21,
                'name' => 'Consultation Fee- Dr. Istiaque Chowdhury(D)',
                'department_id' => 9,
                'cost' => 600,
                'lab_room_id' => 12,
                'sample_room_id' => 12,
                'uom_id' => 8,
                'report_type_id' => 2,
            ],
            [
                'test_group_id' => 21,
                'name' => 'Consultation Fee- Dr. Istiaque Chowdhury(N/D)',
                'department_id' => 9,
                'cost' => 600,
                'lab_room_id' => 12,
                'sample_room_id' => 12,
                'uom_id' => 9,
                'report_type_id' => 3,
            ],
        ]);
    }
}
