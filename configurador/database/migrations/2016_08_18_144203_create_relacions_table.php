<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacions', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('id_juego')->unsigned();
            $table->foreign('id_juego')->references('id')->on('juegos');

            $table->integer('id_caracteristica')->unsigned();
            $table->foreign('id_caracteristica')->references('id')->on('caracteristicas');
            
            $table->integer('id_taxonomia')->unsigned();
            $table->foreign('id_taxonomia')->references('id')->on('taxonomias');
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
        Schema::drop('relacions');
    }
}
