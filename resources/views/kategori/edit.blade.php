@extends('layouts.app')

@section('title', 'Sunting Kategori')

@section('content')
    <div class="card fluid">
        <h2 class="section double-padded">Sunting Kategori</h2>

        <div class="section">
            <a
                class="button"
                href="{{ route('kategori.index') }}"
            >Kembali</a>
        </div>

        <div class="section">
            <form
                action="{{ route('kategori.update', $kategori->id) }}"
                method="POST"
            >
                @csrf
                @method('PUT')

                <fieldset>
                    <legend>Sunting kategori "{{ $kategori->nama }}"</legend>

                    <div class="input-group vertical">
                        <label for="kode">Kode</label>
                        <input
                            id="kode"
                            name="kode"
                            type="text"
                            value="{{ old('kode') ?? $kategori->kode }}"
                        />
                    </div>
                    @error('kode')
                        <mark class="secondary">{{ $message }}</mark>
                    @enderror

                    <div class="input-group vertical">
                        <label for="nama">Nama</label>
                        <input
                            id="nama"
                            name="nama"
                            type="text"
                            value="{{ old('nama') ?? $kategori->nama }}"
                        />
                    </div>
                    @error('nama')
                        <mark class="secondary">{{ $message }}</mark>
                    @enderror
                </fieldset>

                <div class="input-group">
                    <button class="primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
