<?php
// database/factories/PoliFactory.php
namespace Database\Factories;

use App\Models\Poli;  // pastikan model Poli sudah ada
use Illuminate\Database\Eloquent\Factories\Factory;

class PoliFactory extends Factory
{
    protected $model = Poli::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),         // Generate nama poli, misalnya "Poli Gigi"
            'biaya' => $this->faker->numberBetween(100000, 500000), // Generate biaya antara 100k dan 500k
            'keterangan' => $this->faker->sentence(), // Generate keterangan acak
        ];
    }
}
