<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermohonanSkm extends Model
{
    //
    protected $table = 'permohonan_skm';
    protected $fillable = [
        'id_pemohon',
        'id_user',
        'tarif',
        'tanggal_permohonan',
        'status_permohonan',
        'nama_dokter',
        'status_verifikasi_permohonan',
    ];
}
