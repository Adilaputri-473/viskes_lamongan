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
        Schema::create('kesehatan_ibu_anaks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kecamatan_id');   
            $table->unsignedBigInteger('tahun_id');   
            $table->unsignedBigInteger('indikator_id');   
            $table->integer('jumlah'); 
            $table->integer('persentase')->nullable();

            $table->timestamps();
            
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
            $table->foreign('tahun_id')->references('id')->on('tahuns')->onDelete('cascade');
            $table->foreign('indikator_id')->references('id')->on('ibu_anaks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kesehatan_ibu_anaks');
    }
};