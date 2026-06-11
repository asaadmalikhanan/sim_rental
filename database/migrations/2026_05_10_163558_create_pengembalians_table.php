<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksis')->onDelete('cascade');
            $table->date('tanggal_kembali');
            $table->integer('keterlambatan')->default(0);
            $table->decimal('denda', 10, 2)->default(0);
            $table->decimal('total_bayar', 12, 2);
            $table->enum('kondisi_mobil', ['baik', 'rusak_ringan', 'rusak_berat'])->default('baik');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};
