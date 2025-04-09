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
        Schema::create('nomina', function (Blueprint $table) {
            $table->id('idnomina');
            $table->string('Fecha_Inicial');
            $table->string('Fecha_Final');
            $table->string('Saldo_Pagar');
            $table->string('Descuentos');
            $table->string('Bono');
            $table->string('idCoordinador');
            $table->string('acumulado_diario');
            $table->string('idContador')->nullable();
            $table->string('idColaborador');
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
        Schema::dropIfExists('nomina');
    }
};
