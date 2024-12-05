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
        Schema::create('surats_rahasia', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk'); // Tanggal surat diterima
            $table->date('tanggal_surat'); // Tanggal surat dibuat
            $table->string('bendel'); // Kategori atau klasifikasi surat
            $table->string('dari'); // Pengirim surat
            $table->string('nomor_surat'); // Nomor identifikasi surat
            $table->string('perihal'); // Deskripsi singkat isi surat
            $table->string('masuk_ke'); // Penerima atau bagian yang dituju
            $table->date('tanggal_keluar')->nullable(); // Tanggal surat dikeluarkan (nullable jika tidak selalu ada)
            $table->string('disposisi')->nullable(); // Instruksi atau tindakan terkait surat (nullable jika opsional)
            $table->timestamps(); // Created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats_rahasia');
    }
};
