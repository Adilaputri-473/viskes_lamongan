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
        Schema::table('visualisasi_kasus_penyakit_menulars', function (Blueprint $table) {
            $table->string('kategori')->after('link_visualisasi')->nullable(); // atau hapus `nullable()` jika wajib
        });
    }

    public function down(): void
    {
        Schema::table('visualisasi_kasus_penyakit_menulars', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};