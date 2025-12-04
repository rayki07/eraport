<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Kelas_siswa;
use App\Models\TahunAjaran;
use App\Models\Semester;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = ['nis', 'nisn', 'nama_lengkap', 'nama_panggilan', 'gender'];

    public Function kelassiswa()
    {
        return $this->belongsToMany(Kelas_siswa::class, 'kelas_siswa');
    }
    
    //setiap siswa mempunyai banyak kelas
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_siswa')
                    ->withPivot(['siswa_id', 'tahun_ajaran_id', 'semester_id'/* , 'status' */]);
    }

    public function getGenderTextAttribute()
    {
        return $this->gender === 'L' ? 'Laki-laki' : 'Perempuan';
    }

    
    

}
