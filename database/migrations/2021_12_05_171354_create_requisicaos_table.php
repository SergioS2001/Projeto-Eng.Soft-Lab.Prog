<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicaos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('id_Sala');
            $table->foreign('id_Sala')->references('id')->on('salas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('id_Utilizador');
            $table->foreign('id_Utilizador')->references('id')->on('utilizadors')->cascadeOnUpdate();
        $table->dateTime('date_in');
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
        Schema::dropIfExists('requisicaos');
    }
}
