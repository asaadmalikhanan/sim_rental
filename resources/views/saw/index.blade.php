<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Rekomendasi Armada</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">

                <h3 class="text-lg font-semibold mb-4">Masukkan Preferensi Kendaraan</h3>

                @if($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc pl-4">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('saw.hasil') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Jenis Kendaraan</label>
                        <select name="jenis_kendaraan" class="w-full border rounded px-3 py-2" required>
                            <option value=""> Pilih Jenis </option>
                            <option value="mobil_penumpang">Mobil Penumpang</option>
                            <option value="minibus">Minibus</option>
                            <option value="suv">SUV</option>
                            <option value="pickup">Pickup</option>
                            <option value="truck">Truck</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Transmisi</label>
                        <select name="transmisi" class="w-full border rounded px-3 py-2" required>
                            <option value="">  Pilih Transmisi </option>
                            <option value="manual">Manual</option>
                            <option value="otomatis">Otomatis</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Jenis Bahan Bakar</label>
                        <select name="jenis_bbm" class="w-full border rounded px-3 py-2" required>
                            <option value=""> Pilih BBM </option>
                            <option value="bensin">Bensin</option>
                            <option value="solar">Solar</option>
                            <option value="hybrid">Hybrid</option>
                            <option value="listrik">Listrik</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Kapasitas Penumpang Minimal</label>
                        <input type="number" name="kapasitas" min="1" max="50"
                               value="{{ old('kapasitas') }}"
                               class="w-full border rounded px-3 py-2"
                               placeholder="Kapasitas Minimal" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Tahun Minimal Kendaraan</label>
                        <input type="number" name="tahun" min="1990" max="{{ date('Y') }}"
                               value="{{ old('tahun') }}"
                               class="w-full border rounded px-3 py-2"
                               placeholder="Tahun minimal" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Kondisi Minimal</label>
                        <select name="kondisi" class="w-full border rounded px-3 py-2" required>
                            <option value=""> Pilih Kondisi </option>
                            <option value="sangat_baik">Sangat Baik</option>
                            <option value="baik">Baik</option>
                            <option value="cukup">Cukup</option>
                            <option value="kurang">Kurang</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-1">Budget Maksimal (per hari)</label>
                        <input type="number" name="budget" min="0"
                               value="{{ old('budget') }}"
                               class="w-full border rounded px-3 py-2"
                               placeholder="Budget Minimal" required>
                    </div>

                    <button type="submit"
                            class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded w-full">
                        🔍 Cari Rekomendasi
                    </button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
