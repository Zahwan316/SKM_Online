<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    //
    protected $table = 'pemohon';
    protected $fillable = [
        'id_upload',
        'nama_pemohon',
        'nama_pasien',
        'no_rm_pasien',
        'tempat_lahir_pasien',
        'tanggal_lahir_pasien',
        'tanggal_perawatan_pasien',
        'jenis_pasien',
        'no_telepon',
        'status_pemohon',
        'upload',
        'jenis_pengiriman',
    ];
}
