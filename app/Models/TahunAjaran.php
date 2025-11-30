<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    /** @use HasFactory<\Database\Factories\TahunAjaranFactory> */
    use HasFactory;

    protected $table = 'tahun_ajaran';
    protected $fillable = ['tahun_mulai', 'tahun_selesai', 'status'];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
