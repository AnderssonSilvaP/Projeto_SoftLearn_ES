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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();

            // Relacionamento com a tabela modulos
            // id_modulo BIGINT NOT NULL REFERENCES modulo(id) ON DELETE CASCADE
            // Novamente, mudei o nome de id_modulo para modulo_id para seguir a convenção do Laravel
            $table->foreignId('modulo_id')->constrained('modulos')->onDelete('cascade');

            // ordem INT NOT NULL CHECK (ordem > 0)
            $table->integer('ordem');

            $table->text('titulo');
            $table->text('descricao')->nullable();

            //Podemos mudar a duração para segundos tbm depois
            //Parece que o laravel permite, só não se o postgres tem isso tbm.
            // duracao INT NOT NULL DEFAULT 0 CHECK (duracao >= 0)
            $table->integer('duracao')->default(0);

            $table->boolean('ativo')->default(true);
            $table->timestamps(); // Cria created_at e updated_at (TIMESTAMPTZ no Postgres)

            // Restrições de unicidade composta
            $table->unique(['modulo_id', 'ordem']);
            $table->unique(['modulo_id', 'titulo']);

            //Código antigo das aulas
            // Relaciona cada lição ao seu módulo de aula
            //$table->foreignId('module_id')->constrained('aula_modulos')->onDelete('cascade');
            //$table->string('titulo');
            //$table->longText('conteudo'); // Conteúdo principal (HTML, texto, link de vídeo)
            //$table->integer('ordem')->default(0); // Para ordenar as aulas no Syllabus
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};