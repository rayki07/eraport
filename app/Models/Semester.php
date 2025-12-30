<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    /** @use HasFactory<\Database\Factories\SemesterFactory> */
    use HasFactory;

    protected $table = 'semester';
    protected $fillable = ['tahun_ajaran_id', 'nama_semester', 'aktif'];


    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }
    
    public function kelasSiswa()
    {
        return $this->hasMany(KelasSiswa::class, 'semester_id');
    }

    public Function nilaiUjian()
    {
        return $this->hasMany(NilaiUjian::class, 'semester_id');
    }

    
}
