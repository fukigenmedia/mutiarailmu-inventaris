@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
    <div class="card fluid">
        <h2 class="section double-padded">Daftar Kategori</h2>

        <div class="section">
            <a
                class="button"
                href="{{ route('kategori.create') }}"
            >Tambah</a>
        </div>

        <div class="section">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataKategori as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->kode }}</td>
                            <td>{{ $kategori->nama }}</td>
                            <td>
                                <a
                                    href="{{ route('kategori.edit', $kategori->id) }}"
                                    role="button"
                                ><span class="icon-edit"></span></a>

                                <a
                                    role="button"
                                    onclick="if(confirm('Apakah Anda yakin ingin menghapus kategori ini?')) { event.preventDefault(); document.getElementById('hapus-kategori').submit(); }"
                                ><span class="icon-alert"></span></a>

                                <form
                                    id="hapus-kategori"
                                    style="display: none"
                                    action="{{ route('kategori.destroy', $kategori->id) }}"
                                    method="post"
                                >
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
