<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataRuangan = Ruangan::all();

        return view('ruangan.index', compact('dataRuangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tervalidasi = $request->validate([
            'kode' => ['required', 'max:10', 'unique:ruangan,kode'],
            'nama' => ['required', 'string'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        Ruangan::create($tervalidasi);

        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        return view('ruangan.edit', compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ruangan = Ruangan::findOrFail($id);

        $tervalidasi = $request->validate([
            'kode' => ['required', 'max:10', 'unique:ruangan,kode'.$id],
            'nama' => ['required', 'string'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $ruangan->update($tervalidasi);

        return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil disunting');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();

        return redirect()->back()->with('success', 'Data ruangan berhasil dihapus');
    }
}
