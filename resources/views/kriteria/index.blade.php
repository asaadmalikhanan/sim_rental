<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Kriteria</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded p-4">

                @if(auth()->user()->role === 'admin')
                    <a href="/kriteria/create"
                       class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                        + Tambah Kriteria
                    </a>
                @endif

                <table class="table-auto w-full border mt-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nama Kriteria</th>
                            <th class="border p-2">Jenis</th>
                            <th class="border p-2">Bobot (%)</th>
                            @if(auth()->user()->role === 'admin')
                                <th class="border p-2">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kriterias as $i => $kriteria)
                        <tr class="text-center hover:bg-gray-50">
                            <td class="border p-2">{{ $i + 1 }}</td>
                            <td class="border p-2">{{ $kriteria->nama_kriteria }}</td>
                            <td class="border p-2">
                                @if($kriteria->jenis == 'benefit')
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Benefit</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Cost</span>
                                @endif
                            </td>
                            <td class="border p-2">{{ $kriteria->bobot }}%</td>
                            @if(auth()->user()->role === 'admin')
                                <td class="border p-2">
                                    <a href="/kriteria/{{ $kriteria->id }}/edit"
                                       class="bg-yellow-400 text-white px-3 py-1 rounded text-sm">Edit</a>
                                    <form action="/kriteria/{{ $kriteria->id }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Yakin hapus?')"
                                                class="bg-red-500 text-white px-3 py-1 rounded text-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ auth()->user()->role === 'admin' ? '5' : '4' }}"
                                class="text-center p-4 text-gray-500">Belum ada kriteria.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    @if($kriterias->count() > 0)
                    <tfoot>
                        <tr class="bg-gray-100 font-semibold">
                            <td colspan="{{ auth()->user()->role === 'admin' ? '3' : '3' }}"
                                class="border p-2 text-right">Total Bobot:</td>
                            <td class="border p-2 text-center">{{ $kriterias->sum('bobot') }}%</td>
                            @if(auth()->user()->role === 'admin')
                                <td class="border p-2"></td>
                            @endif
                        </tr>
                    </tfoot>
                    @endif
                </table>

                @if($kriterias->count() > 0)
                <div class="mt-4">
                    <a href="/saw"
                       class="bg-purple-500 text-white px-4 py-2 rounded inline-block">
                        Dapatkan Rekomendasi
                    </a>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
