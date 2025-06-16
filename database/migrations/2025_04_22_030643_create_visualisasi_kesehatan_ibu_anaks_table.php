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
        Schema::create('visualisasi_kesehatan_ibu_anaks', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('tahun_id');   
            $table->unsignedBigInteger('indikator_id');   
            $table->string('link_visualisasi'); 
            $table->timestamps();
            
            $table->foreign('tahun_id')->references('id')->on('tahuns')->onDelete('cascade');
            $table->foreign('indikator_id')->references('id')->on('ibu_anaks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visualisasi_kesehatan_ibu_anaks');
    }
};