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
    Schema::create('kriterias', function (Blueprint $table) {
        $table->id();
        $table->string('nama_kriteria');
        $table->enum('jenis', ['benefit', 'cost']); // benefit=max, cost=min
        $table->decimal('bobot', 5, 2); // bobot dalam persen (misal: 30.00)
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriterias');
    }
};
