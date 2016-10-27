<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paciente')->unsigned();
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->integer('id_juego')->unsigned();
            $table->foreign('id_juego')->references('id')->on('juegos');
            $table->integer('id_conf')->unsigned();
            $table->foreign('id_conf')->references('id')->on('j_configurados');
            $table->string('fecha');
            $table->string('orden');
            $table->string('juegado');
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
        Schema::drop('configuracions');
    }
}
