<?php

namespace App\Http\Controllers;

use App\Models\Ujian_item;
use Illuminate\Http\Request;

class UjianItemController extends Controller
{
    public function index()
    {
        $ujian_item = Ujian_item::all();

        return view('ujian_item.index', [
            'ujian_item'=> $ujian_item,
        ]);
    }

    public function create()
    {
        $ujian_item = Ujian_item::all();

        return view('ujian_item.create', [
            'ujian_item'=> $ujian_item,
        ]);
    }

    public function store(Request $request, Ujian_item $ujian_item)
    {
        // authoriz (on Hold)
        $validateData = $request->validate([
            'ujian_id' => ['required', 'exists:mapel,id'],
            'nama_item' => ['required'],
            'jenis' => ['required'],
            
        ]);

        //update data ujian
        $ujian_item->create($validateData);

        //redirect ke halaman ujian
        return redirect()->route('ujian.item.index')->with('success', 'data berhasil disimpan');
    }
}
