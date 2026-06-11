<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Pengembalian</h2>
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

                @if($transaksis->isEmpty())
                    <div class="bg-yellow-100 text-yellow-700 px-4 py-3 rounded mb-4">
                        ⚠️ Tidak ada transaksi aktif yang perlu dikembalikan.
                        <a href="/transaksi" class="underline font-medium">Lihat Transaksi</a>
                    </div>
                @else
                <form action="/pengembalian" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Pilih Transaksi</label>
                        <select name="transaksi_id" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Transaksi --</option>
                            @foreach($transaksis as $transaksi)
                                <option value="{{ $transaksi->id }}">
                                    {{ $transaksi->kode_transaksi }} |
                                    {{ $transaksi->pelanggan->nama_pelanggan }} |
                                    {{ $transaksi->mobil->nama_mobil }} |
                                    Selesai: {{ $transaksi->tanggal_selesai }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali"
                               value="{{ old('tanggal_kembali', date('Y-m-d')) }}"
                               class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Kondisi Mobil</label>
                        <select name="kondisi_mobil" class="w-full border rounded px-3 py-2" required>
                            <option value="baik">Baik</option>
                            <option value="rusak_ringan">Rusak Ringan</option>
                            <option value="rusak_berat">Rusak Berat</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-1">Catatan (opsional)</label>
                        <textarea name="catatan" rows="3"
                                  class="w-full border rounded px-3 py-2">{{ old('catatan') }}</textarea>
                    </div>

                    <div class="bg-blue-50 border border-blue-200 rounded p-3 mb-6 text-sm text-blue-700">
                        ℹ️ Denda keterlambatan: <strong>Rp 50.000/hari</strong>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                            💾 Simpan
                        </button>
                        <a href="/pengembalian"
                           class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded">
                            ✖ Batal
                        </a>
                    </div>

                </form>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
