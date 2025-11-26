<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view("siswa.index", [
            "siswa"=> $siswa
        ]);
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function show(Siswa $siswa)
    {
        return view('siswa.show', ['siswa' =>$siswa]);
    }

    public function store()
    {
        request()->validate([
            'nis' => ['required'],
            'nisn' => ['required'],
            'nama' => ['required'],
            'gender' => ['required']
        ]);

        Siswa::create([
            'nis' =>request('nis'),
            'nisn' =>request('nisn'),
            'nama' =>request('nama'),
            'gender' =>request('gender')
            
        ]);

        return redirect('/siswa');
    }
    
}
