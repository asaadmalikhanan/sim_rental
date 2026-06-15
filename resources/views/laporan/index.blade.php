<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Laporan Transaksi</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

{{-- Filter --}}
<div class="bg-white shadow rounded p-6 mb-6">
    <h3 class="text-lg font-semibold mb-4">Filter Laporan</h3>

    {{-- Tombol Periode Cepat --}}
    <div class="flex gap-2 mb-4">
        <a href="{{ route('laporan.index', ['periode' => 'harian']) }}"
           class="px-4 py-2 rounded text-sm font-medium transition
           {{ request('periode') == 'harian' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Harian
        </a>
        <a href="{{ route('laporan.index', ['periode' => 'mingguan']) }}"
           class="px-4 py-2 rounded text-sm font-medium transition
           {{ request('periode') == 'mingguan' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Mingguan
        </a>
        <a href="{{ route('laporan.index', ['periode' => 'bulanan']) }}"
           class="px-4 py-2 rounded text-sm font-medium transition
           {{ request('periode') == 'bulanan' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Bulanan
        </a>
        <a href="{{ route('laporan.index', ['periode' => 'tahunan']) }}"
           class="px-4 py-2 rounded text-sm font-medium transition
           {{ request('periode') == 'tahunan' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Tahunan
        </a>
    </div>

    {{-- Garis pemisah --}}
    <div class="border-t border-gray-200 my-4"></div>

    {{-- Filter Tanggal Manual --}}
    <form action="{{ route('laporan.index') }}" method="GET">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai"
                       value="{{ request('tanggal_mulai') }}"
                       class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai"
                       value="{{ request('tanggal_selesai') }}"
                       class="w-full border rounded px-3 py-2">
            </div>
        </div>
        <div class="mt-4 flex gap-3">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                🔍 Filter
            </button>
            <a href="{{ route('laporan.index') }}"
               class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded">
                🔄 Reset
            </a>
        </div>
    </form>
</div>

            {{-- Summary --}}
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="bg-blue-50 border border-blue-200 rounded p-4 text-center">
                    <p class="text-sm text-blue-600 font-medium">Jumlah Transaksi</p>
                    <p class="text-3xl font-bold text-blue-700">{{ $jumlahTransaksi }}</p>
                </div>
                <div class="bg-green-50 border border-green-200 rounded p-4 text-center">
                    <p class="text-sm text-green-600 font-medium">Total Pendapatan</p>
                    <p class="text-3xl font-bold text-green-700">
                        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                    </p>
                </div>
            </div>

            {{-- Tabel --}}
            <div class="bg-white shadow rounded p-4">

                {{-- Tombol Export --}}
                <div class="flex gap-3 mb-4">
                    <a href="{{ route('laporan.pdf', request()->query()) }}"
                       class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">
                        📄 Export PDF
                    </a>
                    <a href="{{ route('laporan.excel', request()->query()) }}"
                       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded text-sm">
                        📊 Export Excel
                    </a>
                </div>

                <table class="table-auto w-full border text-sm">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Kode Transaksi</th>
                            <th class="border p-2">Pelanggan</th>
                            <th class="border p-2">Mobil</th>
                            <th class="border p-2">Tanggal Mulai</th>
                            <th class="border p-2">Tanggal Selesai</th>
                            <th class="border p-2">Lama Sewa</th>
                            <th class="border p-2">Total Bayar</th>
                            <th class="border p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksis as $i => $transaksi)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="border p-2">{{ $i + 1 }}</td>
                            <td class="border p-2">{{ $transaksi->kode_transaksi }}</td>
                            <td class="border p-2">{{ $transaksi->pelanggan->nama_pelanggan ?? '-' }}</td>
                            <td class="border p-2">{{ $transaksi->mobil->nama_mobil ?? '-' }}</td>
                            <td class="border p-2">{{ $transaksi->tanggal_mulai }}</td>
                            <td class="border p-2">{{ $transaksi->tanggal_selesai }}</td>
                            <td class="border p-2">{{ $transaksi->lama_sewa }} hari</td>
                            <td class="border p-2">Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
                            <td class="border p-2">
                                @if($transaksi->status == 'aktif')
                                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">Aktif</span>
                                @elseif($transaksi->status == 'selesai')
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Selesai</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Dibatalkan</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center p-4 text-gray-500">
                                Belum ada data transaksi.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
