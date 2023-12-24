<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'id_kategori',

        'kode',
        'barcode',
        'nama',
        'kondisi',

        'merk',
        'foto',

        'harga',
        'apakah_pecah_belah',
        'deskripsi',
    ];

    protected $casts = [
        'harga' => 'double',
        'apakah_pecah_belah' => 'boolean',
    ];

    public const KONDISI = [
        'B' => 'Baru',
        'SH' => 'Second Hand',
        'R' => 'Rusak',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function getKondisiLabelAttribute()
    {
        return self::KONDISI[$this->kondisi];
    }
}
