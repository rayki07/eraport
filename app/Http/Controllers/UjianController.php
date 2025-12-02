<?php

namespace App\Http\Controllers;
use App\Models\Mapel;
use App\Models\Ujian;

use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index()
    {   $ujian = Ujian::all();
            return view('ujian.index', [
                'ujian' => $ujian
            ]);
    }

    public function edit(Ujian $ujian)
    {
        $mapel = Mapel::all();

        return view('ujian.edit', [
            'mapel' => $mapel,
            'ujian' => $ujian
        ]);
    }

    public function create(Ujian $ujian)
    {
        $mapel = Mapel::all();

        return view('ujian.create', [
            'mapel'=> $mapel
        ]);
    }

    public function store(Request $request, Ujian $ujian)
    {
        // authoriz (on Hold)
        $validateData = $request->validate([
            'nama_ujian' => ['required'],
            'mapel_id' => ['required', 'exists:mapel,id']
        ]);

        //update data ujian
        $ujian->create($validateData);

        //redirect ke halaman ujian
        return redirect()->route('ujian.index')->with('success', 'data berhasil disimpan');
    }

    public function update(Request $request, Ujian $ujian)
    {
        // authoriz (on Hold)
        $validateData = $request->validate([
            'nama_ujian' => ['required'],
            'kategori' => ['required'],
            'mapel_id' => ['required', 'exists:mapel,id']
        ]);

        //update data ujian
        $ujian->update($validateData);

        //redirect ke halaman ujian
        return redirect()->route('ujian.index')->with('success', 'data berhasil disimpan');
    }
}
