<?php

namespace Database\Factories;


use App\Models\poli;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\daftar>
 */
class DaftarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idPasien = Pasien::pluck('id')->toArray();
        $idPoli = poli::pluck('id')->toArray();
return [
'pasien_id' => $this->faker->randomElement($idPasien),
'tanggal_daftar' => $this->faker->date(),
'poli_id' => $this->faker->randomElement($idPoli),
'keluhan' => $this->faker->sentence(),
'diagnosis' => $this->faker->sentence(),
'tindakan' => $this->faker->sentence(),
];

    }
}
