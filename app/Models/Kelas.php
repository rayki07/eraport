<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    /** @use HasFactory<\Database\Factories\KelasFactory> */
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['rombel', 'nama_kelas', 'guru_id', 'tahun_ajaran_id'];

    public function walikelas()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
    public function kelassiswa()
    {
        return $this->hasMany(Kelas_siswa::class, 'kelas_id');
    }

    public Function nilaiujian()
    {
        return $this->hasMany(Nilai_ujian::class, 'kelas_id');
    }

    // 1 nama kelas cuma boleh di satu tahun ajaran
    public function tahunajaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }

    public function siswa()
    {
        return $this->BelongsToMany(Siswa::class, 'kelas_siswa')
                    ->withPivot(['tahun_ajaran_id', 'semester_id', 'status']);
    }
}
