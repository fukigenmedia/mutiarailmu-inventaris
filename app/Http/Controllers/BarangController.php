<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cariNama = $request->query('cari_nama');
        $cariKode = $request->query('cari_kode');
        $cariKondisi = $request->query('cari_kondisi');
        $cariKategori = $request->query('cari_kategori');

        $dataBarang = Barang::query()
            ->when($cariNama, fn ($query) => $query->where('nama', 'like', "%$cariNama%"))
            ->when($cariKondisi, fn ($query) => $query->where('kondisi', $cariKondisi))
            ->when($cariKategori, fn ($query) => $query->where('id_kategori', $cariKategori))
            ->when($cariKode, function ($query, $value) {
                $query->where('kode', $value)->orWhere('barcode', $value);
            })
            ->with('kategori')
            ->get();

        $dataKategori = Kategori::all();
        $dataKondisi = Barang::KONDISI;

        return view('barang.index', compact('dataBarang', 'dataKategori', 'dataKondisi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataKategori = Kategori::all();
        $dataKondisi = Barang::KONDISI;

        return view('barang.create', compact('dataKategori', 'dataKondisi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tervalidasi = $request->validate([
            'kode' => ['required', 'unique:barang,kode'],
            'barcode' => ['nullable', 'integer'],
            'merk' => ['nullable', 'string'],
            'kategori' => ['required', 'integer'],
            'nama' => ['required', 'string'],
            'kondisi' => ['required', Rule::in(array_keys(Barang::KONDISI))],
            'harga' => ['required', 'integer'],
            'foto' => ['nullable', 'image', 'max:2048'],
            'deskripsi' => ['nullable', 'string'],
            'apakahPecahBelah' => ['required', 'in:ya,tidak'],
        ]);

        $tervalidasi['apakah_pecah_belah'] = $tervalidasi['apakahPecahBelah'] === 'ya';
        $tervalidasi['id_kategori'] = $tervalidasi['kategori'];

        $cekKategori = Kategori::where('id', $tervalidasi['id_kategori'])->exists();
        if (! $cekKategori) {
            return redirect()->back()->with('failed', 'Kategori tidak ditemukan');
        }

        if ($request->hasFile('foto')) {
            $namaFile = time().'_'.Str::snake($request->foto->getClientOriginalName());
            $tervalidasi['foto'] = $request->file('foto')->storeAs('images/barang', $namaFile, 'public');
        }

        Barang::create($tervalidasi);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::with('kategori')->firstOrFail($id);

        return view('barang.edit', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);
        $dataKategori = Kategori::all();
        $dataKondisi = Barang::KONDISI;

        return view('barang.edit', compact('barang', 'dataKategori', 'dataKondisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = Barang::findOrFail($id);

        $tervalidasi = $request->validate([
            'kode' => ['required', 'unique:barang,kode,'.$id],
            'barcode' => ['nullable', 'integer'],
            'merk' => ['nullable', 'string'],
            'kategori' => ['required', 'integer'],
            'nama' => ['required', 'string'],
            'kondisi' => ['required', Rule::in(array_keys(Barang::KONDISI))],
            'harga' => ['required', 'integer'],
            'foto' => ['nullable', 'image', 'max:2048'],
            'deskripsi' => ['nullable', 'string'],
            'apakahPecahBelah' => ['required', 'in:ya,tidak'],
        ]);

        $tervalidasi['apakah_pecah_belah'] = $tervalidasi['apakahPecahBelah'] === 'ya';
        $tervalidasi['id_kategori'] = $tervalidasi['kategori'];

        $cekKategori = Kategori::where('id', $tervalidasi['id_kategori'])->exists();
        if (! $cekKategori) {
            return redirect()->back()->with('failed', 'Kategori tidak ditemukan');
        }

        $barang->update($tervalidasi);

        if ($request->hasFile('foto')) {
            if ($barang->foto) {
                Storage::disk('public')->delete($barang->foto);
            }

            $namaFile = time().'_'.Str::snake($request->foto->getClientOriginalName());
            $fotoBaru = $request->file('foto')->storeAs('images/barang', $namaFile, 'public');
            $barang->update(['foto' => $fotoBaru]);
        }

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil disunting');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);

        if ($barang->foto) {
            Storage::disk('public')->delete($barang->foto);
        }

        $barang->delete();

        return redirect()->back()->with('success', 'Data barang berhasil dihapus');
    }
}
