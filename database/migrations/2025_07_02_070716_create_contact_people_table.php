<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('contact_persons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('no_hp');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('contact_persons');
    }
};
