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
        //Tabela de ligação -> cursos e usuários
        Schema::create('cursosusers', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->required(); //Aluno
            $table->foreignId('curso_id')->constrained()->cascadeOnDelete()->required(); //Curso
            $table->timestamps();

            $table->primary(['user_id', 'curso_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursosusers');
    }
};
