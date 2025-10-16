<?php

namespace Database\Factories;
use App\Models\Lessons;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lessons>
 */
class LessonsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lessons = [
            'Matematika', 'Bahasa Indonesia', 'IPAS',
            'Seni Theater', 'Seni Musik', 'ATT', 'Bahasa Arab', 
            'Bahasa Inggris'
        ];

        $lessons = $this->faker->unique()->randomElement($lessons);

        return [
            'lesson'=> $lessons
            ];
        
    }
}
