<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        //menampilkan grade diurut dari yang terkecil
        $kelas = Kelas::orderBy('kelas','asc')->get();
        return view("kelas.index", [
            "kelas"=> $kelas
        ]);
    }

    public function show(kelas $kelas)
    {
        return view('kelas.show', ['kelas' =>$kelas]);
    }

    // Halaman daftar siswa berdasarkan kelas
    public function siswa($id)
    {
        $kelas = Kelas::findOrFail($id);

        // ambil semua siswa di kelas itu
        $siswa = $kelas->siswa()->orderBy('nama')->get();

        return view('kelas.siswa', compact('kelas', 'siswa'));
    }

}
