<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiHafalan extends Model
{
    protected $table = "nilai_hafalan";
    protected $fillable = [
        'siswa_id', 'nilai', 'target',
        'tahun_ajaran_id', 'semester_id',];
}
