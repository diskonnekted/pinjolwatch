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
        Schema::create('consent_logs', function (Blueprint $table) {
            $table->id();
            $table->uuid('ticket_id');
            $table->enum('scope', ['internal_only', 'share_to_authorities', 'public_anonymized']);
            $table->boolean('is_active')->default(true);
            $table->timestamp('granted_at');
            $table->timestamp('withdrawn_at')->nullable();
            $table->ipAddress('ip_masked');
            $table->timestamps();
            $table->index('ticket_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consent_logs');
    }
};
