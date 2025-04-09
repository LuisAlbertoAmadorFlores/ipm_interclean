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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id('idIncidencias');
            $table->date('Fecha_Incidencia');
            $table->string('Tipo_Incidencia');
            $table->string('Evidencia')->nullable();
            $table->string('Descripcion');
            $table->string('Categoria');
            $table->unsignedBigInteger('id_colaborador');
            $table->foreign('id_colaborador')->references('idColaborador')->on('colaborador');
            $table->unsignedBigInteger('Asignado_by');
            $table->foreign('Asignado_by')->references('id')->on('users');
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
        Schema::dropIfExists('incidencias');
    }
};
