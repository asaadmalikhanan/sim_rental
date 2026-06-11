<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Hasil Rekomendasi Armada</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">

                @if(empty($hasil))
                    <div class="bg-yellow-100 text-yellow-700 px-4 py-3 rounded mb-4">
                        ⚠️ Tidak ada armada yang tersedia saat ini.
                    </div>
                @else
                    <p class="text-gray-600 mb-4">
                        Berikut adalah rekomendasi armada berdasarkan preferensi yang anda masukkan,
                        diurutkan dari yang paling sesuai.
                    </p>

                    <table class="table-auto w-full border text-sm">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border p-2">Ranking</th>
                                <th class="border p-2">Nama Mobil</th>
                                <th class="border p-2">Jenis</th>
                                <th class="border p-2">Transmisi</th>
                                <th class="border p-2">BBM</th>
                                <th class="border p-2">Kapasitas</th>
                                <th class="border p-2">Tahun</th>
                                <th class="border p-2">Kondisi</th>
                                <th class="border p-2">Harga Sewa</th>
                                <th class="border p-2">Skor SAW</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hasil as $rank => $item)
                            <tr class="text-center hover:bg-gray-50 {{ $rank == 0 ? 'bg-yellow-50' : '' }}">
                                <td class="border p-2 font-bold">
                                    @if($rank == 0) 🥇
                                    @elseif($rank == 1) 🥈
                                    @elseif($rank == 2) 🥉
                                    @else {{ $rank + 1 }}
                                    @endif
                                </td>
                                <td class="border p-2 font-medium">
                                    {{ $item['mobil']->nama_mobil }}<br>
                                    <span class="text-xs text-gray-500">{{ $item['mobil']->nomor_plat }}</span>
                                </td>
                                <td class="border p-2">{{ ucfirst(str_replace('_', ' ', $item['mobil']->jenis_kendaraan)) }}</td>
                                <td class="border p-2">{{ ucfirst($item['mobil']->transmisi) }}</td>
                                <td class="border p-2">{{ ucfirst($item['mobil']->jenis_bbm) }}</td>
                                <td class="border p-2">{{ $item['mobil']->kapasitas }} org</td>
                                <td class="border p-2">{{ $item['mobil']->tahun }}</td>
                                <td class="border p-2">{{ ucfirst(str_replace('_', ' ', $item['mobil']->kondisi)) }}</td>
                                <td class="border p-2">Rp {{ number_format($item['mobil']->harga_sewa, 0, ',', '.') }}/hari</td>
                                <td class="border p-2 font-semibold text-purple-700">{{ $item['nilai_akhir'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <div class="mt-6">
                    <a href="/saw"
                       class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded">
                        🔄 Cari Rekomendasi Lain
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
