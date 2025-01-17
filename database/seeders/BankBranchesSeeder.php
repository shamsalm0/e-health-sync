<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankBranchesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bank_branches')->insert([
            [
                'bank_id' => 1,
                'name' => 'Motijheel Branch',
                'address' => '23 Dilkusha Commercial Area, Dhaka',
                'routing_no' => '200120349',
            ],
            [
                'bank_id' => 1,
                'name' => 'Gulshan Branch',
                'address' => 'Plot- 17, Gulshan Avenue, Dhaka',
                'routing_no' => '200120450',
            ],
            [
                'bank_id' => 2,
                'name' => 'Dhanmondi Branch',
                'address' => 'House-23, Road-10, Dhanmondi, Dhaka',
                'routing_no' => '210110238',
            ],
            [
                'bank_id' => 2,
                'name' => 'Uttara Branch',
                'address' => 'Sector-13, Uttara, Dhaka',
                'routing_no' => '210110349',
            ],
            [
                'bank_id' => 3,
                'name' => 'Mirpur Branch',
                'address' => 'Plot-10, Mirpur-10, Dhaka',
                'routing_no' => '220130123',
            ],
            [
                'bank_id' => 3,
                'name' => 'Banani Branch',
                'address' => 'House-113, Road-12, Banani, Dhaka',
                'routing_no' => '220130789',
            ],
            [
                'bank_id' => 4,
                'name' => 'Mohakhali Branch',
                'address' => 'Plot-8, Mohakhali, Dhaka',
                'routing_no' => '230140567',
            ],
            [
                'bank_id' => 4,
                'name' => 'Bashundhara Branch',
                'address' => 'Block C, Bashundhara Residential Area, Dhaka',
                'routing_no' => '230140123',
            ],
            [
                'bank_id' => 5,
                'name' => 'Narayanganj Branch',
                'address' => '31 S.M. Maleh Road, Narayanganj',
                'routing_no' => '240150456',
            ],
            [
                'bank_id' => 5,
                'name' => 'Chittagong Branch',
                'address' => 'Station Road, Chittagong',
                'routing_no' => '240150789',
            ],
            [
                'bank_id' => 1,
                'name' => 'Rajshahi Branch',
                'address' => 'Shah Makhdum Avenue, Rajshahi',
                'routing_no' => '200120456',
            ],
            [
                'bank_id' => 2,
                'name' => 'Barisal Branch',
                'address' => 'Sadar Road, Barisal',
                'routing_no' => '210110789',
            ],
            [
                'bank_id' => 3,
                'name' => 'Khulna Branch',
                'address' => '42 Ahsanullah Road, Khulna',
                'routing_no' => '220130456',
            ],
            [
                'bank_id' => 4,
                'name' => 'Sylhet Branch',
                'address' => 'Zindabazar, Sylhet',
                'routing_no' => '230140789',
            ],
            [
                'bank_id' => 5,
                'name' => 'Comilla Branch',
                'address' => 'Kandirpar Road, Comilla',
                'routing_no' => '240150123',
            ],
        ]);
    }
}
