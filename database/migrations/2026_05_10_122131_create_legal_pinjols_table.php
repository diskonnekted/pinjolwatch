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
        Schema::create('legal_pinjols', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('app_name');
            $table->string('license_number')->nullable();
            $table->date('license_date')->nullable();
            $table->string('business_type')->nullable(); // Konvensional / Syariah
            $table->string('website')->nullable();
            $table->string('os')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_pinjols');
    }
};
