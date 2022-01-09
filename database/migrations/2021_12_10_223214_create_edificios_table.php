<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdificiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edificios', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('Nome');
            $table->integer('Piso_min')->default(0);
            $table->integer('Piso_max')->default(0);
            $table->string('Morada');
            $table->time('date_in');
            $table->time('date_out');
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
        Schema::dropIfExists('edificios');
    }
}
