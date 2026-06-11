<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $fillable = ['nama_kriteria', 'jenis', 'bobot'];

    // Paksa Laravel gunakan nama parameter 'kriteria'
    public function getRouteKeyName()
    {
        return 'id';
    }
}
