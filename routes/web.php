<?php

use App\Http\Controllers\MobilController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SawController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.pdf');
    Route::get('laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.excel');

    Route::get('saw', [SawController::class, 'index'])->name('saw.index');
    Route::post('saw/hasil', [SawController::class, 'hasil'])->name('saw.hasil');

    Route::get('mobil', [MobilController::class, 'index'])->name('mobil.index');
    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
    Route::get('kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');

    Route::middleware('admin')->group(function () {

        Route::get('mobil/create', [MobilController::class, 'create'])->name('mobil.create');
        Route::post('mobil', [MobilController::class, 'store'])->name('mobil.store');
        Route::get('mobil/{mobil}/edit', [MobilController::class, 'edit'])->name('mobil.edit');
        Route::put('mobil/{mobil}', [MobilController::class, 'update'])->name('mobil.update');
        Route::delete('mobil/{mobil}', [MobilController::class, 'destroy'])->name('mobil.destroy');

        Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
        Route::post('pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
        Route::get('pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
        Route::put('pelanggan/{pelanggan}', [PelangganController::class, 'update'])->name('pelanggan.update');
        Route::delete('pelanggan/{pelanggan}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

        Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
        Route::get('transaksi/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
        Route::put('transaksi/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');
        Route::delete('transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

        Route::get('pengembalian/create', [PengembalianController::class, 'create'])->name('pengembalian.create');
        Route::post('pengembalian', [PengembalianController::class, 'store'])->name('pengembalian.store');
        Route::get('pengembalian/{pengembalian}/edit', [PengembalianController::class, 'edit'])->name('pengembalian.edit');
        Route::put('pengembalian/{pengembalian}', [PengembalianController::class, 'update'])->name('pengembalian.update');
        Route::delete('pengembalian/{pengembalian}', [PengembalianController::class, 'destroy'])->name('pengembalian.destroy');

        Route::get('kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
        Route::post('kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
        Route::get('kriteria/{kriteria}/edit', [KriteriaController::class, 'edit'])->name('kriteria.edit');
        Route::put('kriteria/{kriteria}', [KriteriaController::class, 'update'])->name('kriteria.update');
        Route::delete('kriteria/{kriteria}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');

    });

});

require __DIR__.'/auth.php';
