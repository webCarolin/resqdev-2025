<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donatur_id')->constrained()->onDelete('cascade');
            $table->foreignId('bencana_id')->constrained()->onDelete('cascade');
            $table->decimal('jumlah_donasi', 12, 2); // Ganti field sesuai resource nanti
            $table->date('tanggal_donasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};
