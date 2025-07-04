<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('kode_aset')->unique();
            $table->string('nama')->nullable();
            $table->text('alamat');
            $table->integer('luas_tanah');
            $table->integer('luas_bangunan');
            $table->integer('kamar_tidur');
            $table->integer('kamar_mandi');
            $table->string('listrik');
            $table->string('air');
            $table->string('kondisi');
            $table->string('kategori_lot');
            $table->string('status_tanah')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('properties');
    }
};

