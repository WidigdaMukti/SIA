<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TahunAkademik>
 */
class TahunAkademikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'semester' => $this->faker->randomElement(['ganjil', 'genap']),
            'tanggal_mulai' => $this->faker->date,
            'tanggal_selesai' => $this->faker->dateTimeBetween('+6 months', '+1 year')->format('Y-m-d')
        ];
    }
}
