<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiHafalan extends Model
{
    protected $table = "nilai_hafalan";
    protected $fillable = [
        'siswa_id', 'pencapaian', 'nilai', 'catatan',
        'tahun_ajaran_id', 'semester_id',];
}
