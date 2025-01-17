<?php

namespace Database\Seeders;

use App\Models\Sms;
use Illuminate\Database\Seeder;

class SmsSeeder extends Seeder
{
    public function run()
    {
        $smsData = [
            [
                'title' => 'Contact Verify OTP',
                'body' => 'Your OTP is #otp#. Use this to verify your contact.\r\nWORLD TECH',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'title' => 'Login Password',
                'body' => 'Your login password is #password#. Use this password to log in. Don\'t share this with anyone.\r\nWORLD TECH',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'title' => 'Reset Password',
                'body' => 'Your new password is #password#. Use this password to log in. Don\'t share this with anyone.\r\nWORLD TECH',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'title' => 'Login OTP',
                'body' => 'Your login OTP is #otp#. Use this to login to the system.\r\nWORLD TECH',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'title' => 'User Activate',
                'body' => 'Your username: #username# Your password: #password# \r\nWORLD TECH',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'title' => 'User Create',
                'body' => 'Your account has been created. Username: #username# Password: #password# \r\nWORLD TECH',
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ];

        foreach ($smsData as $sms) {
            Sms::create($sms);
        }
    }
}
