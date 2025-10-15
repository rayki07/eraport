<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Students;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
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

            'grade' => $this->faker->numberBetween(1, 6),
            'grade_name' => $this->faker->randomElement(['Yordan','Yaman','Qatar','Libia','Mesir','Maroko','Tunisia','Kuwait','Bahrain','Oman','Palestina','Saudi Arabia']),
            
            
        ];

        

    }
}
