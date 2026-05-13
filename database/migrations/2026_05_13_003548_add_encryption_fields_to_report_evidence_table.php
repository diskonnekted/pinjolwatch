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
        Schema::table('report_evidence', function (Blueprint $table) {
            $table->boolean('is_client_encrypted')->default(false)->after('file_size');
            $table->json('encryption_metadata')->nullable()->after('is_client_encrypted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('report_evidence', function (Blueprint $table) {
            $table->dropColumn(['is_client_encrypted', 'encryption_metadata']);
        });
    }
};
