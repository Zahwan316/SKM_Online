<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    protected $table = 'upload';
    protected $fillable = [
        'id_user',
        'upload',
    ];
}
