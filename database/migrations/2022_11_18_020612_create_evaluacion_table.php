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
        Schema::create('evaluacion', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->double('peso');
            $table->double('altura');
            $table->unsignedSmallInteger('edadMeses');
            $table->double('total')->nullable();
            $table->unsignedBigInteger('personalId');
            $table->unsignedBigInteger('infanteId');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('personalId')->on('personal')->references('id')->onDelete('cascade');
            $table->foreign('infanteId')->on('infante')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluacion');
    }
};
