<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori')->references('id')->on('kategori')->onDelete('cascade');

            $table->string('kode')->unique();
            $table->string('barcode')->nullable();
            $table->string('nama');
            $table->string('kondisi');

            $table->string('merk')->nullable();
            $table->text('foto')->nullable();

            $table->double('harga', 2);
            $table->boolean('apakah_pecah_belah')->default(false);
            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
