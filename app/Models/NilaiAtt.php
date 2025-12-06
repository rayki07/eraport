<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiAtt extends Model
{
       public function getGenderTextAttribute()
    {
        return $this->gender === 'L' ? 'Laki-laki' : 'Perempuan';
    }
}
