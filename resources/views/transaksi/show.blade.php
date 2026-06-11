<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Transaksi</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">

                <table class="w-full text-sm">
                    <tr class="border-b">
                        <td class="py-2 font-medium w-40">Kode Transaksi</td>
                        <td class="py-2">: {{ $transaksi->kode_transaksi }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Pelanggan</td>
                        <td class="py-2">: {{ $transaksi->pelanggan->nama_pelanggan }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Mobil</td>
                        <td class="py-2">: {{ $transaksi->mobil->nama_mobil }} ({{ $transaksi->mobil->nomor_plat }})</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Tanggal Mulai</td>
                        <td class="py-2">: {{ $transaksi->tanggal_mulai }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Tanggal Selesai</td>
                        <td class="py-2">: {{ $transaksi->tanggal_selesai }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Lama Sewa</td>
                        <td class="py-2">: {{ $transaksi->lama_sewa }} hari</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Total Bayar</td>
                        <td class="py-2">: Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Status</td>
                        <td class="py-2">: {{ ucfirst($transaksi->status) }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 font-medium">Catatan</td>
                        <td class="py-2">: {{ $transaksi->catatan ?? '-' }}</td>
                    </tr>
                </table>

                <div class="mt-6">
                    <a href="/transaksi"
                       class="bg-gray-400 text-white px-6 py-2 rounded">
                        ← Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
