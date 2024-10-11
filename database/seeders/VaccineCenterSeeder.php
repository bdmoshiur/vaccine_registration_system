<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VaccineCenter; // Ensure this is the correct model name

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for vaccine centers
        VaccineCenter::insert([
            [
                'name' => 'City Health Center',
                'daily_limit' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Downtown Vaccine Hub',
                'daily_limit' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Suburban Clinic',
                'daily_limit' => 75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Community Health Center',
                'daily_limit' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mobile Vaccine Unit',
                'daily_limit' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
