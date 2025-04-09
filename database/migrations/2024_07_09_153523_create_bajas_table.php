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
        Schema::create('bajas', function (Blueprint $table) {
            $table->id('idBajas');
            $table->string('idColaborador');
            $table->string('idTurno_Coordinador');
            $table->string('idTurno_Juridico')->nullable();
            $table->string('idTurno_Contabilidad')->nullable();
            $table->enum('Status_baja', ['Aceptado', 'Rechazado', 'Asignado', 'En espera'])->default('En espera');
            $table->string('Fecha_Aceptado')->nullable();
            $table->string('Fecha_Rechazado')->nullable();
            $table->string('Fecha_Asignado')->nullable();
            $table->string('Fecha_Turnado')->nullable();
            $table->timestamp('Fecha_Espera');
            $table->string('Finiquito')->nullable();
            $table->string('Fecha_Baja')->nullable();
            $table->string('Fecha_Baja_IMSS')->nullable();
            $table->string('Lote_IMSS')->nullable();
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
        Schema::dropIfExists('bajas');
    }
};
