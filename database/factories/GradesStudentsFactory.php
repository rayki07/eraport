<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Students;
use App\Models\Grades;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GradesStudents>
 */
class GradesStudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //pivot table untuk menghubungkan grade dan students
            /* 'grade_id' => Grades::factory(),
            'student_id' => Students::factory(),
            'school_year' => ('2024/2025'),
            'semester' => ('Ganjil'), */

        ];
    }
}
