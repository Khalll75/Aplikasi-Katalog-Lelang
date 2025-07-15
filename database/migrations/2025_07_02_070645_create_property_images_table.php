<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('property_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('media_url')->nullable();
            $table->string('media_type')->default('image')->nullable(); // 'image' or 'video'
            $table->integer('duration')->nullable(); // For videos, in seconds
            $table->string('format')->nullable(); // File format (jpg, png, mp4, etc.)
            $table->string('resolution')->nullable(); // For videos: 1920x1080, etc.
            $table->boolean('is_main')->default(false)->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('property_media');
    }
};
