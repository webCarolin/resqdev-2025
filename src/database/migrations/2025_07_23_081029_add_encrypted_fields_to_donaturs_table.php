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
    Schema::table('donaturs', function (Blueprint $table) {
        if (!Schema::hasColumn('donaturs', 'email_enkripsi')) {
            $table->string('email_enkripsi')->nullable()->after('email');
        }
        if (!Schema::hasColumn('donaturs', 'no_hp_enkripsi')) {
            $table->string('no_hp_enkripsi')->nullable()->after('no_hp');
        }
    });
}


public function down(): void
{
    Schema::table('donaturs', function (Blueprint $table) {
        $table->dropColumn(['email_enkripsi', 'no_hp_enkripsi']);
    });
}

};
