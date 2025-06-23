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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('keluhan');
            $table->string('usia');
            $table->enum('kelamin',['pria','wanita']);
            $table->string('alamat');
            $table->enum('status', ['pending','setuju', 'tolak', 'ditangani', 'selesai'])->default('pending');
            // $table->boolean('is_need_room')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
