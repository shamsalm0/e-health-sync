<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanksSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('banks')->insert([
            ['name' => 'Sonali Bank Limited'],
            ['name' => 'Dutch-Bangla Bank Limited'],
            ['name' => 'Islami Bank Bangladesh Limited'],
            ['name' => 'BRAC Bank Limited'],
            ['name' => 'Pubali Bank Limited'],
        ]);
    }
}
