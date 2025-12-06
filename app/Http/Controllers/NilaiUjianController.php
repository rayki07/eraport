<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kelas_siswa;
use App\Models\Mapel;
use App\Models\Nilai_ujian;
use App\Models\Semester;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\Ujian;
use App\Models\UjianItem;
use Illuminate\Http\Request;

class NilaiUjianController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();

        return view('nilai.index', compact('mapel'));
    }
 
    public function show($id)
    {
        //ambil kelas berdasarkan IDSiswa
        $murid = Kelas_siswa::with('siswa')->find( $id );
        $siswa = $murid->siswa;
        $kelas = $murid->kelas;
        $ujian = UjianItem::with('ujian')->get();
        $doa = UjianItem::get()->where('kategori', 'doa');
        $items = UjianItem::get();

        return view('nilai.show', [
            'siswa' => $siswa,
            'kelas' => $kelas,
            'ujian' => $ujian,
            'doa' => $doa,
            'items' => $items,
        ]);
        
    }

  














    public function input (Request $request)
    {
        // validasi
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'ujian_id' => 'required|exists:ujian,id',
        ]);

        $tahun = TahunAjaran::where('aktif', '1')->first();
        $semester = Semester::where('aktif', '1')->first();

        // Semua siswa
        $siswa = Kelas_siswa::with('siswa')
                ->where('kelas_id', $request->kelas_id)
                ->where('tahun_ajaran_id', $tahun->id)
                ->where('semester_id', $semester->id)
                ->get()
                ->pluck('siswa');
        
        $kelas = $request->kelas_id;

        //Semua item ujian
        $items = UjianItem::where('ujian_id', $request->ujian_id)->get();

        $ujian = UjianItem::where('ujian_id', $request->ujian_id)->get();

        //Ambil nilai ujian existing
        $nilai = Nilai_ujian::where('kelas_id', $request->kelas_id)
                ->where('ujian_id', $request->ujian_id)
                ->where('tahun_ajaran_id', $request->id)
                ->where('semester_id', $request->id)
                ->get();

        return view('nilai.input', [
            'siswa' => $siswa,
            'items' => $items,
            'nilai' => $nilai,
            'kelas_id' => $request->kelas_id,
            'ujian_id' => $request->ujian_id,
            'kelas' => $kelas,
            'ujian' => $ujian,
            'semester' => $semester,
            'tahun' => $tahun
        ]);
    }

    public function store()
    {
        //
    }
}
