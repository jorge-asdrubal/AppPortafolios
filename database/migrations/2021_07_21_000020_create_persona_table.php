<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id('id_persona');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('celular', 20);
            $table->string('correo_electronico', 100);
            $table->string('foto');
            $table->string('hoja_vida')->nullable();
            $table->text('biografia');
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
        Schema::dropIfExists('persona');
    }
}
