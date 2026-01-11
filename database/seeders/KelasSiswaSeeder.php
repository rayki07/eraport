<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\KelasSiswa;

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
            KelasSiswa::create([
                'kelas_id' => 5,
                'siswa_id' => $murid->id,
                'tahun_ajaran_id' => 5,
            ]);
        }

        // masukkan data Oman ke tabel
        foreach ($kelasOman as $murid) {
            KelasSiswa::create([
                'kelas_id' => 6,
                'siswa_id' => $murid->id,
                'tahun_ajaran_id' => 5,
            ]);
        }

        // masukkan data Tunisia ke tabel
        foreach ($kelasTunisia as $murid) {
            KelasSiswa::create([
                'kelas_id' => 7,
                'siswa_id' => $murid->id,
                'tahun_ajaran_id' => 5,
            ]);
        }

        //Riwayat siswa Bahrain kelas 1-4
        foreach ($kelasBahrain as $murid) {
            $riwayat = [
                ['kelas_id' => 1, 'tahun_ajaran_id' => 1],
                ['kelas_id' => 2, 'tahun_ajaran_id' => 2],
                ['kelas_id' => 3, 'tahun_ajaran_id' => 3],
                ['kelas_id' => 4, 'tahun_ajaran_id' => 4],
            ];

            foreach ($riwayat as $item) {
                KelasSiswa::create([
                    'siswa_id' => $murid->id,
                    'kelas_id' => $item['kelas_id'],
                    'tahun_ajaran_id' => $item['tahun_ajaran_id'],
                ]);
            }
        }
    }
}