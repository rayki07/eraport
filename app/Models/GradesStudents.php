<?php

namespace App\Models;
use App\Models\Students;
use App\Models\Grades;
use App\Models\SchoolYears;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradesStudents extends Model
{
    /** @use HasFactory<\Database\Factories\GradesStudentsFactory> */
    use HasFactory;

    protected $table = 'grades_students';
    protected $fillable = ['grade_id', 'student_id', 'school_year', 'semester'];

    public function students()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
    public function grades()
    {
        return $this->belongsTo(Grades::class, 'grade_id');
    }

    // guru
    

    // hanya menampilkan grade di satu tahun ajaran dan semester tertentu
    public function schoolYear()
    {
        return $this->belongsTo(SchoolYears::class, 'school_year');
    }


}