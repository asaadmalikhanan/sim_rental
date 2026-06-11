<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = Pengembalian::with(['transaksi.pelanggan', 'transaksi.mobil'])
                            ->latest()->paginate(10);
        return view('pengembalian.index', compact('pengembalians'));
    }

    public function create()
    {
        // Hanya transaksi aktif yang belum dikembalikan
        $transaksis = Transaksi::with(['pelanggan', 'mobil'])
                        ->where('status', 'aktif')
                        ->whereDoesntHave('pengembalian')
                        ->get();
        return view('pengembalian.create', compact('transaksis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id'    => 'required|exists:transaksis,id',
            'tanggal_kembali' => 'required|date',
            'kondisi_mobil'   => 'required|in:baik,rusak_ringan,rusak_berat',
            'catatan'         => 'nullable|string',
        ]);

        $transaksi = Transaksi::with('mobil')->findOrFail($request->transaksi_id);
        $tanggalSelesai = \Carbon\Carbon::parse($transaksi->tanggal_selesai);
        $tanggalKembali = \Carbon\Carbon::parse($request->tanggal_kembali);

        // Hitung keterlambatan
        $keterlambatan = max(0, $tanggalSelesai->diffInDays($tanggalKembali, false));
        $dendaPerHari  = 50000; // Rp 50.000/hari
        $denda         = $keterlambatan * $dendaPerHari;
        $totalBayar    = $transaksi->total_bayar + $denda;

        Pengembalian::create([
            'transaksi_id'    => $transaksi->id,
            'tanggal_kembali' => $request->tanggal_kembali,
            'keterlambatan'   => $keterlambatan,
            'denda'           => $denda,
            'total_bayar'     => $totalBayar,
            'kondisi_mobil'   => $request->kondisi_mobil,
            'catatan'         => $request->catatan,
        ]);

        // Update status transaksi & mobil
        $transaksi->update(['status' => 'selesai']);
        $transaksi->mobil->update(['status' => 'tersedia']);

        return redirect()->route('pengembalian.index')
                         ->with('success', 'Pengembalian berhasil dicatat!');
    }

    public function show(Pengembalian $pengembalian)
    {
        $pengembalian->load(['transaksi.pelanggan', 'transaksi.mobil']);
        return view('pengembalian.show', compact('pengembalian'));
    }

    public function destroy(Pengembalian $pengembalian)
    {
        // Kembalikan status transaksi & mobil ke aktif & disewa
        $pengembalian->transaksi->update(['status' => 'aktif']);
        $pengembalian->transaksi->mobil->update(['status' => 'disewa']);
        $pengembalian->delete();

        return redirect()->route('pengembalian.index')
                         ->with('success', 'Data pengembalian berhasil dihapus!');
    }
}
