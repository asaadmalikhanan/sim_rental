<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Pelanggan</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">

                <form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan"
                               value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">NIK (16 digit)</label>
                        <input type="text" name="nik"
                               value="{{ old('nik', $pelanggan->nik) }}"
                               maxlength="16" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">No. Telepon</label>
                            <input type="text" name="no_telepon"
                                   value="{{ old('no_telepon', $pelanggan->no_telepon) }}"
                                   class="w-full border rounded px-3 py-2" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Email (opsional)</label>
                        <input type="email" name="email"
                               value="{{ old('email', $pelanggan->email) }}"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-1">Alamat</label>
                        <textarea name="alamat" rows="3"
                                  class="w-full border rounded px-3 py-2" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-6 py-2 rounded">
                            ✏️ Update
                        </button>
                        <a href="{{ route('pelanggan.index') }}"
                           class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded">
                            ✖ Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
