<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();

            // id_aula BIGINT NOT NULL REFERENCES aula(id) ON DELETE CASCADE
            $table->foreignId('lesson_id')->constrained('lessons')->onDelete('cascade');

            // tipo TEXT NOT NULL com CHECK (CONTEUDO, QUESTAO, FLASHCARD)
            $table->string('tipo');

            $table->text('titulo');
            $table->text('url')->nullable();
            $table->boolean('ativo')->default(true);
            
            // criado_em TIMESTAMPTZ
            $table->timestamp('created_at')->useCurrent();
        });

        // Adicionando a restrição CHECK para o campo 'tipo' no PostgreSQL
        DB::statement("ALTER TABLE recursos ADD CONSTRAINT ck_tipo_recurso 
            CHECK (tipo IN ('CONTEUDO', 'QUESTAO', 'FLASHCARD'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursos');
    }
};
