<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('route_name');
            $table->string('http_method');
            $table->string('url');
            $table->string('ip_masked'); // 192.168.xxx.xxx
            $table->json('payload_summary')->nullable(); // Ringkasan request (tanpa PII)
            $table->timestamps();
            $table->index('user_id');
        });
    }
    public function down(): void { Schema::dropIfExists('audit_logs'); }
};
