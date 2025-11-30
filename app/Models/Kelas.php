<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\TahunAjaran;

class Kelas extends Model
{
    /** @use HasFactory<\Database\Factories\KelasFactory> */
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['rombel', 'nama', 'tahun_ajaran_id'];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'kelas_siswa');
    }

    // 1 nama kelas cuma boleh di satu tahun ajaran
    public function tahunajaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }
}
