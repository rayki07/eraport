<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    /** @use HasFactory<\Database\Factories\TahunAjaranFactory> */
    use HasFactory;

    protected $table = 'tahun_ajaran';
    protected $fillable = ['tahun_mulai', 'tahun_selesai', 'aktif'];
    protected $casts = ['aktif'=> 'boolean',];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'tahun_ajaran_id');
    }

    public function semester()
    {
        return $this->hasMany(Semester::class, 'tahun_ajaran_id');
    }

    public function kelassiswa()
    {
        return $this->hasMany(Kelas_siswa::class, 'tahun_ajaran_id');
    }

    public function nilaiujian()
    {
        return $this->hasMany(Nilai_ujian::class, 'tahun_ajaran_id');
    }

    public function getStatusLabelAttribute()
    {

        return $this->status == 1? 'Aktif':'Tidak Aktif';

    }
}
