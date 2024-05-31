<?php

namespace Database\Factories;

use App\Models\AdminGuru;
use App\Models\Kelas;
use App\Models\MapelKelas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MapelKelas>
 */
class MapelKelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_kelas' => function() {
                return Kelas::inRandomOrder()->first()->id;
            },
            'nik_guru_mapel' => function() {
                return AdminGuru::inRandomOrder()->first()->nik_guru;
            },
            'nama_mapel' => $this->faker->randomElement(['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'IPA', 'IPS', 'PKN']),
        ];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (User $user) {
    //         MapelKelas::factory()->create(['nik_guru_mapel' => $user->nik]);
    //     });
    // }
}
