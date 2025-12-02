<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    /** @use HasFactory<\Database\Factories\UjianFactory> */
    use HasFactory;

    protected $table = 'ujian';
    protected $fillable = [
        'nama_ujian',
        'mapel_id'
    ];

    // 1 ujian punya banyak item
    public function items()
    {
        return $this->hasMany(Ujian_item::class, 'ujian_id');
    }

    // 1 ujian punya banyak nilai
    public function nilai()
    {
        return $this->hasMany(Nilai_ujian::class,'ujian_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
