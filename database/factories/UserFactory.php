<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\OrangTua;
use App\Models\UserRole;
use App\Models\AdminGuru;
use App\Models\MapelKelas;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $nik = fake()->unique()->randomNumber(8);

        return [
            // 'nik' => $nik,
            'nik' => fake()->unique()->randomNumber(9),
            'nama_lengkap' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'role_id' => function() {
                return UserRole::inRandomOrder()->first()->id;
            },
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            AdminGuru::factory()->create(['nik_guru' => $user->nik]);
            Siswa::factory()->create(['nik_siswa' => $user->nik]);
            OrangTua::factory()->create(['nik_siswa' => $user->nik]);

            // MapelKelas::factory(20)->create();
            // Kelas::factory(6)->create();
        });
    }
}
