<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row[0],
            'nisn' => $row[1],
            'nama_lengkap' => $row[2],
            'nama_panggilan'=> $row[3],
            'gender' => $row[4]
        ]);
    }
}
