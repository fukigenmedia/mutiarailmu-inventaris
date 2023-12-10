@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Daftar Barang</h4>
        </div>

        <div class="card-header">
            <a
                class="btn btn-dark"
                href="{{ route('barang.create') }}"
            >Tambah</a>

            <button
                class="btn btn-secondary"
                type="button"
                onclick="toggle('cari-wrapper')"
            >Filter</button>
        </div>

        <form
            class="card-header"
            id="cari-wrapper"
            style="display:none"
            action="{{ route('barang.index') }}"
            method="GET"
        >
            <div class="row">
                {{--
    cari_nama
cari_kode
cari_kondisi
cari_kategori
hanya_pecah_belah
 --}}

                <div class="col-md-3">
                    <input
                        class="form-control mb-2"
                        name="cari_nama"
                        type="search"
                        value="{{ request()->query('cari_nama') }}"
                        placeholder="Cari Nama"
                    >
                </div>

                <div class="col-md-3">
                    <input
                        class="form-control mb-2"
                        name="cari_kode"
                        type="search"
                        value="{{ request()->query('cari_kode') }}"
                        placeholder="Cari Kode/Barcode"
                    >
                </div>

                <div class="col-md-3">
                    <select
                        class="form-select mb-2"
                        name="cari_kondisi"
                    >
                        <option value="">Pilih Kondisi</option>
                        @foreach ($dataKondisi as $key => $kondisi)
                            <option
                                value="{{ $key }}"
                                @selected(request()->query('cari_kondisi') == $key)
                            >{{ $kondisi }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <select
                        class="form-select mb-2"
                        name="cari_kategori"
                    >
                        <option value="">Pilih Kategori</option>
                        @foreach ($dataKategori as $kategori)
                            <option
                                value="{{ $kategori->id }}"
                                @selected(request()->query('cari_kategori') == $kategori->id)
                            >{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 text-end">
                    <a
                        class="btn"
                        href="{{ route('barang.index') }}"
                    >Batal</a>

                    <button class="btn btn-success">Cari</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th width="10px">#</th>
                        <th>Kode</th>
                        <th width="250px"></th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th width="220px">Aksi</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">
                    @forelse ($dataBarang as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $barang->kode }} <br> {{ $barang->barcode }}</td>
                            <td>
                                @if ($barang->apakah_pecah_belah)
                                    <span class="badge bg-warning">Hati-hati!</span> <br>
                                @endif

                                @if ($barang->foto)
                                    <img
                                        class="w-100 rounded"
                                        src="{{ asset('storage/' . $barang->foto) }}"
                                        alt="Foto {{ $barang->nama }}"
                                    />
                                @endif
                            </td>
                            <td>{{ $barang->merk }} {{ $barang->nama }}</td>
                            <td>{{ $barang->kategori->nama }}</td>
                            <td>Rp. {{ $barang->harga }},-</td>
                            <td>
                                <a
                                    class="btn btn-sm btn-secondary"
                                    href="{{ route('barang.show', $barang->id) }}"
                                >Detail</a>

                                <a
                                    class="btn btn-sm btn-dark"
                                    href="{{ route('barang.edit', $barang->id) }}"
                                >Sunting</a>

                                <a
                                    class="btn btn-sm btn-danger"
                                    onclick="hapusData('barang', '{{ $barang->id }}')"
                                >Hapus</a>

                                <form
                                    id="hapus-barang-{{ $barang->id }}"
                                    style="display: none"
                                    action="{{ route('barang.destroy', $barang->id) }}"
                                    method="post"
                                >
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="my-5 text-center">
                                    Data tidak ditemukan.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
