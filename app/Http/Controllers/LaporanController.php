<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransaksiExport;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with(['pelanggan', 'mobil']);

        // Filter periode cepat
        if ($request->periode) {
            switch ($request->periode) {
                case 'harian':
                    $query->whereDate('tanggal_mulai', Carbon::today())
                          ->orWhereDate('tanggal_selesai', Carbon::today());
                    break;
                case 'mingguan':
                    $query->where('tanggal_mulai', '<=', Carbon::now()->endOfWeek())
                          ->where('tanggal_selesai', '>=', Carbon::now()->startOfWeek());
                    break;
                case 'bulanan':
                    $query->where('tanggal_mulai', '<=', Carbon::now()->endOfMonth())
                          ->where('tanggal_selesai', '>=', Carbon::now()->startOfMonth());
                    break;
                case 'tahunan':
                    $query->where('tanggal_mulai', '<=', Carbon::now()->endOfYear())
                          ->where('tanggal_selesai', '>=', Carbon::now()->startOfYear());
                    break;
            }
        }

        // Filter tanggal manual
        if ($request->tanggal_mulai && $request->tanggal_selesai) {
            $query->where('tanggal_mulai', '<=', $request->tanggal_selesai)
                  ->where('tanggal_selesai', '>=', $request->tanggal_mulai);
        }

        $transaksis      = $query->latest()->get();
        $totalPendapatan = $transaksis->sum('total_bayar');
        $jumlahTransaksi = $transaksis->count();

        return view('laporan.index', compact(
            'transaksis',
            'totalPendapatan',
            'jumlahTransaksi',
            'request'
        ));
    }

    public function exportPdf(Request $request)
    {
        $query = Transaksi::with(['pelanggan', 'mobil']);

        if ($request->periode) {
            switch ($request->periode) {
                case 'harian':
                    $query->whereDate('tanggal_mulai', Carbon::today())
                          ->orWhereDate('tanggal_selesai', Carbon::today());
                    break;
                case 'mingguan':
                    $query->where('tanggal_mulai', '<=', Carbon::now()->endOfWeek())
                          ->where('tanggal_selesai', '>=', Carbon::now()->startOfWeek());
                    break;
                case 'bulanan':
                    $query->where('tanggal_mulai', '<=', Carbon::now()->endOfMonth())
                          ->where('tanggal_selesai', '>=', Carbon::now()->startOfMonth());
                    break;
                case 'tahunan':
                    $query->where('tanggal_mulai', '<=', Carbon::now()->endOfYear())
                          ->where('tanggal_selesai', '>=', Carbon::now()->startOfYear());
                    break;
            }
        }

        if ($request->tanggal_mulai && $request->tanggal_selesai) {
            $query->where('tanggal_mulai', '<=', $request->tanggal_selesai)
                  ->where('tanggal_selesai', '>=', $request->tanggal_mulai);
        }

        $transaksis      = $query->latest()->get();
        $totalPendapatan = $transaksis->sum('total_bayar');
        $jumlahTransaksi = $transaksis->count();

        $pdf = Pdf::loadView('laporan.pdf', compact(
            'transaksis',
            'totalPendapatan',
            'jumlahTransaksi',
            'request'
        ))->setPaper('a4', 'landscape');

        return $pdf->download('laporan-transaksi.pdf');
    }

    public function exportExcel(Request $request)
    {
        $tanggalMulai   = $request->tanggal_mulai;
        $tanggalSelesai = $request->tanggal_selesai;

        return Excel::download(
            new TransaksiExport($tanggalMulai, $tanggalSelesai),
            'laporan-transaksi.xlsx'
        );
    }
}
