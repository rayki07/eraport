<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;

class Grades extends Model
{
    /** @use HasFactory<\Database\Factories\GradesFactory> */
    use HasFactory;

    protected $table = 'grades';
    protected $fillable = ['grade_id', 'grade_name'];

    public function students()
    {
        //setiap grade memiliki banyak siswa
        return $this->belongsToMany(Students::class, 'grades_students')
                    ->withPivot('school_year', 'semester')
                    ->withTimestamps();
    }

    public function grades()
    {
        return $this->hasMany(Grades::class);
    }
}
