<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Kelas_siswa;

class KelasSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswaId = Siswa::pluck('id')->toArray();
        
        foreach ($siswaId as $siswa) {
            Kelas_siswa::create([
                'kelas_id' => 1, //id kelas yang diinginkan
                'siswa_id' => $siswa,
                'tahun_ajaran_id' => 1,
                'semester_id' => 1,
                'aktif' => 'aktif',
            ]);
        }
    }
}