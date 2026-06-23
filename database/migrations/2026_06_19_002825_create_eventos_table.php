<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //eventos
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 30)->required(); //Título
            $table->string('texto', 255)->required(); //Texto
            $table->string('caminho_img', 255)->nullable(); //Caminho da imagem
            $table->dateTime('hora_evento')->required(); //Horário do evento
            $table->foreignId('user_id')->constrained()->restrictOnDelete()->required(); //Coordenador que postou o evento       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
