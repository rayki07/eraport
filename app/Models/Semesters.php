<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semesters extends Model
{
    /** @use HasFactory<\Database\Factories\SemestersFactory> */
    use HasFactory;

    protected $table = 'semesters';
    protected $fillable = ['semester_id'];

    //setiap semester memiliki banyak relasi gradesStudents
    public function gradesStudent()
    {
        return $this->hasMany(GradesStudents::class, 'semester_id');
    }
}
