<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pengembalian Mobil</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded p-4">

                <p class="text-sm text-gray-500 mb-4">Daftar transaksi yang masih aktif dan belum dikembalikan.</p>

                <table class="table-auto w-full border mt-4 text-sm">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Kode Transaksi</th>
                            <th class="border p-2">Pelanggan</th>
                            <th class="border p-2">Mobil</th>
                            <th class="border p-2">Tgl Mulai</th>
                            <th class="border p-2">Tgl Selesai</th>
                            <th class="border p-2">Total Bayar</th>
                            @if(auth()->user()->role === 'admin')
                                <th class="border p-2">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksis as $i => $transaksi)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="border p-2">{{ $transaksis->firstItem() + $i }}</td>
                            <td class="border p-2">{{ $transaksi->kode_transaksi }}</td>
                            <td class="border p-2">{{ $transaksi->pelanggan->nama_pelanggan ?? '-' }}</td>
                            <td class="border p-2">{{ $transaksi->mobil->nama_mobil ?? '-' }}</td>
                            <td class="border p-2">{{ $transaksi->tanggal_mulai }}</td>
                            <td class="border p-2">{{ $transaksi->tanggal_selesai }}</td>
                            <td class="border p-2">Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
                            @if(auth()->user()->role === 'admin')
                            <td class="border p-2">
                                <a href="{{ route('pengembalian.create', ['transaksi_id' => $transaksi->id]) }}"
                                   class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">
                                    Dikembalikan
                                </a>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center p-4 text-gray-500">Tidak ada transaksi aktif yang menunggu pengembalian.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $transaksis->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
