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
        Schema::create('lista_asistencia', function (Blueprint $table) {
            $table->id('idlistaAsistencia');
            $table->string('idColaborador');
            $table->string('Fecha_Laboral');
            $table->string('Hora_Entrada')->nullable();
            $table->string('Hora_Salida')->nullable();
            $table->string('idCoordinador');
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
        Schema::dropIfExists('lista_asistencia');
    }
};
