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
        Schema::create('progresso_aulas', function (Blueprint $table) {
            $table->id();

            // id_usuario BIGINT NOT NULL REFERENCES usuario(id)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // id_aula BIGINT NOT NULL REFERENCES aula(id)
            $table->foreignId('lessons_id')->constrained('lessons')->onDelete('cascade');

            // progresso numeric(5,2) NOT NULL DEFAULT 0
            // Mais pra frente, poderemos calcular o progresso com base no tempo assistido da aula
            // $progresso = ($aula_progresso->assistido / $aula->duracao) * 100;
            $table->decimal('progresso', 5, 2)->default(0);

            // status TEXT NOT NULL DEFAULT 'NAO_INICIADO'
            $table->string('status')->default('NAO_INICIADO');

            // assistido INT NOT NULL DEFAULT 0 (tempo em segundos)
            $table->integer('assistido')->default(0);

            $table->timestamp('iniciado_em')->nullable();
            $table->timestamp('concluido_em')->nullable();
            
            // atualizado_em TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            // CONSTRAINT uq_progresso_aula UNIQUE (id_usuario, id_aula)
            $table->unique(['user_id', 'lessons_id'], 'uq_progresso_usuario_aula');
            
        });

        // Aplicando as restrições CHECK do PostgreSQL
        DB::statement("ALTER TABLE progresso_aulas ADD CONSTRAINT ck_progresso_aula_limite 
            CHECK (progresso >= 0 AND progresso <= 100)");

        DB::statement("ALTER TABLE progresso_aulas ADD CONSTRAINT ck_status_aula 
            CHECK (status IN ('NAO_INICIADO', 'EM_ANDAMENTO', 'CONCLUIDO'))");

        DB::statement("ALTER TABLE progresso_aulas ADD CONSTRAINT ck_assistido_positivo 
            CHECK (assistido >= 0)");

        DB::statement("ALTER TABLE progresso_aulas ADD CONSTRAINT ck_prog_aula_datas 
            CHECK (concluido_em IS NULL OR (iniciado_em IS NOT NULL AND concluido_em >= iniciado_em))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progresso__aulas');
    }
};
