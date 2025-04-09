<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_baja', function (Blueprint $table) {
            $table->id('idHistorialBaja');
            $table->string('idColaborador');
            $table->string('idJuridico');
            $table->string('Comentario');
            $table->unsignedBigInteger('idBaja');
            $table->foreign('idBaja')->references('idBajas')->on('bajas');
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
        Schema::dropIfExists('historial_baja');
    }
};
