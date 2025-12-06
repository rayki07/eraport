<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai_ujian extends Model
{
    /** @use HasFactory<\Database\Factories\NilaiUjianFactory> */
    use HasFactory;

    protected $table = "nilai_ujian";
    protected $fillable = [
        'siswa_id', 'kelas_id', 'ujian_id', 'ujian_item_id',
        'tahun_ajaran_id', 'semester_id', 'nilai', 'catatan' ];


    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id');
    }

    public function ujianitem()
    {
        return $this->belongsTo(UjianItem::class, 'ujian_item_id');
    }

    public function tahunajaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
    
}
