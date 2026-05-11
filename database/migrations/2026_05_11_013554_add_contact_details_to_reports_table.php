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
        Schema::table('reports', function (Blueprint $table) {
            $table->string('contact_phone_number')->nullable()->after('app_name');
            $table->enum('identity_disclosure', ['menyebutkan_aplikasi', 'tidak_menyebutkan'])->nullable()->after('contact_phone_number');
            $table->enum('communication_tone', ['santun_resmi', 'kasar_ancaman'])->nullable()->after('identity_disclosure');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn(['contact_phone_number', 'identity_disclosure', 'communication_tone']);
        });
    }
};
