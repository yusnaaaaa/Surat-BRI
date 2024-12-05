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
        Schema::create('surats_intern', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk'); // Tanggal surat diterima
            $table->string('bagian'); // Bagian terkait surat
            $table->string('dari'); // Pengirim surat
            $table->string('bendel'); // Kategori atau klasifikasi surat
            $table->string('nomor_surat'); // Nomor identifikasi surat
            $table->string('perihal'); // Subjek atau deskripsi isi surat
            $table->string('masuk_ke'); // Penerima atau bagian yang dituju
            $table->date('tanggal_kembali')->nullable(); // Tanggal surat dikembalikan (nullable jika opsional)
            $table->timestamps(); // Created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats_intern');
    }
};
