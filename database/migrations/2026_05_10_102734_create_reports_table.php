<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->uuid('ticket_id')->unique();
            $table->foreignId('kabupaten_id')->nullable()->constrained('kabupaten')->nullOnDelete();
            $table->foreignId('threat_type_id')->constrained('threat_types');
            $table->string('app_name')->nullable(); // Nama aplikasi pinjol
            $table->text('chronology');
            $table->boolean('is_anonymous')->default(true);
            $table->enum('consent_scope', ['internal_only', 'share_to_authorities', 'public_anonymized']);
            $table->enum('status', ['received', 'verified', 'forwarded', 'resolved', 'archived'])->default('received');
            $table->string('ip_hash')->nullable(); // Hash IP, bukan plain text
            $table->softDeletes();
            $table->timestamps();

            $table->index(['kabupaten_id', 'status']);
            $table->index(['created_at', 'status']);
        });
    }
    public function down(): void { Schema::dropIfExists('reports'); }
};
