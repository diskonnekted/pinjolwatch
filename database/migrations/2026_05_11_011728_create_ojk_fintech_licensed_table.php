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
        Schema::create('ojk_fintech_licensed', function (Blueprint $table) {
            $table->id();
            $table->string('nama_platform');
            $table->string('izin_nomor')->nullable();
            $table->string('status'); // Terdaftar, Berizin, Dicabut, dll
            $table->text('alamat')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->timestamp('tanggal_update')->nullable();
            $table->timestamps();
            
            $table->index('nama_platform');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ojk_fintech_licensed');
    }
};
