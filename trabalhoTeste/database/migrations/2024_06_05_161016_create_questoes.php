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
        Schema::create('questoes', function (Blueprint $table) {
            $table->id();
            $table->text('descricao');
            $table->text('textoA');
            $table->text('textoB');
            $table->text('textoC');
            $table->text('TextoD');
            $table->text('TextoE');
            $table->text('resposta');
            $table->text('valorTotal');
            $table->foreignId('teste_id')->constrained('testes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questoes');
    }
};
