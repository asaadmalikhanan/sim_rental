<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Rental Mobil</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-lg rounded-lg p-12 max-w-md w-full" style="width: 480px;">

        {{-- Header --}}
        <div class="text-center mb-8">
<img src="/images/logocvMAS.png" alt="Logo CV Mitra Agata Selaras"
     style="height: 200px; width: 200px; object-fit: contain; display: block; margin: 0 auto 0.75rem;">
            <h1 class="text-2xl font-bold text-gray-800">Selamat Datang</h1>
            <p class="text-gray-500 text-sm mt-1">Masuk ke sistem informasi rental mobil</p>
        </div>

        {{-- Session Error --}}
        @if (session('status'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                {{ session('status') }}
            </div>
        @endif

        {{-- Form Login --}}
<form method="POST" action="{{ route('login') }}" class="px-8">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required autofocus>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center gap-2 text-sm text-gray-600">
                    <input type="checkbox" name="remember">
                    Ingat saya
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-sm text-blue-500 hover:underline">
                        Lupa password?
                    </a>
                @endif
            </div>

            {{-- Tombol Login --}}
            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg transition">
                Masuk
            </button>

        </form>

        {{-- Footer --}}
        <p class="text-center text-gray-400 text-xs mt-6">
            © {{ date('Y') }} CV. Mitra Agata Selaras
        </p>

    </div>

</body>
</html>
