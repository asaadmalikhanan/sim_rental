<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->enum('jenis_kendaraan', ['mobil_penumpang', 'pickup', 'truck', 'minibus', 'suv'])->after('keterangan');
            $table->enum('transmisi', ['manual', 'otomatis'])->after('jenis_kendaraan');
            $table->enum('jenis_bbm', ['bensin', 'solar', 'listrik', 'hybrid'])->after('transmisi');
            $table->enum('kondisi', ['sangat_baik', 'baik', 'cukup', 'kurang'])->after('jenis_bbm');
        });
    }

    public function down(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->dropColumn(['jenis_kendaraan', 'transmisi', 'jenis_bbm', 'kondisi']);
        });
    }
};
