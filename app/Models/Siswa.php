<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Kelas_siswa;
use App\Models\TahunAjaran;
use App\Models\Semester;

class Siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = ['nis', 'nisn', 'nama', 'gender'];

    //setiap siswa mempunyai banyak kelas
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_siswa');
    }

}
