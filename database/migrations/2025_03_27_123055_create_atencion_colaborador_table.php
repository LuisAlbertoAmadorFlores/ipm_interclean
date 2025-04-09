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
        Schema::create('atencion_colaborador', function (Blueprint $table) {
            $table->id();
            $table->string('Ticket');
            $table->string('Problematica');
            $table->binary('Comentario');
            $table->string('idContactCenter');
            $table->string('idColaborador');
            $table->binary('Involucrados');
            $table->binary('Respuesta')->nulleable();
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
        Schema::dropIfExists('atencion_colaborador');
    }
};
