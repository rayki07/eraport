<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\guru>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => ('001'),
            'nama_lengkap' => ('Firman Wahyudi'),
            'nama_panggilan' => ('Firman'),
            'gender' => ('L')
        ];
    }
}
