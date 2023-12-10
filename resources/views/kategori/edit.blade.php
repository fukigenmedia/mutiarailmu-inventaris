@extends('layouts.app')

@section('title', 'Sunting Kategori')

@section('content')
    <form
        class="card"
        action="{{ route('kategori.update', $kategori->id) }}"
        method="POST"
    >
        <div class="card-header">
            <h4>Sunting Kategori "{{ $kategori->nama }}"</h4>
        </div>

        <div class="card-header">
            <a
                class="btn btn-secondary"
                href="{{ route('kategori.index') }}"
            >Kembali</a>
        </div>

        <div class="card-body">
            @csrf
            @method('put')

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
                    value="{{ old('kode') ?? $kategori->kode }}"
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
                    value="{{ old('nama') ?? $kategori->nama }}"
                >

                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
@endsection
