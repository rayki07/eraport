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

        public function tampil($id)
    {
        $tahun = TahunAjaran::where('aktif', '1')->first();
        $semester = Semester::where('aktif', '1')->first();
        $daftarSiswa = Kelas_siswa::with('kelas','siswa')->find($id);
        $siswa = $daftarSiswa->siswa;
        $kelas = $daftarSiswa->kelas;
        $murid = Siswa::findOrFail($id);

        // mengambil data ujian
        $ujianitem = UjianItem::all();
        $doa = $siswa->nilaiujian()->whereHas('ujianitem', function($q)  {
                $q->where('kategori', 'Doa');
                })
                ->avg('nilai');
        $hadis = $siswa->nilaiujian()->whereHas('ujianitem', function($q) {
                $q->where('kategori','Hadis');
                })
                ->avg('nilai');
        $kitabah = $siswa->nilaiujian()->whereHas('ujianitem', function($q) {
                $q->where('kategori','Kitabah');
                })
                ->avg('nilai');
        $adab = $siswa->nilaiujian()->whereHas('ujianitem', function($q) {
                $q->where('kategori','Adab');
                })
                ->avg('nilai');
        $surah28 = $siswa->nilaiujian()->whereHas('ujianitem', function($q) {
                $q->where('kategori','Surah 28');
                })
                ->avg('nilai');
        $surah29 = $siswa->nilaiujian()->whereHas('ujianitem', function($q) {
                $q->where('kategori','Surah 29');
                })
                ->avg('nilai');
        $surah30 = $siswa->nilaiujian()->whereHas('ujianitem', function($q) {
                $q->where('kategori','Surah 30');
                })
                ->avg('nilai');
        
        // menampilkan predikat
        $doaPredikat = match(true) {
            $doa >= 85 => 'A',
            $doa >= 75 => 'B',
            $doa >= 65 => 'C',
            $doa >= 55 => 'D',
            default => 'E'};

        $hadisPredikat = match(true) {
            $hadis >= 85 => 'A',
            $hadis >= 75 => 'B',
            $hadis >= 65 => 'C',
            $hadis >= 55 => 'D',
            default => 'E'};
        
        $kitabahPredikat = match(true) {
            $kitabah >= 85 => 'A',
            $kitabah >= 75 => 'B',
            $kitabah >= 65 => 'C',
            $kitabah >= 55 => 'D',
            default => 'E'};
        
        $adabPredikat = match(true) {
            $adab >= 85 => 'A',
            $adab >= 75 => 'B',
            $adab >= 65 => 'C',
            $adab >= 55 => 'D',
            default => 'E'};
        
        $surah28Predikat = match(true) {
            $surah28 >= 85 => 'A',
            $surah28 >= 75 => 'B',
            $surah28 >= 65 => 'C',
            $surah28 >= 55 => 'D',
            default => 'E'};

        return view('raport.tampil', compact([
            'siswa', 'kelas', 'tahun','semester',
            'doa','hadis', 'kitabah', 'adab', 'surah28', 'surah29', 'surah30',
            'doaPredikat', 'hadisPredikat', 'kitabahPredikat', 'adabPredikat',
            'surah28Predikat'
        ]));
    }


}
