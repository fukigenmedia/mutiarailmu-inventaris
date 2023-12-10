@extends('layouts.app')

@section('title', 'Sunting Barang')

@section('content')
    <form
        class="card"
        action="{{ route('barang.update', $barang->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        <div class="card-header">
            <h4>Sunting Barang "{{ $barang->nama }}"</h4>
        </div>

        <div class="card-header">
            <a
                class="btn btn-secondary"
                href="{{ route('barang.index') }}"
            >Kembali</a>
        </div>

        <div class="card-body">
            @csrf
            @method('put')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="kode"
                        >Kode</label>

                        <input
                            class="form-control @error('kode') is-invalid @enderror"
                            id="kode"
                            name="kode"
                            type="text"
                            value="{{ old('kode') ?? $barang->kode }}"
                        >

                        @error('kode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="barcode"
                        >Barcode</label>

                        <input
                            class="form-control @error('barcode') is-invalid @enderror"
                            id="barcode"
                            name="barcode"
                            type="number"
                            value="{{ old('barcode') ?? $barang->barcode }}"
                        >

                        @error('barcode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="merk"
                        >Merk</label>

                        <input
                            class="form-control @error('merk') is-invalid @enderror"
                            id="merk"
                            name="merk"
                            type="text"
                            value="{{ old('merk') ?? $barang->merk }}"
                        >

                        @error('merk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="kategori"
                        >Kategori</label>

                        <select
                            class="form-select @error('kategori') is-invalid @enderror"
                            id="kategori"
                            name="kategori"
                        >
                            <option value="">Pilih</option>
                            @foreach ($dataKategori as $kategori)
                                <option
                                    value="{{ $kategori->id }}"
                                    @selected(old('kategori') ?? $barang->id_kategori == $kategori->id)
                                >{{ $kategori->nama }}</option>
                            @endforeach
                        </select>

                        @error('kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="nama"
                        >Nama</label>

                        <input
                            class="form-control @error('nama') is-invalid @enderror"
                            id="nama"
                            name="nama"
                            type="text"
                            value="{{ old('nama') ?? $barang->nama }}"
                        >

                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="kondisi"
                        >Kondisi</label>

                        <select
                            class="form-select @error('kondisi') is-invalid @enderror"
                            id="kondisi"
                            name="kondisi"
                        >
                            <option value="">Pilih</option>
                            @foreach ($dataKondisi as $key => $kondisi)
                                <option
                                    value="{{ $key }}"
                                    @selected(old('kondisi') ?? $barang->kondisi == $key)
                                >{{ $kondisi }}</option>
                            @endforeach
                        </select>

                        @error('kondisi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="harga"
                        >Harga</label>

                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>

                            <input
                                class="form-control @error('harga') is-invalid @enderror"
                                id="harga"
                                name="harga"
                                type="number"
                                value="{{ old('harga') ?? $barang->harga }}"
                            >

                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="foto"
                        >Foto</label>

                        <input
                            class="form-control @error('foto') is-invalid @enderror"
                            id="foto"
                            name="foto"
                            type="file"
                            value="{{ old('foto') }}"
                        >

                        <small class="text-muted">Kosongkan jika tidak ingin mengubah.</small>

                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label
                            class="form-label"
                            for="deskripsi"
                        >Deskripsi</label>

                        <textarea
                            class="form-control @error('deskripsi') is-invalid @enderror"
                            id="deskripsi"
                            name="deskripsi"
                        >{{ old('deskripsi') ?? $barang->deskripsi }}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="mb-2">Apakah Barang Pecah Belah?</label>

                        <div class="form-check">
                            <input
                                class="form-check-input @error('apakahPecahBelah') is-invalid @enderror"
                                id="pecah-belah-ya"
                                name="apakahPecahBelah"
                                type="radio"
                                value="ya"
                                @checked(old('apakahPecahBelah') == 'ya' || $barang->apakah_pecah_belah == true)
                            >

                            <label
                                class="form-check-label"
                                for="pecah-belah-ya"
                            >
                                Ya
                            </label>
                        </div>

                        <div class="form-check">
                            <input
                                class="form-check-input @error('apakahPecahBelah') is-invalid @enderror"
                                id="pecah-belah-tidak"
                                name="apakahPecahBelah"
                                type="radio"
                                value="tidak"
                                @checked(old('apakahPecahBelah') == 'tidak' || $barang->apakah_pecah_belah == false)
                            >
                            <label
                                class="form-check-label"
                                for="pecah-belah-tidak"
                            >
                                Tidak
                            </label>
                            @error('apakahPecahBelah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
@endsection
