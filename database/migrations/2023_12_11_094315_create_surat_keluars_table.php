<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('kode_klasifikasi')->unique();
            $table->date('tanggal_surat_keluar');
            $table->enum('sifat', ['biasa', 'rahasia', 'sangat rahasia']);
            $table->string('isi');
            $table->string('file');
            $table->string('tujuan');
            $table->timestamps();
            $table->string('surat_masuk_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};
