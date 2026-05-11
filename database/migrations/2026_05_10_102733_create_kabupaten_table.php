<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bps', 12)->unique(); // Kode BPS 6 digit
            $table->string('nama');
            $table->string('provinsi');
            $table->json('geojson')->nullable(); // Opsional: simpan batas wilayah jika tidak pakai file eksternal
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('kabupaten'); }
};
