<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <div class="space-y-6">

        {{-- Stats Cards --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <div class="bg-white rounded-xl p-5 shadow-sm border-l-4" style="border-left-color:#1e3a5f;">
                <p class="text-xs text-gray-500 uppercase tracking-wide">Total Mobil</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalMobil }}</p>
                <p class="text-xs text-gray-400 mt-1">Unit terdaftar</p>
            </div>

            <div class="bg-white rounded-xl p-5 shadow-sm border-l-4" style="border-left-color:#16a34a;">
                <p class="text-xs text-gray-500 uppercase tracking-wide">Mobil Tersedia</p>
                <p class="text-3xl font-bold text-green-600 mt-1">{{ $mobilTersedia }}</p>
                <p class="text-xs text-gray-400 mt-1">Siap disewa</p>
            </div>

            <div class="bg-white rounded-xl p-5 shadow-sm border-l-4" style="border-left-color:#dc2626;">
                <p class="text-xs text-gray-500 uppercase tracking-wide">Mobil Disewa</p>
                <p class="text-3xl font-bold text-red-600 mt-1">{{ $mobilDisewa }}</p>
                <p class="text-xs text-gray-400 mt-1">Sedang digunakan</p>
            </div>

            <div class="bg-white rounded-xl p-5 shadow-sm border-l-4" style="border-left-color:#2d6a9f;">
                <p class="text-xs text-gray-500 uppercase tracking-wide">Total Pelanggan</p>
                <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalPelanggan }}</p>
                <p class="text-xs text-gray-400 mt-1">Pelanggan terdaftar</p>
            </div>

        </div>

        {{-- Total Transaksi --}}
        <div class="bg-white rounded-xl p-5 shadow-sm">
            <p class="text-xs text-gray-500 uppercase tracking-wide">Total Transaksi</p>
            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $totalTransaksi }}</p>
            <p class="text-xs text-gray-400 mt-1">Semua transaksi rental</p>
        </div>

        {{-- Grafik Pendapatan Bulanan --}}
        <div class="bg-white rounded-xl p-5 shadow-sm">
            <h3 class="font-semibold text-gray-700 mb-4">📈 Pendapatan Bulanan {{ date('Y') }}</h3>
            <canvas id="grafikPendapatan" height="100"></canvas>
        </div>

        {{-- Transaksi Terbaru --}}
        <div class="bg-white rounded-xl p-5 shadow-sm">
            <h3 class="font-semibold text-gray-700 mb-4">🧾 Transaksi Terbaru</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-500 border-b">
                            <th class="pb-2">Pelanggan</th>
                            <th class="pb-2">Mobil</th>
                            <th class="pb-2">Tanggal</th>
                            <th class="pb-2">Total</th>
                            <th class="pb-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksiTerbaru as $t)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2">{{ $t->pelanggan->nama_pelanggan ?? '-' }}</td>
                            <td class="py-2">{{ $t->mobil->nama_mobil ?? '-' }}</td>
                            <td class="py-2">{{ \Carbon\Carbon::parse($t->tanggal_mulai)->format('d/m/Y') }}</td>
                            <td class="py-2">Rp {{ number_format($t->total_biaya, 0, ',', '.') }}</td>
                            <td class="py-2">
                                <span class="px-2 py-1 rounded-full text-xs
                                    {{ $t->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                    {{ ucfirst($t->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="py-4 text-center text-gray-400">Belum ada transaksi</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('grafikPendapatan').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labelBulan) !!},
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: {!! json_encode($dataPendapatan) !!},
                    backgroundColor: '#2d6a9f',
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: { ticks: { callback: v => 'Rp ' + v.toLocaleString('id-ID') } }
                }
            }
        });
    </script>

</x-app-layout>
