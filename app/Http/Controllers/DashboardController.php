<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMobil = Mobil::count();
        $mobilTersedia = Mobil::where('status', 'tersedia')->count();
        $mobilDisewa = Mobil::where('status', 'disewa')->count();
        $totalPelanggan = Pelanggan::count();
        $totalTransaksi = Transaksi::count();
        $transaksiTerbaru = Transaksi::with(['pelanggan', 'mobil'])
            ->latest()
            ->take(5)
            ->get();

        $labelBulan = [];
        $dataPendapatan = [];

        for ($i = 11; $i >= 0; $i--) {
            $bulan = Carbon::now()->subMonths($i);
            $labelBulan[] = $bulan->locale('id')->isoFormat('MMM Y');
            $dataPendapatan[] = Transaksi::whereYear('created_at', $bulan->year)
                ->whereMonth('created_at', $bulan->month)
                ->sum('total_bayar');
        }

        return view('dashboard', compact(
            'totalMobil',
            'mobilTersedia',
            'mobilDisewa',
            'totalPelanggan',
            'totalTransaksi',
            'transaksiTerbaru',
            'labelBulan',
            'dataPendapatan'
        ));
    }
}
