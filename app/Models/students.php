<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SchoolYear;
use App\Models\GradesStudents;
use App\Models\Semester;
use App\Models\Grades;

class Students extends Model
{
    /** @use HasFactory<\Database\Factories\StudentsFactory> */
    use HasFactory;
    protected $table = 'students';

    public function grade()
    {
        //setiap siswa memiliki satu grade
        return $this->belongsToMany(Grades::class, 'grades_students')
        ->withPivot('school_year', 'semester')
        ->withTimestamps();
    }

    public function schoolyear()
    {
        //setiap siswa memiliki satu school year
        return $this->belongsTo(SchoolYears::class);
    }
    public function gradesStudents()
    {
        return $this->hasMany(GradesStudents::class, 'student_id', 'id');
    }
}