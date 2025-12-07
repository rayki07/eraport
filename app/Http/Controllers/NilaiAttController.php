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
        /* $doa = UjianItem::where('kategori', 'doa')->get(); */
        $doa = $ujianitem->where('kategori', 'Doa');
        $hadis = $ujianitem->where('kategori', 'Hadis');
        $sholat = $ujianitem->where('kategori', 'Praktek sholat');
        $wudhu = $ujianitem->where('kategori', 'Praktek Wudhu');
        $kategoriSurah = ['Surah 30', 'Surah 29', 'Surah 28'];
        $adab = $ujianitem->where('kategori', 'Adab')->first();
        $kitabah = $ujianitem->where('kategori', 'Kitabah')->first();
        

        // di group berdasarkan kategori
        $groupSurah = UjianItem::whereIn('kategori', $kategoriSurah)
                        ->get()          // Ambil semua data dari DB dalam 1 query
                        ->groupBy('kategori'); // Kelompokkan data setelah diambil

        return view('att.show', compact('murid', 'siswa', 'kelas',
                        'kelas', 'doa', 'hadis', 'adab', 'kitabah',
                        'sholat', 'wudhu', 'groupSurah'));
    }
}
