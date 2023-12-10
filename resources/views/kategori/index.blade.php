@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Daftar Kategori</h4>
        </div>

        <div class="card-header">
            <a
                class="btn btn-dark"
                href="{{ route('kategori.create') }}"
            >Tambah</a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th width="10px">#</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">
                    @forelse ($dataKategori as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->kode }}</td>
                            <td>{{ $kategori->nama }}</td>
                            <td>
                                <a
                                    class="btn btn-sm btn-dark"
                                    href="{{ route('kategori.edit', $kategori->id) }}"
                                >Sunting</a>

                                <a
                                    class="btn btn-sm btn-danger"
                                    onclick="hapusData('kategori', '{{ $kategori->id }}')"
                                >Hapus</a>

                                <form
                                    id="hapus-kategori-{{ $kategori->id }}"
                                    style="display: none"
                                    action="{{ route('kategori.destroy', $kategori->id) }}"
                                    method="post"
                                >
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
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
