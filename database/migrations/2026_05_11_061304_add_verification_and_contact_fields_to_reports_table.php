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
            $table->json('verification_checklist')->nullable()->after('dc_actions');
            $table->string('reporter_whatsapp', 20)->nullable()->after('contact_phone_number');
            $table->boolean('whatsapp_consent')->default(false)->after('reporter_whatsapp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn(['verification_checklist', 'reporter_whatsapp', 'whatsapp_consent']);
        });
    }
};
