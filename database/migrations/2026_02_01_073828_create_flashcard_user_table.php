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
    Schema::create('flashcard_user', function (Blueprint $table) {
        
        //Definição das fk para referenciar user e flashcard
        //Depois vão formar a pk composta
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('flashcard_id')->constrained()->onDelete('cascade');
        
        //Definição das colunas que serão fillable nessa tabela
        //unsigned para evitar entradas invalidas, como numero negativo
        $table->integer('easiness_factor')->default(1)->unsigned(); 
        $table->integer('repetitions')->default(0);
        
        //Definição da chave composta
        $table->primary(['user_id', 'flashcard_id']);
        
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flashcard_user');
    }
};
