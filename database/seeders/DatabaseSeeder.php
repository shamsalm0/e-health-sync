<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SmsSeeder::class,
            DivisionSeeder::class,
            DistrictSeeder::class,
            UpazilaSeeder::class,
            UnionSeeder::class,
            GradeSeeder::class,
            GenderSeeder::class,
            BloodGroupSeeder::class,
            MaritalStatusSeeder::class,
            ReligionSeeder::class,
            EmpTypeSeeder::class,
            DepartmentsSeeder::class,
            DesignationSeeder::class,
            BanksSeeder::class,
            BankBranchesSeeder::class,
            ExamsTableSeeder::class,
            ExamBoardsTableSeeder::class,
            OccupationsSeeder::class,
            PermissionSeeder::class,
            UomsTableSeeder::class,
            CategoriesTableSeeder::class,
            RoomTypeSeeder::class,
            HospitalBranch::class,
            HospitalBulding::class,
            ReportTypeSeeder::class,
            ServiceSetupSeeder::class,
            TestGroupSeeder::class,
            ReferanceSeeder::class,
            HospitalRoomSeeder::class,
            TestNameSeeder::class,
        ]);
    }
}
