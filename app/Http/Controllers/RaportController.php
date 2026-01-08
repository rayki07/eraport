<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasSiswa;
use App\Models\TahunAjaran;
use App\Models\Semester;
use App\Models\NilaiUjian;
use App\Models\UjianItem;
use App\Models\Siswa;
use App\Models\NilaiHafalan;
use App\Models\NilaiIqra;


class RaportController extends Controller
{
    public function index()
    {
        $siswa = KelasSiswa::with('kelas','siswa')->get();
        return view("raport.index", compact('siswa'));

    }

    public function show($id)
    {
        $tahun = TahunAjaran::where('aktif', '1')->first();
        $semester = Semester::where('aktif', '1')->first();
        $daftarSiswa = KelasSiswa::with('siswa')->find( $id );
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
        $daftarSiswa = KelasSiswa::with('kelas','siswa')->find($id);
        $siswa = $daftarSiswa->siswa;
        $kelas = $daftarSiswa->kelas;
        $murid = Siswa::findOrFail($id);

        // mengambil data ujian
        $ujianitem = UjianItem::all();
        $nilaidoa = $siswa->nilaiujian()->whereHas('ujianitem', function($q)  {
                $q->where('kategori', 'Doa');
                })
                ->avg('nilai');
        $doa = round($nilaidoa);
        $nilaihadis = $siswa->nilaiujian()->whereHas('ujianitem', function($q) {
                $q->where('kategori','Hadis');
                })
                ->avg('nilai');
        $hadis = round($nilaihadis);

        $nilaikitabah = $siswa->nilaiujian()->whereHas('ujianitem', function($q) {
                $q->where('kategori','Kitabah');
                })
                ->avg('nilai');
        $kitabah = round($nilaikitabah);

        $nilaiadab = $siswa->nilaiujian()->whereHas('ujianitem', function($q) {
                $q->where('kategori','Adab');
                })
                ->avg('nilai');
        $adab = round($nilaiadab);

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
        
        $kategoriSurah = ['Surah 30', 'Surah 29', 'Surah 28'];
        $ratasurah = $siswa->nilaiujian()->whereHas('ujianitem', function($q) {
                $q->whereIn('kategori',['Surah 28', 'Surah 29','Surah 30']);
                })
                ->avg('nilai');
        /* dd($murid->id); */
        // Ambil nilai Hafalan
        $hafalan = NilaiHafalan::where('siswa_id', $murid->id)
                                ->where('tahun_ajaran_id', $tahun->id)
                                ->where('semester_id', $semester->id)
                                ->first();
        
        $nilaiHafalan = $hafalan->nilai ?? 0;
        
        // Ambil nilai bacaan 
        $bacaan = NilaiIqra::where('siswa_id', $murid->id)
                                ->where('tahun_ajaran_id', $tahun->id)
                                ->where('semester_id', $semester->id)
                                ->first();
        
        $nilaiBacaan = $bacaan->nilai ?? 0;
        
        // menghandle jika null/tidak ada data
        $ratasurah = is_numeric($ratasurah) ? (float)$ratasurah : 0;
        $ratasurahBulat = round($ratasurah);
               
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
        
        $surahPredikat = match(true) {
            empty($ratasurahBulat) => 'F',
            $ratasurahBulat >= 85 => 'A',
            $ratasurahBulat >= 75 => 'B',
            $ratasurahBulat >= 65 => 'C',
            $ratasurahBulat >= 55 => 'D',
            default => 'E'};
        
        $nilaiBacaan = match(true) {
            $nilaiBacaan >= 85 => 'A',
            $nilaiBacaan >= 75 => 'B',
            $nilaiBacaan >= 65 => 'C',
            $nilaiBacaan >= 55 => 'D',
            $nilaiBacaan == null => '',
            default => 'E'};
        
        $nilaiHafalan = match(true) {
            $nilaiHafalan >= 85 => 'A',
            $nilaiHafalan >= 75 => 'B',
            $nilaiHafalan >= 65 => 'C',
            $nilaiHafalan >= 55 => 'D',
            default => 'E'};
        

        return view('raport.tampil', compact([
            'siswa', 'kelas', 'tahun','semester',
            'doa','hadis', 'kitabah', 'adab', 'ratasurahBulat',
            'doaPredikat', 'hadisPredikat', 'kitabahPredikat', 'adabPredikat',
            'surahPredikat', 'bacaan', 'hafalan', 'nilaiBacaan', 'nilaiHafalan'
        ]));
    }


}
