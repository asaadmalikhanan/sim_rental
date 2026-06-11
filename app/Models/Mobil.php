<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = [
        'nama_mobil',
        'merk',
        'nomor_plat',
        'tahun',
        'kapasitas',
        'harga_sewa',
        'status',
        'keterangan',
        'jenis_kendaraan',
        'transmisi',
        'jenis_bbm',
        'kondisi',
    ];
}
