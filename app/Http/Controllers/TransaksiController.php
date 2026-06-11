<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Mobil;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pelanggan', 'mobil'])->latest()->paginate(10);
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $mobils = Mobil::where('status', 'tersedia')->get();
        return view('transaksi.create', compact('pelanggans', 'mobils'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id'    => 'required|exists:pelanggans,id',
            'mobil_id'        => 'required|exists:mobils,id',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'catatan'         => 'nullable|string',
        ]);

        $mobil = Mobil::findOrFail($request->mobil_id);
        $lamaSewa = \Carbon\Carbon::parse($request->tanggal_mulai)
                        ->diffInDays($request->tanggal_selesai);
        $totalBayar = $lamaSewa * $mobil->harga_sewa;
        $kode = 'TRX-' . date('Ymd') . '-' . strtoupper(Str::random(4));

        Transaksi::create([
            'kode_transaksi'  => $kode,
            'pelanggan_id'    => $request->pelanggan_id,
            'mobil_id'        => $request->mobil_id,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lama_sewa'       => $lamaSewa,
            'total_bayar'     => $totalBayar,
            'status'          => 'aktif',
            'catatan'         => $request->catatan,
        ]);

        // Update status mobil jadi disewa
        $mobil->update(['status' => 'disewa']);

        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil dibuat!');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load(['pelanggan', 'mobil']);
        return view('transaksi.show', compact('transaksi'));
    }

    public function destroy(Transaksi $transaksi)
    {
        // Kembalikan status mobil
        $transaksi->mobil->update(['status' => 'tersedia']);
        $transaksi->delete();

        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil dihapus!');
    }
}
