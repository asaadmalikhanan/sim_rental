<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Kriteria</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
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

<form action="/kriteria/{{ $kriteria->id }}" method="POST">
    @csrf
    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nama Kriteria</label>
                        <input type="text" name="nama_kriteria"
                               value="{{ old('nama_kriteria', $kriteria->nama_kriteria) }}"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Jenis</label>
                        <select name="jenis" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="benefit" {{ old('jenis', $kriteria->jenis) == 'benefit' ? 'selected' : '' }}>
                                Benefit (semakin besar semakin baik)
                            </option>
                            <option value="cost" {{ old('jenis', $kriteria->jenis) == 'cost' ? 'selected' : '' }}>
                                Cost (semakin kecil semakin baik)
                            </option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-1">Bobot (%)</label>
                        <input type="number" name="bobot"
                               value="{{ old('bobot', $kriteria->bobot) }}"
                               min="1" max="100"
                               class="w-full border rounded px-3 py-2" required>
                        <p class="text-xs text-gray-500 mt-1">Total semua bobot sebaiknya = 100%</p>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-6 py-2 rounded">
                            💾 Update
                        </button>
                        <a href="/kriteria"
                           class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded">
                            ✖ Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
