<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $dataKategori = Kategori::all();

        return view('kategori.index', compact('dataKategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $tervalidasi = $request->validate([
            'kode' => ['required', 'max:10', 'unique:kategori,kode'],
            'nama' => ['required', 'string'],
        ]);

        Kategori::create($tervalidasi);

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $tervalidasi = $request->validate([
            'kode' => ['required', 'max:10', 'unique:kategori,kode,'.$kategori->id],
            'nama' => ['required', 'string'],
        ]);

        $kategori->update($tervalidasi);

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil disunting');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Data kategori berhasil dihapus');
    }
}
