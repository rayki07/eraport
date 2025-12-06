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
        /* $siswaId = Siswa::pluck('id')->toArray();
        
        foreach ($siswaId as $siswa) {
            Kelas_siswa::create([
                'kelas_id' => 1, //id kelas yang diinginkan
                'siswa_id' => $siswa,
                'tahun_ajaran_id' => 1,
                'semester_id' => 1,
                'aktif' => 'aktif',
            ]);
        } */
        $siswa = Siswa::all(); // Ambil koleksi siswa

        // kelompokkan siswa berdasarkan kelas
        $kelasBahrain = $siswa->whereBetween('id',[1, 27]);
        $kelasOman = $siswa->whereBetween('id',[28, 52]);
        $kelasTunisia = $siswa->whereBetween('id',[53, 78]);

        // masukkan data BAhrain ke tabel
        foreach ($kelasBahrain as $murid) {
            Kelas_siswa::create([
                'kelas_id' => 1,
                'siswa_id' => $murid->id,
                'tahun_ajaran_id' => 1,
                'semester_id' => 1,
            ]);
        }

        // masukkan data Oman ke tabel
        foreach ($kelasOman as $murid) {
            Kelas_siswa::create([
                'kelas_id' => 2,
                'siswa_id' => $murid->id,
                'tahun_ajaran_id' => 1,
                'semester_id' => 1,
            ]);
        }

        // masukkan data Tunisia ke tabel
        foreach ($kelasTunisia as $murid) {
            Kelas_siswa::create([
                'kelas_id' => 3,
                'siswa_id' => $murid->id,
                'tahun_ajaran_id' => 1,
                'semester_id' => 1,
            ]);
        }
    }
}