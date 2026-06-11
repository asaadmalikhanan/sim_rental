<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Pelanggan</h2>
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
                    <a href="{{ route('pelanggan.create') }}"
                       class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                        + Tambah Pelanggan
                    </a>
                @endif

                <table class="table-auto w-full border mt-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">NIK</th>
                            <th class="border p-2">No. Telepon</th>
                            <th class="border p-2">Alamat</th>
                            @if(auth()->user()->role === 'admin')
                                <th class="border p-2">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pelanggans as $i => $pelanggan)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="border p-2">{{ $pelanggans->firstItem() + $i }}</td>
                            <td class="border p-2">{{ $pelanggan->nama_pelanggan }}</td>
                            <td class="border p-2">{{ $pelanggan->nik }}</td>
                            <td class="border p-2">{{ $pelanggan->no_telepon }}</td>
                            <td class="border p-2">{{ $pelanggan->alamat }}</td>
                            @if(auth()->user()->role === 'admin')
                                <td class="border p-2">
                                    <a href="{{ route('pelanggan.edit', $pelanggan) }}"
                                       class="bg-yellow-400 text-white px-3 py-1 rounded text-sm">Edit</a>
                                    <form action="{{ route('pelanggan.destroy', $pelanggan) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Yakin hapus data ini?')"
                                                class="bg-red-500 text-white px-3 py-1 rounded text-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ auth()->user()->role === 'admin' ? '6' : '5' }}"
                                class="text-center p-4 text-gray-500">Belum ada data pelanggan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $pelanggans->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
