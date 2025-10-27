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
        Schema::create('pemohon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_upload')->constrained('upload')->onDelete('cascade');
            $table->char('nama_pemohon', 100);
            $table->char('nama_pasien', 100);
            $table->char('no_RMpasien', 100);
            $table->char('tempat_lahir_pasien', 60);
            $table->date('tanggal_lahir_pasien');
            $table->date('tanggal_perawatan_pasien');
            $table->char('jenis_permohonan', 40);
            $table->char('no_telepon', 13);
            $table->char('status_pemohon', 10);
            $table->string('upload')->nullable();
            $table->string('alamat_pasien')->nullable();
            $table->char('jenis_pengiriman', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemohon');
    }
};
