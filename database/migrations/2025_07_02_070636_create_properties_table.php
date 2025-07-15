<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('kode_aset');
            $table->text('alamat');
            $table->integer('luas_tanah')->nullable();
            $table->integer('luas_bangunan')->nullable();
            $table->integer('kamar_tidur')->nullable();
            $table->integer('kamar_mandi')->nullable();
            $table->string('listrik')->nullable();
            $table->string('air')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('kategori_lot')->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('properties');
    }
};

