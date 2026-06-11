<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password - Rental Mobil</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-lg p-12" style="width: 520px;">

        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="text-5xl mb-3">🔑</div>
            <h1 class="text-2xl font-bold text-gray-800">Lupa Password?</h1>
            <p class="text-gray-500 text-sm mt-1">Masukkan email Anda untuk reset password</p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                {{ session('status') }}
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('password.email') }}" class="px-8">
            @csrf

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       required autofocus>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg transition">
                📧 Kirim Link Reset Password
            </button>

        </form>

        {{-- Kembali ke Login --}}
        <p class="text-center text-sm text-gray-500 mt-6">
            Ingat password?
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Masuk di sini</a>
        </p>

        {{-- Footer --}}
        <p class="text-center text-gray-400 text-xs mt-4">
            © {{ date('Y') }} Rental Mobil. All rights reserved.
        </p>

    </div>

</body>
</html>
