<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilizadorNaoPriviligiadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilizador__nao__priviligiados', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('id_Utilizador');
            $table->foreign('id_Utilizador')->references('id')->on('utilizadors')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilizador__nao__priviligiados');
    }
}
