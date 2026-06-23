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
        //Cursos
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 20)->required(); //Nome do curso
            $table->enum('cor', ['purple', 'blue', 'green', 'yellow', 'orange', 'red'])->required()->default('blue'); //Cor que representa o curso
            $table->foreignId('user_id')->constrained()->restrictOnDelete()->required(); //Professor que criou o curso
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
