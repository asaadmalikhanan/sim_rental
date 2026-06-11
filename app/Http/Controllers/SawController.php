<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class SawController extends Controller
{
    public function index()
    {
        return view('saw.index');
    }

    public function hasil(Request $request)
    {
        $request->validate([
            'jenis_kendaraan' => 'required',
            'transmisi'       => 'required',
            'jenis_bbm'       => 'required',
            'kapasitas'       => 'required|integer|min:1',
            'tahun'           => 'required|integer|min:1990',
            'kondisi'         => 'required',
            'budget'          => 'required|numeric|min:0',
        ]);

        $mobils = Mobil::where('status', 'tersedia')->get();

        if ($mobils->isEmpty()) {
            return view('saw.hasil', ['hasil' => []]);
        }

        // Konversi kategori ke angka
        $nilaiJenis     = ['mobil_penumpang' => 3, 'minibus' => 4, 'suv' => 4, 'pickup' => 2, 'truck' => 1];
        $nilaiTransmisi = ['manual' => 1, 'otomatis' => 2];
        $nilaiBBM       = ['listrik' => 4, 'hybrid' => 3, 'bensin' => 2, 'solar' => 1];
        $nilaiKondisi   = ['sangat_baik' => 4, 'baik' => 3, 'cukup' => 2, 'kurang' => 1];

        // Preferensi pelanggan
        $pref = [
            'jenis_kendaraan' => $nilaiJenis[$request->jenis_kendaraan] ?? 1,
            'harga_sewa'      => $request->budget,
            'kapasitas'       => $request->kapasitas,
            'tahun'           => $request->tahun,
            'transmisi'       => $nilaiTransmisi[$request->transmisi] ?? 1,
            'jenis_bbm'       => $nilaiBBM[$request->jenis_bbm] ?? 1,
            'kondisi'         => $nilaiKondisi[$request->kondisi] ?? 1,
        ];

        // Bobot kriteria
        $bobot = [
            'jenis_kendaraan' => 0.15,
            'harga_sewa'      => 0.25,
            'kapasitas'       => 0.20,
            'tahun'           => 0.15,
            'transmisi'       => 0.10,
            'jenis_bbm'       => 0.10,
            'kondisi'         => 0.05,
        ];

        // Hitung skor kecocokan setiap mobil dengan preferensi
        $hasil = [];
        foreach ($mobils as $mobil) {
            $nilaiMobil = [
                'jenis_kendaraan' => $nilaiJenis[$mobil->jenis_kendaraan] ?? 1,
                'harga_sewa'      => $mobil->harga_sewa,
                'kapasitas'       => $mobil->kapasitas,
                'tahun'           => $mobil->tahun,
                'transmisi'       => $nilaiTransmisi[$mobil->transmisi] ?? 1,
                'jenis_bbm'       => $nilaiBBM[$mobil->jenis_bbm] ?? 1,
                'kondisi'         => $nilaiKondisi[$mobil->kondisi] ?? 1,
            ];

            $skor = 0;

            // Jenis kendaraan: cocok = 1, tidak cocok = 0
            $skorJenis = $nilaiMobil['jenis_kendaraan'] == $pref['jenis_kendaraan'] ? 1 : 0;
            $skor += $bobot['jenis_kendaraan'] * $skorJenis;

            // Harga sewa: semakin dekat/dibawah budget semakin baik (cost)
            if ($nilaiMobil['harga_sewa'] <= $pref['harga_sewa']) {
                $skorHarga = $pref['harga_sewa'] > 0
                    ? 1 - ($nilaiMobil['harga_sewa'] / $pref['harga_sewa'])
                    : 0;
                $skorHarga = max(0, min(1, $skorHarga + 0.5)); // normalisasi 0-1
            } else {
                $skorHarga = 0; // melebihi budget
            }
            $skor += $bobot['harga_sewa'] * $skorHarga;

            // Kapasitas: semakin dekat dengan preferensi semakin baik
            $maxKapasitas = max($mobils->max('kapasitas'), $pref['kapasitas']);
            $skorKapasitas = $maxKapasitas > 0
                ? 1 - abs($nilaiMobil['kapasitas'] - $pref['kapasitas']) / $maxKapasitas
                : 0;
            $skor += $bobot['kapasitas'] * max(0, $skorKapasitas);

            // Tahun: semakin dekat/lebih baru dari preferensi semakin baik
            $maxTahun = max($mobils->max('tahun'), $pref['tahun']);
            $minTahun = min($mobils->min('tahun'), $pref['tahun']);
            $range    = $maxTahun - $minTahun;
            $skorTahun = $range > 0
                ? ($nilaiMobil['tahun'] - $minTahun) / $range
                : 1;
            $skor += $bobot['tahun'] * max(0, $skorTahun);

            // Transmisi: cocok = 1, tidak cocok = 0
            $skorTransmisi = $nilaiMobil['transmisi'] == $pref['transmisi'] ? 1 : 0;
            $skor += $bobot['transmisi'] * $skorTransmisi;

            // BBM: cocok = 1, tidak cocok = 0
            $skorBBM = $nilaiMobil['jenis_bbm'] == $pref['jenis_bbm'] ? 1 : 0;
            $skor += $bobot['jenis_bbm'] * $skorBBM;

            // Kondisi: semakin baik semakin tinggi skornya
            $skorKondisi = $nilaiMobil['kondisi'] / 4;
            $skor += $bobot['kondisi'] * $skorKondisi;

            $hasil[] = [
                'mobil'       => $mobil,
                'nilai_akhir' => round($skor, 4),
            ];
        }

        // Urutkan dari skor tertinggi
        usort($hasil, fn($a, $b) => $b['nilai_akhir'] <=> $a['nilai_akhir']);

        return view('saw.hasil', compact('hasil'));
    }
}
