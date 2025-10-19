<?php

namespace Database\Seeders;
use App\Models\GradesStudents;
use App\Models\Grades;
use App\Models\Students;
use App\Models\SchoolYears;
use App\Models\Semesters;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradesStudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buatt 1 kelas
        $grades = Grades::factory(6)->create();

        // buat 100 siswa
        $students = Students::factory(100)->create();

        // buat tahun ajaran dan semester
        $schoolYears = SchoolYears::factory(5)->create();
        $semesters = Semesters::factory(2)->create();

        // hubungkan setiap siswa dengan kelas
        foreach ($students as $student) {
            GradesStudents::create([
                'grade_id' => $grades->random()->id,
                'student_id' => $student->id,
                'school_year_id' => $schoolYears->random()->id,
                'semester_id' => $semesters->random()->id,
            ]);
        }
    }
}
