<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\daftar;
use App\Models\Pasien;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Uncomment to seed users
        // User::factory(10)->create();

        // Uncomment to create a specific user
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seed 100 Pasien records
        // Pasien::factory(100)->create();
        daftar::factory(100)->create();
    }
}