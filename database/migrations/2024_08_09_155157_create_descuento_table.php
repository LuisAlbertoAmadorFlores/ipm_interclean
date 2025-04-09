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
        Schema::create('descuento', function (Blueprint $table) {
            $table->id('idDescuento');
            $table->string('Motivo')->nullable();
            $table->string('Costo_Total')->nullable();
            $table->string('Costo_Restante')->nullable();
            $table->string('Parcialidades')->nullable();
            $table->string('Tipo_Descuento')->nullable();
            $table->enum('Status',['Activo','Cancelado','Pausado','Pagado']);
            $table->string('Cantidad_Descontada')->nullable();
            $table->string('Fecha_Asigancion_Descuento')->nullable();
            $table->unsignedBigInteger('idColaborador');
            $table->unsignedBigInteger('idCoordinador');
            $table->foreign('idColaborador')->references('idColaborador')->on('colaborador')->onDelete('cascade');
            $table->foreign('idCoordinador')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('descuento');
    }
};
