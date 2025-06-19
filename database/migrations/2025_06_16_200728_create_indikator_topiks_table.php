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
        Schema::create('indikator_topiks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topik_kesehatan_id');   
            $table->string('indikator_topik'); 
            $table->string('informasi')->nullable();
            $table->timestamps();
            
            $table->foreign('topik_kesehatan_id')->references('id')->on('topik_kesehatans')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_topiks');
    }
};