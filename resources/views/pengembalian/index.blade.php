<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Pengembalian</h2>
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
                    <a href="/pengembalian/create"
                       class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                        + Tambah Pengembalian
                    </a>
                @endif

                <table class="table-auto w-full border mt-4 text-sm">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Kode Transaksi</th>
                            <th class="border p-2">Pelanggan</th>
                            <th class="border p-2">Mobil</th>
                            <th class="border p-2">Tgl Kembali</th>
                            <th class="border p-2">Keterlambatan</th>
                            <th class="border p-2">Denda</th>
                            <th class="border p-2">Total Bayar</th>
                            <th class="border p-2">Kondisi</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengembalians as $i => $pengembalian)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="border p-2">{{ $pengembalians->firstItem() + $i }}</td>
                            <td class="border p-2">{{ $pengembalian->transaksi->kode_transaksi }}</td>
                            <td class="border p-2">{{ $pengembalian->transaksi->pelanggan->nama_pelanggan }}</td>
                            <td class="border p-2">{{ $pengembalian->transaksi->mobil->nama_mobil }}</td>
                            <td class="border p-2">{{ $pengembalian->tanggal_kembali }}</td>
                            <td class="border p-2">
                                @if($pengembalian->keterlambatan > 0)
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">
                                        {{ $pengembalian->keterlambatan }} hari
                                    </span>
                                @else
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">
                                        Tepat Waktu
                                    </span>
                                @endif
                            </td>
                            <td class="border p-2">Rp {{ number_format($pengembalian->denda, 0, ',', '.') }}</td>
                            <td class="border p-2">Rp {{ number_format($pengembalian->total_bayar, 0, ',', '.') }}</td>
                            <td class="border p-2">
                                @if($pengembalian->kondisi_mobil == 'baik')
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Baik</span>
                                @elseif($pengembalian->kondisi_mobil == 'rusak_ringan')
                                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Rusak Ringan</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Rusak Berat</span>
                                @endif
                            </td>
                            <td class="border p-2">
                                {{-- Tombol Detail bisa dilihat semua role --}}
                                <a href="/pengembalian/{{ $pengembalian->id }}"
                                   class="bg-blue-400 text-white px-3 py-1 rounded text-xs">Detail</a>

                                {{-- Tombol Hapus hanya Admin --}}
                                @if(auth()->user()->role === 'admin')
                                    <form action="/pengembalian/{{ $pengembalian->id }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Yakin hapus data ini?')"
                                                class="bg-red-500 text-white px-3 py-1 rounded text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center p-4 text-gray-500">Belum ada data pengembalian.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $pengembalians->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
