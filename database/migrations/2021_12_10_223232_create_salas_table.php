<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('id_edificio');
            $table->float('Area')->default(0.0);
            $table->integer('Piso')->default(0);
            $table->string('Type')->default('Normal_NOT_SET');
            $table->string('Descricao');
            $table->timestamps();
            $table->foreign('id_edificio')->references('id')->on('edificios')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salas');
    }
}
