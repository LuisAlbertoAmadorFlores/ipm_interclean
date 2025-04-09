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
        Schema::create('complementos', function (Blueprint $table) {
            $table->id('idComplementos');
            $table->string('Zona');
            $table->String('Proyecto');
            $table->String('Puesto');
            $table->integer('Salario');
            $table->integer('Bono');
            $table->enum('Tipo_Pago',['Semanal','Quincenal']);
            $table->String('RFC')->unique();
            $table->String('NSS')->unique();
            $table->String('CURP');
            $table->string('SMN')->nullable();
            $table->string('Emergencia_Nombre');
            $table->string('Emergencia_Telefono');
            $table->string('Emergencia_Parentesco');
            $table->string('Codigo_Postal_RFC');
            $table->String('Estudios');
            $table->String('Modalidad');
            $table->string('Jornada');
            $table->string('Fecha_Ingreso');
            $table->enum('Descuento_Nomina', ['0', '1']);
            $table->enum('Credito_Infonavit_Fonacot', ['0', '1']);
            $table->enum('Discapacidad', ['0', '1']);
            $table->enum('Banco', ['Bancomer', 'Bancoppel','Santander','HSBC','CITIBANAMEX','Banco Azteca','Banorte']);
            $table->string('Clave_Interbancaria');
            $table->string('Numero_Cuenta');
            $table->string('Numero_Tarjeta');
            $table->unsignedBigInteger('id_colaborador');
            $table->foreign('id_colaborador')->references('idColaborador')->on('colaborador')->onDelete('cascade');
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
        Schema::dropIfExists('laboral');
    }
};
