<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\NilaiUjian;
use App\Models\NilaiAtt;
use App\Models\NilaiHafalan;
use App\Models\NilaiIqra;
use App\Models\Siswa;
use DB;
use Illuminate\Http\Request;
use App\Models\KelasSiswa;
use App\Models\UjianItem;
use App\Models\TahunAjaran;
use App\Models\Semester;

class NilaiAttController extends Controller
{
    public function index()
    {
        $siswa = KelasSiswa::with('kelas','siswa')->get();
        return view("att.index", compact('siswa'));

    }

    public function show(Request $request, $id)
    {
        // Ambil tahun ajaran dan semekter aktif
        $tahun = TahunAjaran::where('aktif', '1')->first();
        $semester = Semester::where('aktif', '1')->first();

        //ambil kelas berdasarkan IDSiswa
        $daftarsiswa = Siswa::all();
        $murid = KelasSiswa::with('siswa')->find( $id );
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
        $existingNilai = NilaiUjian::where('kelas_id', $kelas->id)
                                    ->where('ujian_id', '1')
                                    ->where('tahun_ajaran_id', $tahun->id)
                                    ->where('semester_id', $semester->id)
                                    ->get()
                                    ->keyBy(function($item){
                                        // buat key unik untuk memudahkan pencarian: siswa_id
                                        return $item->siswa_id . '_' . $item->ujian_item_id;
                                    });

        // Ambil nilai bacaan 
        $nilaiBacaan = NilaiIqra::where('siswa_id', $siswa->id)
                                ->where('tahun_ajaran_id', $tahun->id)
                                ->where('semester_id', $semester->id)
                                ->first();

        // Ambil nilai pencapaian 
        $nilaiHafalan = NilaiHafalan::where('siswa_id', $siswa->id)
                                ->where('tahun_ajaran_id', $tahun->id)
                                ->where('semester_id', $semester->id)
                                ->first();       

        // di group berdasarkan kategori
        $groupSurah = UjianItem::whereIn('kategori', $kategoriSurah)
                        ->get()          // Ambil semua data dari DB dalam 1 query
                        ->groupBy('kategori'); // Kelompokkan data setelah diambil

        return view('att.show', compact('murid', 'siswa', 'kelas', 'ujianitem', 'existingNilai',
                        'nilaiBacaan', 'nilaiHafalan', 'ujian', 'doa', 'hadis', 'adab', 'kitabah',
                        'sholat', 'wudhu', 'groupSurah', 'tahun', 'semester'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // Data
            'siswa_id'        => ['required', 'exists:siswa,id'],
            'kelas_id'        => ['required', 'exists:kelas,id'],
            'ujian_id'        => ['required', 'exists:ujian,id'],
            'tahun_ajaran_id' => ['required','exists:tahun_ajaran,id'],
            'semester_id'     => ['required','exists:semester,id'],

            // Nilai bacaan bentuk array
            'bacaan_nilai'    => 'nullable|numeric|min:0|max:100',

            // Nilai ujian
            'nilai'           => 'required|array',
            'nilai.*'         => 'nullable|min:0|max:100',

            //nilai target
            'target'          => 'nullable|string|max:20',
            'pencapaian'      => 'nullable|numeric|min:0|max:100',
            'terget_nilai'    => 'nullable|numeric|min:0|max:100',
        ]);

        // validasi bacaan
        $rules = [
            'jenis_bacaan'    => 'nullable|string|in:iqra,tahsin,alquran',
            'bacaan_nilai'    => 'nullable|numeric|min:0|max:100',
        ];

        if ($request->jenis_bacaan === 'alquran') {
            $rules['bacaan_jilid'] = 'nullable|numeric|min:0|max:30';
            $rules['bacaan_surah'] = 'nullable|string|max:40';
            $rules['bacaan_halaman'] = 'nullable|numeric|min:0|max:282';
            } else {
                $rules['bacaan_jilid'] = 'nullable|numeric|min:0|max:6';
                $rules['bacaan_halaman'] = 'nullable|numeric|min:0|max:40';
            }

        $request->validate($rules);

         /* dd($request->all()); */

        DB::beginTransaction();
        try {
            // data
            $siswaId = $request->siswa_id;
            $kelasId = $request->kelas_id;
            $ujianId = $request->ujian_id;
            $ujianItemId = $request->item_id;
            $tahunAjaranId = $request->tahun_ajaran_id;
            $semesterId = $request->semester_id;

            /* 1. Simpan data bacaan */
            foreach ($request->nilai as $loopSiswa => $itemArray){
            foreach ($itemArray as $ujianItemId =>$value){
                NilaiUjian::updateOrCreate([
                    'siswa_id' => $loopSiswa, 
                    'kelas_id' => $kelasId,
                    'ujian_id' => $ujianId,
                    'ujian_item_id' => $ujianItemId,
                    'tahun_ajaran_id' => $tahunAjaranId,
                    'semester_id' => $semesterId
                    ],
                    [
                        'nilai' => $value ?? null
                    ]);
                }
            };

            // 2. Simpan Nilai Bacaan
/*             NilaiIqra::updateOrCreate(
            [
                'siswa_id' => $siswaId,
                'tahun_ajaran_id' => $tahunAjaranId,
                'semester_id' => $semesterId
            ],
            [
                'jenis'   => $request->jenis_bacaan,
                'jilid'   => $request->bacaan_jilid ?? null,
                'halaman' => $request->bacaan_halaman ?? null,
                'surah'   => $request->bacaan_surah ?? null,
                'nilai'   => $request->bacaan_nilai ?? null
            ], */

            if ($request->jenis_bacaan === 'alquran') {
                NilaiIqra::updateOrCreate(
                [
                    'siswa_id'        => $siswaId,
                    'tahun_ajaran_id' => $tahunAjaranId,
                    'semester_id'     => $semesterId
                ],
                [
                    'jenis'   => 'alquran',
                    'juz'     => $request->bacaan_jilid ?? null,
                    'surah'   => $request->bacaan_surah ?? null,
                    'ayat'    => $request->bacaan_halaman ?? null,
                    'nilai'   => $request->bacaan_nilai ?? null,
                    'jilid'   => $request->null,
                    'halaman' => $request->null,
                ],
                );
            } else {
                NilaiIqra::updateOrCreate(
                [
                    'siswa_id'       => $siswaId,
                    'tahun_ajaran_id' => $tahunAjaranId,
                    'semester_id'     => $semesterId,
                ],
                [
                    'jenis'   => $request->jenis_bacaan,
                    'jilid'   => $request->bacaan_jilid ?? null,
                    'halaman' => $request->bacaan_halaman ?? null,
                    'nilai'   => $request->bacaan_nilai ?? null,
                    'juz'     => null,
                    'surah'   => null,
                    'ayat'    => null,
                ]);
                    }
            
            NilaiHafalan::updateOrCreate(
                [
                    'siswa_id'        => $siswaId,
                    'tahun_ajaran_id' => $tahunAjaranId,
                    'semester_id'     => $semesterId,
                ],
                [
                    'terget'     => $request->target ?? null,
                    'pencapaian' => $request->pencapaian ?? null,
                    'nilai'      => $request->target->nilai ?? null,
                ]
                );
            
            

            DB::commit();
            return back()->withInput()->with('success', 'Nilai berhasil disimpan');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        





        // disimpan dulu, untuk diperbaiki
        // $request->validate([
        /*    'siswa_id' => ['required','exists:siswa','id'],
            'kelas_id' => ['required', 'exists:kelas,id'],
            'ujian_id' => ['required', 'exists:ujian,id'],
            'tahun_ajaran_id' => ['required','exists:tahun_ajaran,id'],
            'semester_id' => ['required','exists:semester,id'],
            'nilai' => ['array']
        ]);


        dd($request->nilai,
         $request->kelas_id,
         $request->ujian_id,
         $request->tahun_ajaran_id,
         $request->semester_id,
        ); 

        // $tahun = TahunAjaran::where('aktif', true)->first();
        //$semester = Semester::where('aktif', true)->first(); 

        foreach ($request->nilai as $siswa_id => $itemArray){
            foreach ($itemArray as $item_id =>$value){
                NilaiUjian::updateOrCreate([
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

        return back()->withInput()->with('success', 'Nilai berhasil disimpan'); */
    }
}
