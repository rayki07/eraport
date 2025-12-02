<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian_item extends Model
{
    /** @use HasFactory<\Database\Factories\UjianItemFactory> */
    use HasFactory;

    protected $table = 'ujian_item';
    protected $fillable = [
        'ujian_id',
        'nama_item',
        'keterangan'];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id');
    }
}
