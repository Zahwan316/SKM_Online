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
        Schema::create('permohonan_skm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemohon')->constrained('pemohon')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->integer('tarif', );
            $table->date('tanggal_permohonan');
            $table->string('status_permohonan');
            $table->char('nama_dokter', 100);
            $table->string('status_verifikasi_permohonan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_skm');
    }
};
