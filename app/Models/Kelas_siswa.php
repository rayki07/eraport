<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\Semester;

class Kelas_siswa extends Model
{
    /** @use HasFactory<\Database\Factories\KelasSiswaFactory> */
    use HasFactory;

    protected $table = 'kelas_siswa';
    protected $fillable = ['siswa_id', 'kelas_id', 'tahun_ajaran_id', 'semester_id', 'status'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function tahunajaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

}
