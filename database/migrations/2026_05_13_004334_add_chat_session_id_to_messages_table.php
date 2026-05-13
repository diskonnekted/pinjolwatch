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
        Schema::table('messages', function (Blueprint $table) {
            $table->uuid('chat_session_id')->nullable()->after('id');
            $table->foreign('chat_session_id')->references('id')->on('chat_sessions')->onDelete('cascade');
            
            // Make user_id nullable because in session-based chat, session defines the context
            $table->unsignedBigInteger('user_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['chat_session_id']);
            $table->dropColumn('chat_session_id');
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
        });
    }
};
