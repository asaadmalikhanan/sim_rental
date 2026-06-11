<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Transaksi</h2>
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

                <form action="/transaksi" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Pelanggan</label>
                        <select name="pelanggan_id" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}">
                                    {{ $pelanggan->nama_pelanggan }} - {{ $pelanggan->nik }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Mobil (Tersedia)</label>
                        <select name="mobil_id" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Mobil --</option>
                            @foreach($mobils as $mobil)
                                <option value="{{ $mobil->id }}">
                                    {{ $mobil->nama_mobil }} - {{ $mobil->nomor_plat }}
                                    (Rp {{ number_format($mobil->harga_sewa, 0, ',', '.') }}/hari)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai"
                                   value="{{ old('tanggal_mulai') }}"
                                   class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai"
                                   value="{{ old('tanggal_selesai') }}"
                                   class="w-full border rounded px-3 py-2" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-1">Catatan (opsional)</label>
                        <textarea name="catatan" rows="3"
                                  class="w-full border rounded px-3 py-2">{{ old('catatan') }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                            💾 Simpan
                        </button>
                        <a href="/transaksi"
                           class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded">
                            ✖ Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
