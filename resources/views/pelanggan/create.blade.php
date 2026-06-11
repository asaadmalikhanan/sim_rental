<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Pelanggan</h2>
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

                <form action="{{ route('pelanggan.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">NIK (16 digit)</label>
                        <input type="text" name="nik" value="{{ old('nik') }}"
                               maxlength="16" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">No. Telepon</label>
                            <input type="text" name="no_telepon" value="{{ old('no_telepon') }}"
                                   class="w-full border rounded px-3 py-2" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Email (opsional)</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-1">Alamat</label>
                        <textarea name="alamat" rows="3"
                                  class="w-full border rounded px-3 py-2" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                            💾 Simpan
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
