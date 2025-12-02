<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function store()
    {
        //validate
        request()->validate([
            'tahun_mulai' => ['required'],
            'tahun_selesai' => ['required'],
            'status' => ['required']
        ]);

        // simpan tahun ajaran
        TahunAjaran::create([
            'tahun_mulai' =>request('tahun_mulai'),
            'tahun_selesai' =>request('tahun_selesai'),
            'status' =>request ('status')
        ]);

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

    public function update(TahunAjaran $tahunajaran)
    {
        //authorize (on hold)
        //validate
        request()->validate([
            'tahun_mulai' => ['required'],
            'tahun_selesai' => ['required'],
            'status' => ['required']
        ]);

        // update tahun ajaran
        $tahunajaran->update([
            'tahun_mulai' => request('tahun_mulai'),
            'tahun_selesai' => request('tahun_selesai'),
            'status' => request('status')
        ]);

        //redirect ke halaman Tahun Ajaran
        return redirect("/tahunajaran");
    }
}
