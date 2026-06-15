<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Mobil</h2>
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

                <form action="{{ route('mobil.update', $mobil) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nama Mobil</label>
                        <input type="text" name="nama_mobil" value="{{ old('nama_mobil', $mobil->nama_mobil) }}"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
    <label class="block text-sm font-medium mb-1">Merk</label>
    <select name="merk" class="w-full border rounded px-3 py-2" required>
        <option value="">-- Pilih Merk --</option>
        <option value="Toyota" {{ old('merk') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
        <option value="Mitsubishi" {{ old('merk') == 'Mitsubishi' ? 'selected' : '' }}>Mitsubishi</option>
        <option value="Honda" {{ old('merk') == 'Honda' ? 'selected' : '' }}>Honda</option>
        <option value="Suzuki" {{ old('merk') == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
        <option value="Daihatsu" {{ old('merk') == 'Daihatsu' ? 'selected' : '' }}>Daihatsu</option>
        <option value="Isuzu" {{ old('merk') == 'Isuzu' ? 'selected' : '' }}>Isuzu</option>
        <option value="Hino" {{ old('merk') == 'Hino' ? 'selected' : '' }}>Hino</option>
        <option value="Nissan" {{ old('merk') == 'Nissan' ? 'selected' : '' }}>Nissan</option>
        <option value="Mazda" {{ old('merk') == 'Mazda' ? 'selected' : '' }}>Mazda</option>
        <option value="Hyundai" {{ old('merk') == 'Hyundai' ? 'selected' : '' }}>Hyundai</option>
        <option value="Wuling" {{ old('merk') == 'Wuling' ? 'selected' : '' }}>Wuling</option>
    </select>
</div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nomor Plat</label>
                        <input type="text" name="nomor_plat" value="{{ old('nomor_plat', $mobil->nomor_plat) }}"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Tahun</label>
                            <input type="number" name="tahun" value="{{ old('tahun', $mobil->tahun) }}"
                                   class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Kapasitas (orang)</label>
                            <input type="number" name="kapasitas" value="{{ old('kapasitas', $mobil->kapasitas) }}"
                                   class="w-full border rounded px-3 py-2" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Harga Sewa (per hari)</label>
                        <input type="number" name="harga_sewa" value="{{ old('harga_sewa', $mobil->harga_sewa) }}"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Jenis Kendaraan</label>
                        <select name="jenis_kendaraan" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Jenis --</option>
                            @foreach(['mobil_penumpang' => 'Mobil Penumpang', 'pickup' => 'Pickup', 'truck' => 'Truck', 'minibus' => 'Minibus', 'suv' => 'SUV'] as $val => $label)
                                <option value="{{ $val }}" {{ old('jenis_kendaraan', $mobil->jenis_kendaraan) == $val ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Transmisi</label>
                        <select name="transmisi" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Transmisi --</option>
                            @foreach(['manual' => 'Manual', 'otomatis' => 'Otomatis'] as $val => $label)
                                <option value="{{ $val }}" {{ old('transmisi', $mobil->transmisi) == $val ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Jenis Bahan Bakar</label>
                        <select name="jenis_bbm" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih BBM --</option>
                            @foreach(['bensin' => 'Bensin', 'solar' => 'Solar', 'listrik' => 'Listrik', 'hybrid' => 'Hybrid'] as $val => $label)
                                <option value="{{ $val }}" {{ old('jenis_bbm', $mobil->jenis_bbm) == $val ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Kondisi</label>
                        <select name="kondisi" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Kondisi --</option>
                            @foreach(['sangat_baik' => 'Sangat Baik', 'baik' => 'Baik', 'cukup' => 'Cukup', 'kurang' => 'Kurang'] as $val => $label)
                                <option value="{{ $val }}" {{ old('kondisi', $mobil->kondisi) == $val ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Status</label>
                        <select name="status" class="w-full border rounded px-3 py-2" required>
                            @foreach(['tersedia' => 'Tersedia', 'disewa' => 'Disewa', 'tidak_tersedia' => 'Tidak Tersedia'] as $val => $label)
                                <option value="{{ $val }}" {{ old('status', $mobil->status) == $val ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-1">Keterangan (opsional)</label>
                        <textarea name="keterangan" rows="3"
                                  class="w-full border rounded px-3 py-2">{{ old('keterangan', $mobil->keterangan) }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-6 py-2 rounded">
                            💾 Update
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
