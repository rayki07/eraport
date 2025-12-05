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
        'guru_id',
        'siswa_id',
        'kelas_id',
        'semester_id',
        'ujian_item_id',
        'nilai',
        'catatan' ];
    
}
