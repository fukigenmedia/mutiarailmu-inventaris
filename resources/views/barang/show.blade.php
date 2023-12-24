@extends('layouts.app')

@section('title', 'Sunting Barang')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Detail Barang "{{ $barang->nama }}"</h4>
        </div>

        <div class="card-header">
            <a
                class="btn btn-secondary"
                href="{{ route('barang.index') }}"
            >Kembali</a>
        </div>

        <div class="card-body">
            <ol class="list-group">
                @if ($barang->apakah_pecah_belah)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="me-auto ms-2">
                            <span class="badge bg-warning">Barang Pecah Belah!</span> <br>
                        </div>
                    </li>
                @endif

                @if ($barang->foto)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="me-auto ms-2">
                            <img
                                class="w-100 rounded"
                                src="{{ asset('storage/' . $barang->foto) }}"
                                alt="Foto {{ $barang->nama }}"
                            />
                        </div>
                    </li>
                @endif

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>Nama</span>
                        <div class="fw-bold">{{ $barang->nama }}</div>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>Kode</span>
                        <div class="fw-bold">{{ $barang->kode }}</div>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>Barcode</span>
                        <div class="fw-bold">{{ $barang->barcode }}</div>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>Kondisi</span>
                        <div class="fw-bold">{{ $barang->kondisi_label }}</div>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>Kategori</span>
                        <div class="fw-bold">{{ $barang->kategori->nama }}</div>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>Merk</span>
                        <div class="fw-bold">{{ $barang->merk ?? '-' }}</div>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>Harga</span>
                        <div class="fw-bold">Rp. {{ $barang->harga }},-</div>
                    </div>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="me-auto ms-2">
                        <span>Deskripsi</span>
                        <div class="fw-bold">{{ $barang->deskripsi }}</div>
                    </div>
                </li>
            </ol>
        </div>
    </div>
@endsection
