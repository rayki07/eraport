<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas_siswa;
use App\Models\TahunAjaran;
use App\Models\Semester;
use App\Models\Nilai_ujian;
use App\Models\UjianItem;
use App\Models\Siswa;


class RaportController extends Controller
{
    public function index()
    {
        $siswa = Kelas_siswa::with('kelas','siswa')->get();
        return view("raport.index", compact('siswa'));

    }

    public function show($id)
    {
        $tahun = TahunAjaran::where('aktif', '1')->first();
        $semester = Semester::where('aktif', '1')->first();
        $daftarSiswa = Kelas_siswa::with('siswa')->find( $id );
        $ujianitem = UjianItem::all();
        $siswa = $daftarSiswa->siswa;
        $kelas = $daftarSiswa->kelas;
        $nilaiAgama = $ujianitem->where('kategori', 'Doa');
        $kategoriSurah = ['Surah 30', 'Surah 29', 'Surah 28'];
        $nilaiTahfidz = UjianItem::whereIn('kategori', $kategoriSurah)
                        ->get()          // Ambil semua data dari DB dalam 1 query
                        ->groupBy('kategori'); // Kelompokkan data setelah diambil


        return view('raport.show', [
            'siswa' => $siswa,
            'kelas' => $kelas,
            'tahunAjaran' => '2025/2026',
            'semester' => 'Ganjil',
            'nilai_agama' => $nilaiAgama,
            'nilai_tahfidz' => $nilaiTahfidz,
        ]);
    }

        public function tampil()
    {

        return view('raport.tampil');

    }
}
