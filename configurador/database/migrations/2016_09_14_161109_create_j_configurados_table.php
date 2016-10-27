<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJConfiguradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('j_configurados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('genero');
            $table->string('categoria');
            $table->string('verbo');
            $table->string('adjetivo');
            $table->string('tipo');

            $table->string('sonido');
            $table->string('instruccion');
            $table->string('dificultad');
            $table->string('distractores');

            $table->string('subtipo');

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
        Schema::drop('j_configurados');
    }
}
