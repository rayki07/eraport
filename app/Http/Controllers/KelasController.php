<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        //menampilkan grade diurut dari yang terkecil
        /* $kelas = Kelas::orderBy('kelas','asc')->get(); */
        /* $kelas = Kelas::all(); */
        $kelas = Kelas::with('tahunajaran')->get();
        return view("kelas.index", [
            "kelas"=> $kelas
        ]);
    }

    public function show(kelas $kelas)
    {
        return view('kelas.show', ['kelas' =>$kelas]);
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'rombel' => ['required'],
            'nama' => ['required']
        ]);

        Kelas::create([
            'rombel' =>request('rombel'),
            'nama' =>request('nama'),           
        ]);

        return redirect('/kelas');
    }

    public function update(Request $request, Kelas $kelas)
    {
        //authorize (on hold)
        //validate dan dapatkan data yang bersih
        $validateData = $request->validate([
            'rombel' => ['required', 'string', 'max:1'],
            'nama' => ['required', 'string', 'max:15'],
            'tahun_ajaran_id' => ['required', 'exists:tahun_ajaran,id']
        ]);

        //update kelas menggunakan data yang divalidasi
        $kelas->update($validateData);

        //redirect ke halaman kelas
        return redirect()->route('kelas.show', $kelas->id)->with('success', 'Data kelas berhasil diperbarui');
    }

    public function edit(Kelas $kelas)
    {
        $tahunajaran = TahunAjaran::all();
        // jika belum login, redirect ke halaman login
        /* if (Auth::guest()) {
            return redirect('/login');
        } */

        return view('kelas.edit', ['kelas' => $kelas, 'tahunajaran' => $tahunajaran]);
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
