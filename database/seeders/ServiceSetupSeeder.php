<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSetupSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('discount_service_setups')->insert([
            [
                'id' => 1,
                'service_name' => 'Diagnosis',
                'department_id' => 1,
                'has_discount' => 1,
                'has_commission' => 1,
                'in_others' => 0,
                'is_refundable' => 1,
            ],
            [
                'id' => 2,
                'service_name' => 'Medicine',
                'department_id' => 1,
                'has_discount' => 1,
                'has_commission' => 0,
                'in_others' => 0,
                'is_refundable' => 0,
            ],
            [
                'id' => 3,
                'service_name' => 'Admission',
                'department_id' => 1,
                'has_discount' => 1,
                'has_commission' => 0,
                'in_others' => 1,
                'is_refundable' => 1,
            ],
            [
                'id' => 4,
                'service_name' => 'Others',
                'department_id' => 1,
                'has_discount' => 1,
                'has_commission' => 0,
                'in_others' => 1,
                'is_refundable' => 1,
            ],
            [
                'id' => 5,
                'service_name' => 'Emergency Ticket',
                'department_id' => 1,
                'has_discount' => 0,
                'has_commission' => 0,
                'in_others' => 0,
                'is_refundable' => 1,
            ],
            [
                'id' => 6,
                'service_name' => 'Outdoor Ticket',
                'department_id' => 1,
                'has_discount' => 0,
                'has_commission' => 0,
                'in_others' => 0,
                'is_refundable' => 1,
            ],
            [
                'id' => 7,
                'service_name' => 'Registration',
                'department_id' => 1,
                'has_discount' => 0,
                'has_commission' => 0,
                'in_others' => 0,
                'is_refundable' => 1,
            ],
            [
                'id' => 8,
                'service_name' => 'Ambulance',
                'department_id' => 1,
                'has_discount' => 0,
                'has_commission' => 0,
                'in_others' => 0,
                'is_refundable' => 1,
            ],
            [
                'id' => 9,
                'service_name' => 'Admission Bill',
                'department_id' => 1,
                'has_discount' => 0,
                'has_commission' => 0,
                'in_others' => 0,
                'is_refundable' => 0,
            ],
            [
                'id' => 10,
                'service_name' => 'Operation',
                'department_id' => 1,
                'has_discount' => 0,
                'has_commission' => 0,
                'in_others' => 0,
                'is_refundable' => 1,
            ],
            [
                'id' => 11,
                'service_name' => 'Canteen',
                'department_id' => 1,
                'has_discount' => 0,
                'has_commission' => 0,
                'in_others' => 0,
                'is_refundable' => 0,
            ],
            [
                'id' => 12,
                'service_name' => 'Physiotherapy',
                'department_id' => 1,
                'has_discount' => 1,
                'has_commission' => 1,
                'in_others' => 0,
                'is_refundable' => 1,
            ],
            [
                'id' => 13,
                'service_name' => 'Dialysis',
                'department_id' => 1,
                'has_discount' => 1,
                'has_commission' => 0,
                'in_others' => 0,
                'is_refundable' => 0,
            ],
        ]);
    }
}
