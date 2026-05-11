<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('threat_types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique(); // e.g., VERBAL_THREAT, DATA_LEAK, PHYSICAL_INTIMIDATION
            $table->string('label');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('threat_types'); }
};
