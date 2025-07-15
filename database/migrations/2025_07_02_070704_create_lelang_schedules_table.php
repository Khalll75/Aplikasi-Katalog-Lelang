<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lelang_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->date('tanggal')->nullable();
            $table->string('lokasi')->nullable();
            $table->bigInteger('limit_lelang')->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('lelang_schedules');
    }
};
