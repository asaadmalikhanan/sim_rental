<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Kriteria</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">

                <form action="/kriteria" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nama Kriteria</label>
                        <input type="text" name="nama_kriteria" value="{{ old('nama_kriteria') }}"
                               placeholder="contoh: Harga Sewa, Tahun, Kapasitas"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Jenis</label>
                        <select name="jenis" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="benefit" {{ old('jenis') == 'benefit' ? 'selected' : '' }}>
                                Benefit (semakin besar semakin baik)
                            </option>
                            <option value="cost" {{ old('jenis') == 'cost' ? 'selected' : '' }}>
                                Cost (semakin kecil semakin baik)
                            </option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-1">Bobot (%)</label>
                        <input type="number" name="bobot" value="{{ old('bobot') }}"
                               min="1" max="100" placeholder="contoh: 30"
                               class="w-full border rounded px-3 py-2" required>
                        <p class="text-xs text-gray-500 mt-1">Total semua bobot sebaiknya = 100%</p>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-blue-500 text-white px-6 py-2 rounded">
                            💾 Simpan
                        </button>
                        <a href="/kriteria"
                           class="bg-gray-400 text-white px-6 py-2 rounded">
                            ✖ Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
