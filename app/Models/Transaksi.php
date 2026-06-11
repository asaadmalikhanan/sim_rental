<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'kode_transaksi',
        'pelanggan_id',
        'mobil_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'lama_sewa',
        'total_bayar',
        'status',
        'catatan',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class);
    }
}
