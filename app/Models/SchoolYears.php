<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYears extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolYearsFactory> */
    use HasFactory;

    protected $table = 'school_years';
    protected $fillable = ['school_year_id'];

    public function gradesStudents()
    {
        //setiap tahun ajaran memiliki banyak relasi gradesStudents
        return $this->hasMany(GradesStudents::class, 'school_year_id');
    }

}
