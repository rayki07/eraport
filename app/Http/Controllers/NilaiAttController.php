<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Nilai_ujian;
use App\Models\NilaiAtt;
use App\Models\Siswa;
use DB;
use Illuminate\Http\Request;
use App\Models\Kelas_siswa;
use App\Models\UjianItem;
use App\Models\TahunAjaran;
use App\Models\Semester;

class NilaiAttController extends Controller
{
    public function index()
    {
        $siswa = Kelas_siswa::with('kelas','siswa')->get();
        return view("att.index", compact('siswa'));

    }

    public function show(Request $request, $id)
    {
        // Ambil tahun ajaran dan semekter aktif
        $tahun = TahunAjaran::where('aktif', '1')->first();
        $semester = Semester::where('aktif', '1')->first();

        //ambil kelas berdasarkan IDSiswa
        $daftarsiswa = Siswa::all();
        $murid = Kelas_siswa::with('siswa')->find( $id );
        $ujianitem = UjianItem::all();
        $ujian = UjianItem::with('ujian')->first();
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


        // Ambil nilai ujian yang ada
        $existingNilai = Nilai_ujian::where('kelas_id', $kelas->id)
                                    ->where('ujian_id', '1')
                                    ->where('tahun_ajaran_id', $tahun->id)
                                    ->where('semester_id', $semester->id)
                                    ->get()
                                    ->keyBy(function($item){
                                        // buat key unik untuk memudahkan pencarian: siswa_id
                                        return $item->siswa_id . '_' . $item->ujian_item_id;
                                    });

/*         $cobaan = $coba->nilai; */
        /* dd($daftarsiswa->nama_siswa); */
        

        // di group berdasarkan kategori
        $groupSurah = UjianItem::whereIn('kategori', $kategoriSurah)
                        ->get()          // Ambil semua data dari DB dalam 1 query
                        ->groupBy('kategori'); // Kelompokkan data setelah diambil

        return view('att.show', compact('murid', 'siswa', 'kelas', 'ujianitem', 'existingNilai',
                        /* 'nilai' */ 'ujian', 'doa', 'hadis', 'adab', 'kitabah',
                        'sholat', 'wudhu', 'groupSurah', 'tahun', 'semester'));
    }

    public function store(Request $request)
    {
        $request->validate([
            /* 'kelas_id' => 'required',
            'ujian_id' => 'required', */
            'nilai' => 'array'
        ]);


        /* dd($request->nilai,
         $request->kelas_id,
         $request->ujian_id,
         $request->tahun_ajaran_id,
         $request->semester_id,
        ); */

/*         $tahun = TahunAjaran::where('aktif', true)->first();
        $semester = Semester::where('aktif', true)->first(); */

        foreach ($request->nilai as $siswa_id => $itemArray){
            foreach ($itemArray as $item_id =>$value){
                Nilai_ujian::updateOrCreate([
                    'siswa_id' => $siswa_id, 
                    'kelas_id' => $request->kelas_id,
                    'ujian_id' => $request->ujian_id,
                    'ujian_item_id' => $item_id,
                    'tahun_ajaran_id' => $request->tahun_ajaran_id,
                    'semester_id' => $request->semester_id
                ],
                [
                    'nilai' => $value ?? null
                ]);
            }
        }

        /* return redirect(route('att.show')); */
        return back()->withInput()->with('success', 'Nilai berhasil disimpan');
    }
}
