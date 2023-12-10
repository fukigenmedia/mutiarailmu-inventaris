@extends('layouts.app')

@section('title', 'Daftar Ruangan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Daftar Ruangan</h4>
        </div>

        <div class="card-header">
            <a
                class="btn btn-dark"
                href="{{ route('ruangan.create') }}"
            >Tambah</a>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th width="10px">#</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">
                    @forelse ($dataRuangan as $ruangan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ruangan->kode }}</td>
                            <td>{{ $ruangan->nama }}</td>
                            <td>{{ $ruangan->deskripsi }}</td>
                            <td>
                                <a
                                    class="btn btn-sm btn-dark"
                                    href="{{ route('ruangan.edit', $ruangan->id) }}"
                                >Sunting</a>

                                <a
                                    class="btn btn-sm btn-danger"
                                    onclick="hapusData('ruangan', '{{ $ruangan->id }}')"
                                >Hapus</a>

                                <form
                                    id="hapus-ruangan-{{ $ruangan->id }}"
                                    style="display: none"
                                    action="{{ route('ruangan.destroy', $ruangan->id) }}"
                                    method="post"
                                >
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
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
