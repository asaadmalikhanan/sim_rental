<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
public function run(): void
{
    \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    Kriteria::truncate();
    \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $kriterias = [
            [
                'nama_kriteria' => 'Jenis Kendaraan',
                'jenis'         => 'benefit',
                'bobot'         => 15.00,
            ],
            [
                'nama_kriteria' => 'Harga Sewa',
                'jenis'         => 'cost',
                'bobot'         => 25.00,
            ],
            [
                'nama_kriteria' => 'Kapasitas Penumpang',
                'jenis'         => 'benefit',
                'bobot'         => 20.00,
            ],
            [
                'nama_kriteria' => 'Tahun Kendaraan',
                'jenis'         => 'benefit',
                'bobot'         => 15.00,
            ],
            [
                'nama_kriteria' => 'Transmisi',
                'jenis'         => 'benefit',
                'bobot'         => 10.00,
            ],
            [
                'nama_kriteria' => 'Jenis Bahan Bakar',
                'jenis'         => 'benefit',
                'bobot'         => 10.00,
            ],
            [
                'nama_kriteria' => 'Kondisi',
                'jenis'         => 'benefit',
                'bobot'         => 5.00,
            ],
        ];

        foreach ($kriterias as $kriteria) {
            Kriteria::create($kriteria);
        }
    }
}
