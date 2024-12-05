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
        Schema::create('surats_biasa', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk'); // Tanggal surat diterima
            $table->string('no_reg'); // Nomor registrasi surat
            $table->string('bendel'); // Kategori atau jenis surat
            $table->string('pengirim'); // Pengirim surat
            $table->string('nomor_surat'); // Nomor identifikasi surat
            $table->string('perihal'); // Subjek atau deskripsi singkat surat
            $table->string('kepada'); // Penerima surat
            $table->date('tanggal_keluar')->nullable(); // Tanggal surat dikirim keluar (nullable)
            $table->string('disposisi')->nullable(); // Tindakan yang ditentukan untuk surat (nullable)
            $table->string('tindak_lanjut')->nullable(); // Tindakan lanjutan (nullable)
            $table->date('tanggal_penyelesaian')->nullable(); // Tanggal surat selesai ditindaklanjuti (nullable)
            $table->timestamps(); // Created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats_biasa');
    }
};
