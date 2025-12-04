<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\TahunAjaran;

class TahunAjaranController extends Controller
{
    public function index()
    {
        $tahunajaran = TahunAjaran::all();
        
        return view('tahunajaran.index', [
            'tahunajaran' => $tahunajaran

        ]);
    
    }

    public function create()
    {
        return view('tahunajaran.create');
    }

    public function store(Request $request, TahunAjaran $tahunAjaran)
    {
        //validate
        $validateData = $request->validate([
            'tahun_mulai' => ['required', 'integer', 'min:2000', 'max:2100', 'unique:tahun_ajaran,tahun_mulai'],
            'tahun_selesai' => ['required', 'integer', 'after_or_equal:tahun_mulai', 'unique:tahun_ajaran,tahun_selesai'],
            'status' => ['required', 'boolean']
        ]);

        // Cek selisih tepat 1 tahun (logika tambahan)
        $mulai = (int) $request->tahun_mulai;
        $selesai = (int) $request->tahun_selesai;

        if (($selesai - $mulai) != 1) {
            return redirect()->back()->withErrors([
                'tahun_selesai'=> 'Tahun selesai harus tepat satu tahun setelahnya'
            ])->withInput();
        }

        // simpan tahun ajaran
        TahunAjaran::create($validateData);

        // redirect ke halaman tahun ajaran
        return redirect('/tahunajaran');
    }

    public function edit(TahunAjaran $tahunajaran)
    {
        // jika belum login, redirect ke halaman login
        /* if (Auth::guest()) {
            return redirect('/login');
        } */

        return view('tahunajaran.edit', [
            'tahunajaran' => $tahunajaran
        ]);
    }

    public function update(Request $request, TahunAjaran $tahunajaran)
    {
        //validate
        $validateData = $request->validate([
            'tahun_mulai' => ['required', 'integer', 'min:2000', 'max:2100',
            Rule::unique('tahun_ajaran', 'tahun_mulai')->ignore($tahunajaran->id)],
            'tahun_selesai' => ['required', 'integer', 'after_or_equal:tahun_mulai'],
            'status' => ['required']
        ]); 

        // Cek selisih tepat 1 tahun (logika tambahan)
        $mulai = (int) $request->tahun_mulai;
        $selesai = (int) $request->tahun_selesai;

        if ($selesai - $mulai != 1) {
            return redirect()->back()->withErrors([
                'tahun_selesai'=> 'Tahun selesai harus tepat satu tahun setelahnya'
            ])->withInput();
        }

        // simpan tahun ajaran
        $tahunajaran->update ($validateData);

        // redirect ke halaman tahun ajaran
        return redirect('/tahunajaran');
    }
}
