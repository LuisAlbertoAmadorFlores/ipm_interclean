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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id('idDocumentos');
            $table->enum('Identificacion',['0','1']);
            $table->enum('CURP',['0','1']);
            $table->enum('NSS',['0','1']);
            $table->enum('Comprobante_Domiclio',['0','1']);
            $table->enum('Acta_Naciminto',['0','1']);
            $table->enum('RFC',['0','1']);
            $table->enum('Solicitud_Empleo',['0','1']);
            $table->enum('Caratula_Banco',['0','1']);
            $table->enum('Contrato_Digital',['0','1']);
            $table->enum('Foto',['0','1']);
            $table->enum('Otro',['0','1']);
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('idColaborador')->on('colaborador');
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
        Schema::dropIfExists('documentos');
    }
};
