<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id('id_proyecto');
            $table->string('imagen');
            $table->string('nombre', 100);
            $table->text('descripcion', 500);
            $table->string('url');
            $table->foreignId('id_user')->references('id_user')->on('users');
            $table->foreignId('id_tipo_proyecto')->references('id_tipo_proyecto')->on('tipos_proyectos')->onUpdate('cascade');
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
        Schema::dropIfExists('proyectos');
    }
}
