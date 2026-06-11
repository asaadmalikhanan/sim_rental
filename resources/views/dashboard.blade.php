<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Banner Selamat Datang --}}
            <div class="rounded-2xl overflow-hidden shadow-sm" style="background:linear-gradient(135deg, #1e3a5f 0%, #2d6a9f 100%); min-height:160px;">
                <div class="flex items-center gap-8" style="min-height:160px; padding-left:3rem; padding-right:3rem;">

                    {{-- Logo dengan background putih --}}
<div style="flex-shrink:0; background:#fff; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; padding:6px;">
    <img src="/images/logocvMAS.png" alt="Logo CV MAS"
         style="width:100px; height:100px; object-fit:contain;">
</div>

                    {{-- Garis --}}
                    <div style="width:1px; height:90px; background:rgba(255,255,255,0.2); flex-shrink:0;"></div>

                    {{-- Teks --}}
                    <div>
                        <p style="color:rgba(255,255,255,0.6); font-size:11px; text-transform:uppercase; letter-spacing:2px; margin-bottom:6px;">Selamat Datang</p>
                        <h1 style="color:#fff; font-size:26px; font-weight:700; margin-bottom:8px;">CV. Mitra Agata Selaras</h1>
                        <p style="color:rgba(255,255,255,0.75); font-size:13px; line-height:1.6;">
                            Penyedia jasa rental kendaraan terpercaya dengan berbagai pilihan armada untuk kebutuhan pribadi, operasional, dan pekerjaan.
                        </p>
                    </div>

                </div>
            </div>

            {{-- Info Rental --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white rounded-xl shadow-sm p-5 flex items-start gap-4 border-l-4" style="border-left-color:#1e3a5f;">
                    <div class="text-3xl">🕐</div>
                    <div>
                        <p class="font-semibold text-gray-800 mb-1">Jam Operasional</p>
                        <p class="text-sm text-gray-500">Senin - Sabtu</p>
                        <p class="text-sm text-gray-500">08.00 - 17.00 WIB</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-5 flex items-start gap-4 border-l-4" style="border-left-color:#2d6a9f;">
                    <div class="text-3xl">📍</div>
                    <div>
                        <p class="font-semibold text-gray-800 mb-1">Lokasi</p>
                        <p class="text-sm text-gray-500">Pekanbaru, Riau</p>
                        <p class="text-sm text-gray-500">Melayani area sekitarnya</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-5 flex items-start gap-4 border-l-4" style="border-left-color:#3a86c8;">
                    <div class="text-3xl">📋</div>
                    <div>
                        <p class="font-semibold text-gray-800 mb-1">Syarat Sewa</p>
                        <p class="text-sm text-gray-500">KTP & SIM aktif</p>
                        <p class="text-sm text-gray-500">DP sesuai ketentuan</p>
                    </div>
                </div>
            </div>

            {{-- Armada Kami --}}
            <div>
                <h2 class="text-lg font-semibold text-gray-700 mb-3">🚗 Armada Kami</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                    <div class="bg-white rounded-xl overflow-hidden border hover:shadow-lg transition">
                        <img src="/images/avanza.png" alt="Avanza" class="w-full h-40 object-cover">
                        <div class="p-3">
                            <p class="font-semibold text-gray-800">Toyota Avanza</p>
                            <p class="text-sm text-gray-500">Mobil Penumpang</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl overflow-hidden border hover:shadow-lg transition">
                        <img src="/images/fortuner.png" alt="Fortuner" class="w-full h-40 object-cover">
                        <div class="p-3">
                            <p class="font-semibold text-gray-800">Toyota Fortuner</p>
                            <p class="text-sm text-gray-500">SUV</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl overflow-hidden border hover:shadow-lg transition">
                        <img src="/images/pajero.png" alt="Pajero" class="w-full h-40 object-cover">
                        <div class="p-3">
                            <p class="font-semibold text-gray-800">Mitsubishi Pajero</p>
                            <p class="text-sm text-gray-500">SUV</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl overflow-hidden border hover:shadow-lg transition">
                        <img src="/images/triton.png" alt="Triton" class="w-full h-40 object-cover">
                        <div class="p-3">
                            <p class="font-semibold text-gray-800">Mitsubishi Triton</p>
                            <p class="text-sm text-gray-500">Pickup</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl overflow-hidden border hover:shadow-lg transition">
                        <img src="/images/truck.png" alt="Truck" class="w-full h-40 object-cover">
                        <div class="p-3">
                            <p class="font-semibold text-gray-800">Truck</p>
                            <p class="text-sm text-gray-500">Truck</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl overflow-hidden border hover:shadow-lg transition">
                        <img src="/images/bus.png" alt="Bus" class="w-full h-40 object-cover">
                        <div class="p-3">
                            <p class="font-semibold text-gray-800">Bus</p>
                            <p class="text-sm text-gray-500">Minibus</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
