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
}
