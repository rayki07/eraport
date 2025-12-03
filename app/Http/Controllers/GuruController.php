<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', [
            'guru' => $guru
        ]);
    }

    public function show(Guru $guru)
    {
        return view('guru.index', [
            'guru' => $guru
        ]);
    }

    public function create()
    {
        return view('guru.create');
    }

        public function edit(Guru $guru)
    {
        return view('guru.edit', [
            'guru' => $guru
        ]);
    }

    public function store(Request $request, Guru $guru)
    {
        $validateData = $request->validate([
            'nip' => ['string', 'max:15'],
            'nama_lengkap' => ['required', 'string', 'max:30'],
            'nama_panggilan' => ['string', 'max:30'],
            'gender' => ['required', 'max:1']
        ]);

        $guru->create($validateData);

        return redirect('/guru');
    }

    public function update(Request $request, Guru $guru)
    {
        $validateData = $request->validate([
            'nip' => ['string', 'max:30'],
            'nama_lengkap' => ['required', 'string', 'max:30'],
            'nama_panggilan' => ['string', 'max:30'],
            'gender' => ['required', 'max:1']
        ]);

        $guru->update($validateData);

        return redirect('/guru');
    }
}
