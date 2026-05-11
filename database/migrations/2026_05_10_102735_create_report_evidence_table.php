<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('report_evidence', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('reports')->cascadeOnDelete();
            $table->string('original_name');
            $table->string('encrypted_path'); // Path file terenkripsi
            $table->string('mime_type');
            $table->unsignedBigInteger('file_size');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('report_evidence'); }
};
