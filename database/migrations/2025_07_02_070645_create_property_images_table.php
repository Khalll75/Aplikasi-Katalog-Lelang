<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('property_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('image_url');
            $table->boolean('is_main')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('property_images');
    }
};
