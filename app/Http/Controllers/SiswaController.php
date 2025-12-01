<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use illuminate\Support\Str;

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

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', ['siswa' =>$siswa]);

    }

    public function store(Request $request)
    {
        request()->validate([
            'nama_lengkap' => ['required'],
            'gender' => ['required']
        ]);

        Siswa::create([
            'nis' =>request('nis'),
            'nisn' =>request('nisn'),
            'nama_lengkap' =>request('nama_lengkap'),
            'gender' =>request('gender')
            
        ]);

        return redirect('/siswa');
    }
    
    /**
     * Menyimpan data siswa dari file import (Import File).
     */
    public function import(Request $request)
    {
        // Validasi file
        $request->validate([
            'import_file' => 'required|file|mimes:xls,xlsx,csv|max:2048', // Batas 2MB
        ]);

        $file = $request->file('import_file');
        
        // LOGIKA UTAMA IMPORT
        // Dalam aplikasi nyata, Anda akan menggunakan package seperti Laravel Excel di sini:
        
        try {
            Excel::import(new SiswaImport, $file);
            
            // Memberikan notifikasi sukses (simulasi)
            $fileName = $file->getClientOriginalName();
            return redirect()->route('siswa.index')->with('success', "File **{$fileName}** berhasil diupload dan data siswa berhasil diimpor!");
        
        } catch (\Exception $e) {
            // Jika ada error pada format file, duplikasi, atau error server lainnya
            return redirect()->back()->withInput()->with('error', 'Gagal memproses file. Pastikan format file sudah benar dan tidak ada duplikasi data NISN.');
        }
    }

     // Preview sebelum disimpan
    public function preview(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $path = $request->file('file')->getRealPath();

        //Ambil data tanpa simpan
        $data = Excel::toArray([], $path)[0];

        return view('siswa.preview', [
            'data' => $data,
            'file' => base64_encode(file_get_contents($request->file('file')))
        ]);
    }

    public function update(Siswa $siswa)
    {
        // authorize
        // validate
        request()->validate([
            'nis' => ['required'],
            'nisn' => ['required'],
            'nama_lengkap' => ['required'],
            'gender' => ['required']
        ]);

        //update siswa
        $siswa->update([
            'nis' => request('nis'),
            'nisn' => request('nisn'),
            'nama_lengkap' => request('nama_lengkap'),
            'gender' => request('gender')
        ]);

        //kembali ke halaman siswa
        return redirect("/siswa/{$siswa->id}");

    }
}
