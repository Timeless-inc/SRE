<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequerimentosTable extends Migration
{
    public function up()
    {
        Schema::create('requerimentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('usr_cpf');
            $table->string('contato');
            $table->string('email');
            $table->string('usr_rg');
            $table->string('usr_org');
            $table->string('campus');
            $table->string('num_matricula');
            $table->string('curso');
            $table->string('periodo');
            $table->string('turno');
            $table->string('tipo_vinculo');
            $table->text('InputRequerimento');
            $table->text('obs')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requerimentos');
    }
}
