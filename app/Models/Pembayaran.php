<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
    protected $table= 'pembayaran';
    protected $fillable = [
        'id_permohonan',
        'kode_permohonan',
        'status_pembayaran',
        'tanggal_pembayaran',
    ];
}
