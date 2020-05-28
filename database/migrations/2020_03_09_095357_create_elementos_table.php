<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo');
            $table->Text('contenido');
            $table->unsignedBigInteger('columna_id');
            $table->string('ancho');
            $table->Integer('espacio_izquierda');
            $table->Integer('espacio_arriba');
            $table->Integer('alto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elementos');
    }
}
