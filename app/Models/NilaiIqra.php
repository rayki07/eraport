<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiIqra extends Model
{
    protected $table = "nilai_iqra";
    protected $fillable = [
        'siswa_id', 'jenis', 'jilid', 'halaman','juz','surah','ayat','nilai',
        'tahun_ajaran_id', 'semester_id',];
}
