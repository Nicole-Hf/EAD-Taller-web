<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->double('total');
            $table->unsignedBigInteger('evaluacionId');
            $table->unsignedBigInteger('areaId');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('evaluacionId')->on('evaluacion')->references('id')->onDelete('cascade');
            $table->foreign('areaId')->on('area')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados');
    }
};
