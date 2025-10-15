<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    /** @use HasFactory<\Database\Factories\StudentsFactory> */
    use HasFactory;
    protected $table = 'students';

    public function grade()
    {
        //setiap siswa memiliki satu grade
        return $this->belongsTo(Grade::class);
    }
}
