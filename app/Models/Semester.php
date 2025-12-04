<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    /** @use HasFactory<\Database\Factories\SemesterFactory> */
    use HasFactory;

    protected $table = 'semester';
    protected $fillable = ['tahun_ajaran_id', 'nama_semester', 'status'];

    //setiap semester memiliki banyak relasi gradesStudents

    public function kelassiswa()
    {
        return $this->hasMany(Kelas_siswa::class);
    }

    public function tahunajaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }
}
