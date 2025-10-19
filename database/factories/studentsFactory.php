<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Grades;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => $this->faker->unique()->numberBetween(1000, 9999),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            //email diambil dari first_name dan last_name
            'email' => strtolower($this->faker->firstName() . '.' . $this->faker->lastName() . '@example.com'),
            //password is always 'password' tidak di hash
            'password' => 'password',
            /* 'grade_id' => Grades::factory(), */
        ];
    }
}
