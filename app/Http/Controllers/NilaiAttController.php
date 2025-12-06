<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use DB;
use Illuminate\Http\Request;
use App\Models\Kelas_siswa;
use App\Models\UjianItem;

class NilaiAttController extends Controller
{
    public function index()
    {
        $siswa = Kelas_siswa::with('kelas','siswa')->get();
        return view("att.index", compact('siswa'));

    }

    public function show($id)
    {
        //ambil kelas berdasarkan IDSiswa
        $murid = Kelas_siswa::with('siswa')->find( $id );
        $ujianitem = UjianItem::all();
        $siswa = $murid->siswa;
        $kelas = $murid->kelas;
        $ujian = UjianItem::with('ujian')->get();
        $kategori = UjianItem::where('kategori');
        $doa = UjianItem::where('kategori', 'doa')->get();
        $hadis = UjianItem::where('kategori', 'hadis')->get();
        $sholat = UjianItem::where('kategori', 'praktek sholat')->get();
        $wudhu = UjianItem::where('kategori', 'praktek wudhu')->get();
        $kategoriSurah = ['Surah 30', 'Surah 29', 'Surah 28'];
        

        // di group berdasarkan kategori
        $groupDoa = $doa->groupBy('kategori');
        $groupHadis = $hadis->groupBy('kategori');
        $groupSholat = $sholat->groupBy('kategori');
        $groupWudhu = $wudhu->groupBy('kategori');
        $groupSurah = UjianItem::whereIn('kategori', $kategoriSurah)
                        ->get()          // Ambil semua data dari DB dalam 1 query
                        ->groupBy('kategori'); // Kelompokkan data setelah diambil
        

        $groupedItems = $ujian->groupBy('kategori');

        /* dd($groupDoa); */

        return view('att.show', compact('murid', 'siswa', 'kelas',
                            'kelas', 'ujian', 'doa', 'hadis',
                            'sholat', 'wudhu', 'groupedItems',
                            'groupDoa', 'groupHadis', 'groupSurah', 'groupSholat', 'groupWudhu'));
    }
}
