<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registration; // Assuming the model name is Registration
use Carbon\Carbon;

class VaccineRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for registrations
        Registration::insert([
            [
                'nid' => '1234567890',
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'vaccine_center_id' => 1, // Assuming it refers to an existing vaccine center
                'scheduled_date' => Carbon::now()->addDays(5),
                'status' => 'Scheduled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nid' => '9876543210',
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'vaccine_center_id' => 2,
                'scheduled_date' => null, // Not yet scheduled
                'status' => 'Not scheduled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nid' => '1234509876',
                'name' => 'Michael Brown',
                'email' => 'michael@example.com',
                'vaccine_center_id' => 1,
                'scheduled_date' => Carbon::now()->addDays(10),
                'status' => 'Scheduled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nid' => '1122334455',
                'name' => 'Lucy Green',
                'email' => 'lucy@example.com',
                'vaccine_center_id' => 3,
                'scheduled_date' => null,
                'status' => 'Not scheduled',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
