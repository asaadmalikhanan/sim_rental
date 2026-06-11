<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Transaksi</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded p-4">

                @if(auth()->user()->role === 'admin')
                    <a href="/transaksi/create"
                       class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                        + Tambah Transaksi
                    </a>
                @endif

                <table class="table-auto w-full border mt-4 text-sm">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Kode</th>
                            <th class="border p-2">Pelanggan</th>
                            <th class="border p-2">Mobil</th>
                            <th class="border p-2">Tgl Mulai</th>
                            <th class="border p-2">Tgl Selesai</th>
                            <th class="border p-2">Lama</th>
                            <th class="border p-2">Total</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksis as $i => $transaksi)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="border p-2">{{ $transaksis->firstItem() + $i }}</td>
                            <td class="border p-2">{{ $transaksi->kode_transaksi }}</td>
                            <td class="border p-2">{{ $transaksi->pelanggan->nama_pelanggan }}</td>
                            <td class="border p-2">{{ $transaksi->mobil->nama_mobil }}</td>
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
                            <td class="border p-2">
                                {{-- Detail bisa dilihat semua role --}}
                                <a href="/transaksi/{{ $transaksi->id }}"
                                   class="bg-blue-400 text-white px-3 py-1 rounded text-xs">Detail</a>

                                {{-- Hapus hanya Admin --}}
                                @if(auth()->user()->role === 'admin')
                                    <form action="/transaksi/{{ $transaksi->id }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Yakin hapus transaksi ini?')"
                                                class="bg-red-500 text-white px-3 py-1 rounded text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center p-4 text-gray-500">Belum ada data transaksi.</td>
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
