<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\KelasSiswa;
use App\Models\NilaiUjian;
use App\Models\TahunAjaran;

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
    public function nelasSiswa()
    {
        return $this->hasMany(KelasSiswa::class, 'kelas_id');
    }

    public Function nilaiUjian()
    {
        return $this->hasMany(NilaiUjian::class, 'kelas_id');
    }

    // 1 nama kelas cuma boleh di satu tahun ajaran
    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }

    public function siswa()
    {
        return $this->BelongsToMany(Siswa::class, 'kelas_siswa')
                    ->withPivot(['tahun_ajaran_id', 'semester_id', 'status']);
    }
}
