<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bencanas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bencana');
            $table->string('lokasi');
            $table->enum('status', ['belum ditangani', 'dalam proses', 'selesai'])->default('belum ditangani');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bencanas');
    }
};
