@extends('layouts.app')

@section('title', 'Tambah Ruangan')

@section('content')
    <form
        class="card"
        action="{{ route('ruangan.store') }}"
        method="POST"
    >
        <div class="card-header">
            <h4>Tambah Ruangan</h4>
        </div>

        <div class="card-header">
            <a
                class="btn btn-secondary"
                href="{{ route('ruangan.index') }}"
            >Kembali</a>
        </div>

        <div class="card-body">
            @csrf

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
                    value="{{ old('kode') }}"
                >

                @error('kode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

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
                    value="{{ old('nama') }}"
                >

                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label
                    class="form-label"
                    for="deskripsi"
                >Deskripsi</label>

                <textarea
                    class="form-control @error('deskripsi') is-invalid @enderror"
                    id="deskripsi"
                    name="deskripsi"
                >{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
