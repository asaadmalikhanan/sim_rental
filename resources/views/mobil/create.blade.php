<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Mobil</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">

                @if($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc pl-4">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('mobil.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nama Mobil</label>
                        <input type="text" name="nama_mobil" value="{{ old('nama_mobil') }}"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Merk</label>
                        <input type="text" name="merk" value="{{ old('merk') }}"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nomor Plat</label>
                        <input type="text" name="nomor_plat" value="{{ old('nomor_plat') }}"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Tahun</label>
                            <input type="number" name="tahun" value="{{ old('tahun') }}"
                                   class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kapasitas (orang)</label>
                            <input type="number" name="kapasitas" value="{{ old('kapasitas') }}"
                                   class="w-full border rounded px-3 py-2" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Harga Sewa (per hari)</label>
                        <input type="number" name="harga_sewa" value="{{ old('harga_sewa') }}"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Jenis Kendaraan</label>
                        <select name="jenis_kendaraan" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="mobil_penumpang" {{ old('jenis_kendaraan') == 'mobil_penumpang' ? 'selected' : '' }}>Mobil Penumpang</option>
                            <option value="pickup" {{ old('jenis_kendaraan') == 'pickup' ? 'selected' : '' }}>Pickup</option>
                            <option value="truck" {{ old('jenis_kendaraan') == 'truck' ? 'selected' : '' }}>Truck</option>
                            <option value="minibus" {{ old('jenis_kendaraan') == 'minibus' ? 'selected' : '' }}>Minibus</option>
                            <option value="suv" {{ old('jenis_kendaraan') == 'suv' ? 'selected' : '' }}>SUV</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Transmisi</label>
                        <select name="transmisi" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Transmisi --</option>
                            <option value="manual" {{ old('transmisi') == 'manual' ? 'selected' : '' }}>Manual</option>
                            <option value="otomatis" {{ old('transmisi') == 'otomatis' ? 'selected' : '' }}>Otomatis</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Jenis Bahan Bakar</label>
                        <select name="jenis_bbm" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih BBM --</option>
                            <option value="bensin" {{ old('jenis_bbm') == 'bensin' ? 'selected' : '' }}>Bensin</option>
                            <option value="solar" {{ old('jenis_bbm') == 'solar' ? 'selected' : '' }}>Solar</option>
                            <option value="listrik" {{ old('jenis_bbm') == 'listrik' ? 'selected' : '' }}>Listrik</option>
                            <option value="hybrid" {{ old('jenis_bbm') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Kondisi</label>
                        <select name="kondisi" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Kondisi --</option>
                            <option value="sangat_baik" {{ old('kondisi') == 'sangat_baik' ? 'selected' : '' }}>Sangat Baik</option>
                            <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
                            <option value="cukup" {{ old('kondisi') == 'cukup' ? 'selected' : '' }}>Cukup</option>
                            <option value="kurang" {{ old('kondisi') == 'kurang' ? 'selected' : '' }}>Kurang</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Status</label>
                        <select name="status" class="w-full border rounded px-3 py-2" required>
                            <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="disewa" {{ old('status') == 'disewa' ? 'selected' : '' }}>Disewa</option>
                            <option value="tidak_tersedia" {{ old('status') == 'tidak_tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-1">Keterangan (opsional)</label>
                        <textarea name="keterangan" rows="3"
                                  class="w-full border rounded px-3 py-2">{{ old('keterangan') }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                            💾 Simpan
                        </button>
                        <a href="{{ route('mobil.index') }}"
                           class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded">
                            ✖ Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
