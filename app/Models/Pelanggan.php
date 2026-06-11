<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'nama_pelanggan',
        'nik',
        'no_telepon',
        'email',
        'alamat',
    ];
}
