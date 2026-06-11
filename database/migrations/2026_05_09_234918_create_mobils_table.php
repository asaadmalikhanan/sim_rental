<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('mobils', function (Blueprint $table) {
        $table->id();
        $table->string('nama_mobil');
        $table->string('merk');
        $table->string('nomor_plat')->unique();  // ✅ diubah dari plat_nomor
        $table->integer('tahun');                // ✅ ditambah
        $table->integer('kapasitas');            // ✅ ditambah
        $table->decimal('harga_sewa', 10, 2);   // ✅ diubah dari harga_rental
        $table->enum('status', ['tersedia', 'disewa', 'tidak_tersedia'])->default('tersedia');
        $table->text('keterangan')->nullable();  // ✅ ditambah
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
