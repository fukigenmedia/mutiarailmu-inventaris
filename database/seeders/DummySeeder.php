<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Ruangan;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataRuangan = [
            [
                'kode' => 'R-00',
                'nama' => 'Gudang',
                'deskripsi' => 'Ruangan untuk menyimpan barang-barang tidak digunakan.',
            ],
            [
                'kode' => 'R-01',
                'nama' => 'Kelas RPL 1',
                'deskripsi' => 'Ruang belajar kelas siswa RPL 1',
            ],
            [
                'kode' => 'R-02',
                'nama' => 'Kelas RPL 2',
                'deskripsi' => 'Ruang belajar kelas siswa RPL 2',
            ],
        ];

        $dataKategori = [
            [
                'kode' => 'K-00',
                'nama' => 'Tidak Diketahui',
            ],
            [
                'kode' => 'K-01',
                'nama' => 'Buku',
            ],
            [
                'kode' => 'K-02',
                'nama' => 'Alat Tulis',
            ],
            [
                'kode' => 'K-03',
                'nama' => 'Alat Kebersihan',
            ],
        ];

        $dataBarang = [
            [
                'id_kategori' => 2,

                'kode' => 'B-01',
                'barcode' => 10101010,
                'nama' => 'Buku Belajar Laravel Dasar',
                'kondisi' => 'B',

                'merk' => null,
                'foto' => null,

                'harga' => 100000,
                'apakah_pecah_belah' => false,
                'deskripsi' => 'Buku Belajar Laravel Dasar...',
            ],
        ];

        foreach ($dataRuangan as $ruangan) {
            Ruangan::create($ruangan);
        }

        foreach ($dataKategori as $kategori) {
            Kategori::create($kategori);
        }

        foreach ($dataBarang as $barang) {
            Barang::create($barang);
        }
    }
}
