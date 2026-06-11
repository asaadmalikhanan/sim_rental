<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Mobil</h2>
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
                    <a href="{{ route('mobil.create') }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                        + Tambah Mobil
                    </a>
                @endif

                <table class="table-auto w-full border mt-4 text-sm">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama Mobil</th>
                            <th class="border p-2">Merk</th>
                            <th class="border p-2">Plat</th>
                            <th class="border p-2">Tahun</th>
                            <th class="border p-2">Kapasitas</th>
                            <th class="border p-2">Harga Sewa</th>
                            <th class="border p-2">Jenis</th>
                            <th class="border p-2">Transmisi</th>
                            <th class="border p-2">BBM</th>
                            <th class="border p-2">Kondisi</th>
                            <th class="border p-2">Status</th>
                            @if(auth()->user()->role === 'admin')
                                <th class="border p-2">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mobils as $i => $mobil)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="border p-2">{{ $mobils->firstItem() + $i }}</td>
                            <td class="border p-2">{{ $mobil->nama_mobil }}</td>
                            <td class="border p-2">{{ $mobil->merk }}</td>
                            <td class="border p-2">{{ $mobil->nomor_plat }}</td>
                            <td class="border p-2">{{ $mobil->tahun }}</td>
                            <td class="border p-2">{{ $mobil->kapasitas }} org</td>
                            <td class="border p-2">Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}/hari</td>
                            <td class="border p-2">{{ ucfirst(str_replace('_', ' ', $mobil->jenis_kendaraan)) }}</td>
                            <td class="border p-2">{{ ucfirst($mobil->transmisi) }}</td>
                            <td class="border p-2">{{ ucfirst($mobil->jenis_bbm) }}</td>
                            <td class="border p-2">{{ ucfirst(str_replace('_', ' ', $mobil->kondisi)) }}</td>
                            <td class="border p-2">
                                @if($mobil->status == 'tersedia')
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Tersedia</span>
                                @elseif($mobil->status == 'disewa')
                                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs">Disewa</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Tidak Tersedia</span>
                                @endif
                            </td>
                            @if(auth()->user()->role === 'admin')
                                <td class="border p-2">
                                    <a href="{{ route('mobil.edit', $mobil) }}"
                                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">Edit</a>
                                    <form action="{{ route('mobil.destroy', $mobil) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Yakin hapus data ini?')"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ auth()->user()->role === 'admin' ? '13' : '12' }}"
                                class="text-center p-4 text-gray-500">Belum ada data mobil.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $mobils->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
