<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Pengembalian</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">

                <table class="w-full text-sm">
                    <tr class="border-b">
                        <td class="py-2 font-medium w-44">Kode Transaksi</td>
                        <td class="py-2">: {{ $pengembalian->transaksi->kode_transaksi }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Pelanggan</td>
                        <td class="py-2">: {{ $pengembalian->transaksi->pelanggan->nama_pelanggan }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Mobil</td>
                        <td class="py-2">: {{ $pengembalian->transaksi->mobil->nama_mobil }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Tanggal Selesai</td>
                        <td class="py-2">: {{ $pengembalian->transaksi->tanggal_selesai }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Tanggal Kembali</td>
                        <td class="py-2">: {{ $pengembalian->tanggal_kembali }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Keterlambatan</td>
                        <td class="py-2">: {{ $pengembalian->keterlambatan }} hari</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Denda</td>
                        <td class="py-2">: Rp {{ number_format($pengembalian->denda, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Total Bayar</td>
                        <td class="py-2">: Rp {{ number_format($pengembalian->total_bayar, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Kondisi Mobil</td>
                        <td class="py-2">: {{ ucfirst(str_replace('_', ' ', $pengembalian->kondisi_mobil)) }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 font-medium">Catatan</td>
                        <td class="py-2">: {{ $pengembalian->catatan ?? '-' }}</td>
                    </tr>
                </table>

                <div class="mt-6">
                    <a href="/pengembalian"
                       class="bg-gray-400 text-white px-6 py-2 rounded">
                        ← Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
