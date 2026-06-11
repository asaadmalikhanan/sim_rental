<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex">

            <!-- Sisi Kiri -->
            <div class="hidden lg:flex lg:w-1/2 bg-gray-800 flex-col justify-center items-center text-white px-12">
                <div class="text-center">
                    <div class="text-6xl mb-6">🚗</div>
                    <h1 class="text-4xl font-bold mb-4">Rental Mobil</h1>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        Sistem informasi manajemen rental mobil dengan rekomendasi armada
                        menggunakan metode SAW.
                    </p>
                    <div class="mt-10 grid grid-cols-3 gap-6 text-center">
                        <div class="bg-gray-700 rounded-lg p-4">
                            <div class="text-2xl mb-1">📋</div>
                            <p class="text-sm text-gray-300">Kelola Transaksi</p>
                        </div>
                        <div class="bg-gray-700 rounded-lg p-4">
                            <div class="text-2xl mb-1">📊</div>
                            <p class="text-sm text-gray-300">Rekomendasi SAW</p>
                        </div>
                        <div class="bg-gray-700 rounded-lg p-4">
                            <div class="text-2xl mb-1">🖨️</div>
                            <p class="text-sm text-gray-300">Laporan Lengkap</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sisi Kanan -->
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-8 bg-gray-50">
                <div class="w-full max-w-md">

                    <div class="text-center mb-8">
                        <div class="text-5xl mb-3">🚗</div>
                        <h2 class="text-3xl font-bold text-gray-800">Selamat Datang</h2>
                        <p class="text-gray-500 mt-1">Masuk ke sistem rental mobil</p>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        {{ $slot }}
                    </div>

                    <p class="text-center text-sm text-gray-400 mt-6">
                        &copy; {{ date('Y') }} Rental Mobil. All rights reserved.
                    </p>

                </div>
            </div>

        </div>
    </body>
</html>
