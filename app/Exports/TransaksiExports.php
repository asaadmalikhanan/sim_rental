<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransaksiExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $tanggalMulai;
    protected $tanggalSelesai;

    public function __construct($tanggalMulai = null, $tanggalSelesai = null)
    {
        $this->tanggalMulai   = $tanggalMulai;
        $this->tanggalSelesai = $tanggalSelesai;
    }

    public function collection()
    {
        $query = Transaksi::with(['pelanggan', 'mobil']);

        if ($this->tanggalMulai && $this->tanggalSelesai) {
            $query->whereBetween('tanggal_mulai', [
                $this->tanggalMulai,
                $this->tanggalSelesai
            ]);
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
            $transaksi->pelanggan->nama ?? '-',
            $transaksi->mobil->nama_mobil ?? '-',
            $transaksi->tanggal_mulai,
            $transaksi->tanggal_selesai,
            $transaksi->lama_sewa,
            'Rp ' . number_format($transaksi->total_bayar, 0, ',', '.'),
            ucfirst($transaksi->status),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
