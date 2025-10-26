<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanSkm extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $table = 'laporan_skm';
    protected $fillable = [
        'tanggal_penyerahan',
        'id_permohonan',
        'id_user',
        'id_pemohon',
    ];
}
