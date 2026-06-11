<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalians'; // ← tambahkan ini

    protected $fillable = [
        'transaksi_id',
        'tanggal_kembali',
        'keterlambatan',
        'denda',
        'total_bayar',
        'kondisi_mobil',
        'catatan',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
