<?php
namespace Database\Seeders;

use App\Models\poli;
use App\Models\User;
use App\Models\Daftar;
use App\Models\Pasien;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat user (admin dan 10 user lainnya)
        User::factory(10)->create();

        // Membuat user admin
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        poli::factory(10)->create();
        // Membuat pasien
        Pasien::factory(100)->create();

        // Membuat daftar (pastikan relasi dengan pasien_id dan poli_id sudah benar)
        Daftar::factory(100)->create();
    }
}
