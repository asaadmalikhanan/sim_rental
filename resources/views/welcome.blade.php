<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Rental Mobil') }} — Login</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:300,400,500|playfair-display:600,700" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f5f4f0;
            min-height: 100vh;
            display: flex;
            align-items: stretch;
        }

        /* ── Left Panel ── */
        .left-panel {
            width: 42%;
            background: #0d1321;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 2.5rem 2.25rem;
            min-height: 100vh;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon {
            width: 38px; height: 38px;
            background: #d4600a;
            border-radius: 7px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 15px;
            color: #e8e4d8;
            line-height: 1.2;
            display: block;
        }

        .brand-sub {
            font-size: 11px;
            color: rgba(232,228,216,0.35);
            letter-spacing: 0.06em;
            display: block;
            margin-top: 2px;
        }

        .panel-middle { padding: 1rem 0; }

        .panel-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.7rem;
            color: #e8e4d8;
            line-height: 1.3;
            margin-bottom: 0.75rem;
        }

        .panel-title span { color: #d4600a; }

        .panel-desc {
            font-size: 13px;
            color: rgba(232,228,216,0.4);
            line-height: 1.7;
        }

        .panel-pills {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 1.75rem;
        }

        .pill {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 13px;
            background: rgba(232,228,216,0.04);
            border: 0.5px solid rgba(232,228,216,0.1);
            border-radius: 8px;
            font-size: 13px;
            color: rgba(232,228,216,0.5);
        }

        .pill-icon {
            font-size: 16px;
            color: #d4600a;
        }

        .panel-footer {
            font-size: 11.5px;
            color: rgba(232,228,216,0.2);
        }

        /* ── Right Panel ── */
        .right-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem;
        }

        .login-card {
            width: 100%;
            max-width: 380px;
        }

        .login-heading {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: #1a1a1a;
            margin-bottom: 0.3rem;
        }

        .login-sub {
            font-size: 13.5px;
            color: #888;
            margin-bottom: 2rem;
        }

        /* ── Form ── */
        .form-group { margin-bottom: 1.15rem; }

        .form-label {
            display: block;
            font-size: 12.5px;
            font-weight: 500;
            color: #444;
            margin-bottom: 6px;
            letter-spacing: 0.02em;
        }

        .form-input {
            width: 100%;
            padding: 10px 13px;
            border: 0.5px solid #d0cec8;
            border-radius: 7px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: #1a1a1a;
            background: #fff;
            outline: none;
            transition: border-color 0.15s;
        }

        .form-input:focus { border-color: #d4600a; box-shadow: 0 0 0 3px rgba(212,96,10,0.08); }
        .form-input.is-invalid { border-color: #dc2626; }
        .form-input::placeholder { color: #bbb; }

        .invalid-feedback {
            display: block;
            margin-top: 5px;
            font-size: 12px;
            color: #dc2626;
        }

        /* Remember me */
        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 13px;
            color: #666;
            cursor: pointer;
        }

        .remember-label input[type="checkbox"] {
            width: 15px; height: 15px;
            accent-color: #d4600a;
            cursor: pointer;
        }

        .forgot-link {
            font-size: 12.5px;
            color: #d4600a;
            text-decoration: none;
        }

        .forgot-link:hover { text-decoration: underline; }

        /* Submit button */
        .btn-masuk {
            width: 100%;
            padding: 11px;
            background: #0d1321;
            border: none;
            border-radius: 7px;
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 14.5px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
            letter-spacing: 0.02em;
        }

        .btn-masuk:hover { background: #1a2540; }
        .btn-masuk:active { transform: scale(0.99); }

        /* Session error alert */
        .alert-error {
            background: #fef2f2;
            border: 0.5px solid #fca5a5;
            border-radius: 7px;
            padding: 10px 13px;
            font-size: 13px;
            color: #dc2626;
            margin-bottom: 1.25rem;
        }

        /* Footer */
        .login-footer {
            margin-top: 1.5rem;
            padding-top: 1.25rem;
            border-top: 0.5px solid #e5e3dd;
            text-align: center;
            font-size: 12px;
            color: #aaa;
        }

        .login-footer a {
            color: #d4600a;
            text-decoration: none;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            body { flex-direction: column; }

            .left-panel {
                width: 100%;
                min-height: auto;
                padding: 1.75rem 1.5rem;
            }

            .panel-title { font-size: 1.3rem; }
            .panel-pills { display: none; }
            .panel-middle { padding: 0.5rem 0; }
            .panel-footer { display: none; }

            .right-panel { padding: 2rem 1.5rem; }
        }
    </style>
</head>

<body>

    {{-- ══════════════════════════════
         LEFT PANEL — Branding
    ══════════════════════════════ --}}
    <div class="left-panel">

        {{-- Brand --}}
        <div class="brand">
            <div class="brand-icon">🚗</div>
            <div>
                <span class="brand-name">Rental Mobil</span>
                <span class="brand-sub">CV. Mitra Agata Selaras</span>
            </div>
        </div>

        {{-- Tagline & fitur --}}
        <div class="panel-middle">
            <h2 class="panel-title">
                Sistem<br>Manajemen<br><span>Internal</span>
            </h2>
            <p class="panel-desc">
                Portal khusus untuk pengelolaan operasional armada,
                pemesanan, dan laporan keuangan perusahaan.
            </p>

            <div class="panel-pills">
                <div class="pill">
                    <span class="pill-icon">📊</span>
                    Laporan &amp; Analitik Bisnis
                </div>
                <div class="pill">
                    <span class="pill-icon">🚗</span>
                    Manajemen Armada &amp; Pemesanan
                </div>
                <div class="pill">
                    <span class="pill-icon">👥</span>
                    Data Pelanggan &amp; Pengemudi
                </div>
                <div class="pill">
                    <span class="pill-icon">🧾</span>
                    Keuangan &amp; Penagihan
                </div>
            </div>
        </div>

        <div class="panel-footer">
            &copy; {{ date('Y') }} CV. Mitra Agata Selaras &mdash; Akses terbatas
        </div>
    </div>

    {{-- ══════════════════════════════
         RIGHT PANEL — Form Login
    ══════════════════════════════ --}}
    <div class="right-panel">
        <div class="login-card">

            <h1 class="login-heading">Selamat datang</h1>
            <p class="login-sub">Masuk untuk mengakses dashboard internal</p>

            {{-- Session error (misal: akun tidak aktif, dll) --}}
            @if (session('status'))
                <div class="alert-error">{{ session('status') }}</div>
            @endif

            {{-- Form Login --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-input @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="admin@mitraagata.com"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label class="form-label" for="password">Kata sandi</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-input @error('password') is-invalid @enderror"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                    />
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Remember me + Forgot password --}}
                <div class="remember-row">
                    <label class="remember-label">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        Ingat saya
                    </label>

                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            Lupa kata sandi?
                        </a>
                    @endif
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-masuk">
                    Masuk ke Sistem
                </button>

            </form>

            <div class="login-footer">
                Butuh akun? Hubungi
                <a href="mailto:admin@mitraagata.com">administrator</a>
            </div>

        </div>
    </div>

</body>
</html>
