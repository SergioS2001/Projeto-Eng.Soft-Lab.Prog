<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('id_Sala');
            $table->foreign('id_Sala')->references('id')->on('salas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('id_Utilizador');
            $table->foreign('id_Utilizador')->references('id')->on('utilizadors')->cascadeOnUpdate()->cascadeOnDelete();
            $table->dateTime('date_in');
            $table->dateTime('date_out');
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
        Schema::dropIfExists('requisitos');
    }
}
