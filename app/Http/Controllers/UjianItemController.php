<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\UjianItem;
use Illuminate\Http\Request;

class UjianItemController extends Controller
{
    public function index()
    {
        $ujian_item = UjianItem::all();
        $items = UjianItem::with('ujian')->get();

        return view('ujian_item.index', [
            'ujian_item'=> $ujian_item,
            'items'=> $items
        ]);
    }

    public function create()
    {
        $ujian_item = UjianItem::all();

        return view('ujian_item.create', [
            'ujian_item'=> $ujian_item,
        ]);
    }

    public function store(Request $request, UjianItem $ujian_item)
    {
        // authoriz (on Hold)
        $validateData = $request->validate([
            'ujian_id' => ['required', 'exists:mapel,id'],
            'nama_item' => ['required'],
            'kategori' => ['required'],
            
        ]);

        //update data ujian
        $ujian_item->create($validateData);

        //redirect ke halaman ujian
        return redirect()->route('ujian.item.index')->with('success', 'data berhasil disimpan');
    }

    public function edit(UjianItem $ujian_item)
    {
        $ujian = Ujian::all();

        return view('ujian_item.edit', [
            'ujian_item'=> $ujian_item,
            'ujian' => $ujian
        ]);
    }

    public function update(Request $request, UjianItem $ujian_item)
    {
        // authoriz (on Hold)
        $validateData = $request->validate([
            'ujian_id' => ['required', 'exists:mapel,id'],
            'nama_item' => ['required'],
            'kategori' => ['required'],
            
        ]);

        //update data ujian
        $ujian_item->update($validateData);

        //redirect ke halaman ujian
        return redirect()->route('ujian.item.update', $ujian_item->id)->with('success', 'data berhasil disimpan');
    }
}
