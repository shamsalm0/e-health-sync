<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HospitalRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            ['name' => 'Biochemistry (2nd Floor)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Pathology (R-105)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Blood Bank (R-106)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Microscop Room (R-107)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'X-Ray Room (R-123)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'USG Room (R-125)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'ECG Room (R-130)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Physiotherapy Room (R-126)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Blood Collection Room (R-103)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Urine Collection Room (R-103)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Endocopy Room (R-128)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Dental Room (R-205)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Eye Room (R-203)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Dressing Room (1st Floor)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'SWD Room (R-132)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Pharmacy (R-101)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Food & Nutrition (Room - 129)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'OT Room (R-223)', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
            ['name' => 'Indoor (1st floor) 220', 'branch_id' => rand(1, 2), 'building_id' => rand(1, 2), 'room_type_id' => rand(1, 3)],
        ];

        DB::table('hospital_rooms')->insert($rooms);
    }
}
