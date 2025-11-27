<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Siswa;
USe Maatwebsite\Excel\Facades\Excel;

class SiswaImportController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.import', [
            "siswa"=> $siswa
        ]);
        

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

    //konfirmasi dan simpan
    public function confirm(Request $request)
    {
        $filecontent = base64_decode($request->file_content);
        $tempFile = tempnam(sys_get_temp_dir(), 'excel');
        file_put_contents($tempFile, $filecontent);

        $rows = Excel::toArray([], $tempFile)[0];
        
        $inserted = 0;
        $skipped = 0;

        foreach ($rows as $row) {
            $nama =trim($row[0]);

            if ($nama == '') continue;

            // Validasi Duplikat
            $exists = Siswa::where('nama', $nama)->exists();
            if ($exists) {
                $skipped++;
                continue;
            }

            Siswa::create([
                'nis' => $nama
            ]);

            $inserted++;

            return redirect()
                ->route('siswa.import.form')
                ->with('success', "$inserted data berhasil disimpan, $skipped data duplikat dilewati.");
        }
    }
}
