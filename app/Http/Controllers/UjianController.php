<?php

namespace App\Http\Controllers;
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
}
