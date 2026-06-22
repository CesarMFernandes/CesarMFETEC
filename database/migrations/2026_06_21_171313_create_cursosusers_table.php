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
        Schema::create('cursosusers', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->required();
            $table->foreignId('curso_id')->constrained()->cascadeOnDelete()->required();
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
