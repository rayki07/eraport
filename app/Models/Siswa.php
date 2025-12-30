<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Kelas_siswa;
use App\Models\Nilai_ujian;
use App\Models\Nilai_hafalan;
use App\Models\Nilai_iqra;

use Symfony\Component\CssSelector\Node\FunctionNode;

class Siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = ['nis', 'nisn', 'nama_lengkap', 'nama_panggilan', 'gender', 'status'];

    public function kelasSiswa()
    {
        return $this->hasMany(KelasSiswa::class, 'siswa_id');
    }

    public function nilaiUjian()
    {
        return $this->hasMany(NilaiUjian::class, 'siswa_id');
    }

    public function nilaiHafalan()
    {
        return $this->hasMany(NilaiHafalan::class,'siswa_id');
    }

    public function nilaiIqra()
    {
        return $this->hasMany(NilaiIqra::class,'siswa_id');
    }
    
    //setiap kelas mempunyai banyak siswa
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_siswa')
                    ->withPivot(['tahun_ajaran_id', 'semester_id', 'status']);
    }

    public function getGenderTextAttribute()
    {
        return $this->gender === 'L' ? 'Laki-laki' : 'Perempuan';
    }


}
