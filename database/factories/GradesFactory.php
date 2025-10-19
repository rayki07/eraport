<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Students;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grades>
 */
class GradesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        //nama grade hanya ada 1 diantara dalam kurung (Yordan,Yaman), 2 (Qatar,Libia), 3 (Mesir,Maroko), 4 (Tunisia,Kuwait), 5 (Bahrain,Oman), 6 (Palestina,Saudi Arabia)

            'grade' => $this->faker->unique()->numberBetween(1, 6),
            'grade_name' => $this->faker->randomElement(['Yordan','Yaman','Qatar','Libia','Mesir','Maroko','Tunisia','Kuwait','Bahrain','Oman','Palestina','Saudi Arabia']),
            /* 'grade' => (1), // Default to grade 1
            'grade_name' => 'Yordan', // Default to grade name Yordan */
        ];

        

    }
}
