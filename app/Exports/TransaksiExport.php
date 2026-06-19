<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransaksiExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $tanggalMulai;
    protected $tanggalSelesai;

    public function __construct($tanggalMulai = null, $tanggalSelesai = null)
    {
        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalSelesai = $tanggalSelesai;
    }

    public function collection()
    {
        $query = Transaksi::with(['pelanggan', 'mobil']);

        if ($this->tanggalMulai && $this->tanggalSelesai) {
            $query->where('tanggal_mulai', '<=', $this->tanggalSelesai)
                  ->where('tanggal_selesai', '>=', $this->tanggalMulai);
        }

        return $query->latest()->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Transaksi',
            'Pelanggan',
            'Mobil',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Lama Sewa (hari)',
            'Total Bayar',
            'Status',
        ];
    }

    public function map($transaksi): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $transaksi->kode_transaksi,
            $transaksi->pelanggan->nama_pelanggan ?? '-',
            $transaksi->mobil->nama_mobil ?? '-',
            $transaksi->tanggal_mulai,
            $transaksi->tanggal_selesai,
            $transaksi->lama_sewa,
            $transaksi->total_bayar,
            ucfirst($transaksi->status),
        ];
    }
}
