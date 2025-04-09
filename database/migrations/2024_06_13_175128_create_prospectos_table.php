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
        Schema::create('prospectos', function (Blueprint $table) {
            $table->id('idProspectos');
            $table->String('Nombre');
            $table->String('Apellido_Paterno');
            $table->String('Apellido_Materno');
            $table->integer('Edad');
            $table->enum('Sexo',['H','M']);
            $table->String('Direccion');
            $table->string('Colonia');
            $table->String('Municipio');
            $table->String('Estado');
            $table->integer('Codigo_Postal');
            $table->unsignedBigInteger('Telefono');
            $table->String('Email')->unique();
            $table->string('idReclutador');
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
        Schema::dropIfExists('prospectos');
    }
};
