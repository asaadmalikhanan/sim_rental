<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Rental Mobil') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="background:#f0f2f5;">

        <div class="flex min-h-screen" x-data="{ sidebarOpen: window.innerWidth >= 768 }" @resize.window="sidebarOpen = window.innerWidth >= 768">

            <!-- Overlay Mobile -->
            <div x-show="sidebarOpen && window.innerWidth < 768"
                 @click="sidebarOpen = false"
                 class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"></div>

            <!-- Sidebar -->
            <aside :class="sidebarOpen ? 'w-64 translate-x-0' : '-translate-x-full md:translate-x-0 md:w-16'"
                   class="sidebar sidebar-transition min-h-screen flex flex-col flex-shrink-0 fixed md:relative z-50"
                   style="transition: all 0.3s ease;">

                <!-- Logo -->
                <div class="sidebar-header flex items-center gap-3 px-4 py-4">
                    <div style="width:36px; height:36px; border-radius:10px; background:rgba(255, 255, 255, 0.918); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <img src="/images/logocvMAS.png" alt="Logo"
                             style="width:28px; height:28px; object-fit:contain;">
                    </div>
                    <div x-show="sidebarOpen"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100">
                        <p style="font-size:13px; font-weight:600; color:#fff; margin:0; white-space:nowrap;">CV. Mitra Agata Selaras</p>
                        <p style="font-size:10px; color:rgba(255,255,255,0.4); margin:0;">Rental Mobil</p>
                    </div>
                </div>

                <!-- Menu Label -->
                <div x-show="sidebarOpen" class="px-4 pt-5 pb-2">
                    <p style="font-size:10px; font-weight:600; color:rgba(255,255,255,0.3); letter-spacing:0.08em; text-transform:uppercase;">Menu Utama</p>
                </div>

                <!-- Menu -->
                <nav class="flex-1 px-3 space-y-0.5">

                    <a href="/dashboard"
                       class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span x-show="sidebarOpen" style="white-space:nowrap;">Dashboard</span>
                    </a>

                    <a href="/mobil"
                       class="nav-item {{ request()->is('mobil*') ? 'active' : '' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17l-2-2m0 0l-2-2m2 2V9m0 0a4 4 0 018 0v8m-8 0h8m0 0l2-2m-2 2l2 2"/></svg>
                        <span x-show="sidebarOpen" style="white-space:nowrap;">Data Mobil</span>
                    </a>

                    <a href="/pelanggan"
                       class="nav-item {{ request()->is('pelanggan*') ? 'active' : '' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span x-show="sidebarOpen" style="white-space:nowrap;">Data Pelanggan</span>
                    </a>

                    <a href="/transaksi"
                       class="nav-item {{ request()->is('transaksi*') ? 'active' : '' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span x-show="sidebarOpen" style="white-space:nowrap;">Transaksi Rental</span>
                    </a>

                    <a href="/pengembalian"
                       class="nav-item {{ request()->is('pengembalian*') ? 'active' : '' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        <span x-show="sidebarOpen" style="white-space:nowrap;">Pengembalian</span>
                    </a>

                    <div x-show="sidebarOpen" class="px-4 pt-4 pb-2">
                        <p style="font-size:10px; font-weight:600; color:rgba(255,255,255,0.3); letter-spacing:0.08em; text-transform:uppercase;">SAW & Laporan</p>
                    </div>

                    <a href="/kriteria"
                       class="nav-item {{ request()->is('kriteria*') ? 'active' : '' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        <span x-show="sidebarOpen" style="white-space:nowrap;">Kriteria & Bobot</span>
                    </a>

                    <a href="/saw"
                       class="nav-item {{ request()->is('saw*') ? 'active' : '' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                        <span x-show="sidebarOpen" style="white-space:nowrap;">Rekomendasi Armada</span>
                    </a>

                    <a href="/laporan"
                       class="nav-item {{ request()->is('laporan*') ? 'active' : '' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span x-show="sidebarOpen" style="white-space:nowrap;">Laporan</span>
                    </a>

                </nav>

                <!-- Logout -->
                <div class="px-3 pb-4 pt-3 border-t" style="border-color:rgba(255,255,255,0.06);">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-item w-full text-left">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            <span x-show="sidebarOpen" style="white-space:nowrap;">Keluar</span>
                        </button>
                    </form>
                </div>

            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col min-w-0 w-full">

                <!-- Topbar -->
                <header class="topbar fade-in" style="position:sticky; top:0; z-index:10;">

                    <button @click="sidebarOpen = !sidebarOpen"
                            class="p-2 rounded-lg hover:bg-gray-100 transition text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    @isset($header)
                        <div class="text-sm font-semibold text-gray-700">{{ $header }}</div>
                    @endisset

                    <div class="ml-auto flex items-center gap-3">

                        <div class="hidden md:flex items-center gap-2 text-xs text-gray-400 bg-gray-50 px-3 py-1.5 rounded-lg" style="border:1px solid #e8ecf0;">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM Y') }}
                        </div>

                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center gap-2.5 px-3 py-1.5 rounded-lg hover:bg-gray-50 transition" style="border:1px solid #e8ecf0;">
                                    <div style="width:28px; height:28px; border-radius:8px; background:#1a2942; display:flex; align-items:center; justify-content:center;">
                                        <span style="font-size:11px; font-weight:600; color:#fff;">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <span class="text-sm text-gray-600 font-medium hidden md:block">{{ Auth::user()->name }}</span>
                                    <svg class="w-3.5 h-3.5 text-gray-400 fill-current" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Keluar
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>

                    </div>
                </header>

                <!-- Page Content -->
                <main class="flex-1 p-4 md:p-6 page-enter">
                    {{ $slot }}
                </main>

                <!-- Footer -->
                <footer class="px-6 py-3 text-center text-xs text-gray-400 bg-white" style="border-top:1px solid #e8ecf0;">
                    &copy; {{ date('Y') }} CV. Mitra Agata Selaras — Sistem Informasi Rental Mobil
                </footer>

            </div>
        </div>

    </body>
</html>
