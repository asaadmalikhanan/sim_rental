<aside class="w-64 min-h-screen flex flex-col" style="background:#1e3a5f;">

    <!-- Logo -->
    <div class="px-6 py-5 border-b" style="border-color:rgba(255,255,255,0.1);">
        <a href="/dashboard" class="flex items-center gap-3">
<div style="background:#fff; border-radius:50%; width:44px; height:44px; flex-shrink:0; display:flex; align-items:center; justify-content:center; overflow:hidden;">
    <img src="/images/logocvMAS.png" alt="Logo CV MAS"
         style="height:52px; width:52px; object-fit:contain;">
</div>
            <span style="font-size:13px; font-weight:600; color:#fff; line-height:1.3;">CV. Mitra Agata Selaras</span>
        </a>
    </div>

    <!-- Menu -->
    <nav class="flex-1 px-4 py-6 space-y-1">

        <a href="/dashboard"
            class="flex items-center gap-3 px-4 py-2 rounded-lg transition text-sm"
            style="{{ request()->is('dashboard') ? 'background:rgba(255,255,255,0.2); color:#fff;' : 'color:rgba(255,255,255,0.7);' }}"
            onmouseover="if(!this.style.background.includes('0.2'))this.style.background='rgba(255,255,255,0.08)'"
            onmouseout="if(!this.style.background.includes('0.2'))this.style.background='transparent'">
            🏠 Dashboard
        </a>

        <a href="/mobil"
            class="flex items-center gap-3 px-4 py-2 rounded-lg transition text-sm"
            style="{{ request()->is('mobil*') ? 'background:rgba(255,255,255,0.2); color:#fff;' : 'color:rgba(255,255,255,0.7);' }}"
            onmouseover="if(!this.style.background.includes('0.2'))this.style.background='rgba(255,255,255,0.08)'"
            onmouseout="if(!this.style.background.includes('0.2'))this.style.background='transparent'">
            🚗 Data Mobil
        </a>

        <a href="/pelanggan"
            class="flex items-center gap-3 px-4 py-2 rounded-lg transition text-sm"
            style="{{ request()->is('pelanggan*') ? 'background:rgba(255,255,255,0.2); color:#fff;' : 'color:rgba(255,255,255,0.7);' }}"
            onmouseover="if(!this.style.background.includes('0.2'))this.style.background='rgba(255,255,255,0.08)'"
            onmouseout="if(!this.style.background.includes('0.2'))this.style.background='transparent'">
            👤 Data Pelanggan
        </a>

        <a href="/transaksi"
            class="flex items-center gap-3 px-4 py-2 rounded-lg transition text-sm"
            style="{{ request()->is('transaksi*') ? 'background:rgba(255,255,255,0.2); color:#fff;' : 'color:rgba(255,255,255,0.7);' }}"
            onmouseover="if(!this.style.background.includes('0.2'))this.style.background='rgba(255,255,255,0.08)'"
            onmouseout="if(!this.style.background.includes('0.2'))this.style.background='transparent'">
            📄 Transaksi Rental
        </a>

        <a href="/pengembalian"
            class="flex items-center gap-3 px-4 py-2 rounded-lg transition text-sm"
            style="{{ request()->is('pengembalian*') ? 'background:rgba(255,255,255,0.2); color:#fff;' : 'color:rgba(255,255,255,0.7);' }}"
            onmouseover="if(!this.style.background.includes('0.2'))this.style.background='rgba(255,255,255,0.08)'"
            onmouseout="if(!this.style.background.includes('0.2'))this.style.background='transparent'">
            🔄 Pengembalian
        </a>

        <a href="/kriteria"
            class="flex items-center gap-3 px-4 py-2 rounded-lg transition text-sm"
            style="{{ request()->is('kriteria*') ? 'background:rgba(255,255,255,0.2); color:#fff;' : 'color:rgba(255,255,255,0.7);' }}"
            onmouseover="if(!this.style.background.includes('0.2'))this.style.background='rgba(255,255,255,0.08)'"
            onmouseout="if(!this.style.background.includes('0.2'))this.style.background='transparent'">
            📋 Kriteria & Bobot
        </a>

        <a href="/saw"
            class="flex items-center gap-3 px-4 py-2 rounded-lg transition text-sm"
            style="{{ request()->is('saw*') ? 'background:rgba(255,255,255,0.2); color:#fff;' : 'color:rgba(255,255,255,0.7);' }}"
            onmouseover="if(!this.style.background.includes('0.2'))this.style.background='rgba(255,255,255,0.08)'"
            onmouseout="if(!this.style.background.includes('0.2'))this.style.background='transparent'">
            ⭐ Rekomendasi Armada
        </a>

        <a href="/laporan"
            class="flex items-center gap-3 px-4 py-2 rounded-lg transition text-sm"
            style="{{ request()->is('laporan*') ? 'background:rgba(255,255,255,0.2); color:#fff;' : 'color:rgba(255,255,255,0.7);' }}"
            onmouseover="if(!this.style.background.includes('0.2'))this.style.background='rgba(255,255,255,0.08)'"
            onmouseout="if(!this.style.background.includes('0.2'))this.style.background='transparent'">
            🖨️ Laporan
        </a>

    </nav>

</aside>
