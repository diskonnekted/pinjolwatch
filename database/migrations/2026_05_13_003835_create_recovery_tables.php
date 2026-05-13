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
        Schema::create('recovery_stages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('order')->default(0);
            $table->string('icon')->nullable();
            $table->json('tasks')->nullable(); // List of actionable tasks for this stage
            $table->timestamps();
        });

        Schema::create('user_recovery_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('recovery_stage_id')->constrained('recovery_stages')->cascadeOnDelete();
            $table->timestamp('completed_at')->nullable();
            $table->integer('mood_rating')->nullable(); // 1-5
            $table->text('user_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_recovery_progress');
        Schema::dropIfExists('recovery_stages');
    }
};
