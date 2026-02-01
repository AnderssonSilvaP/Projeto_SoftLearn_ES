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
        Schema::create('progresso_modulos', function (Blueprint $table) {
            $table->id();

            // id_usuario BIGINT NOT NULL REFERENCES usuario(id)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // id_modulo BIGINT NOT NULL REFERENCES modulo(id)
            $table->foreignId('modulo_id')->constrained('modulos')->onDelete('cascade');

            // progresso numeric(5,2) NOT NULL DEFAULT 0
            $table->decimal('progresso', 5, 2)->default(0);

            // status TEXT NOT NULL DEFAULT 'NAO_INICIADO'
            $table->string('status')->default('NAO_INICIADO');

            $table->timestamp('iniciado_em')->nullable();
            $table->timestamp('concluido_em')->nullable();
            
            // atualizado_em TIMESTAMPTZ NOT NULL DEFAULT CURRENT_TIMESTAMP
            $table->timestamp('atualizado_at')->useCurrent()->useCurrentOnUpdate();

            // CONSTRAINT uq_progresso_modulo UNIQUE (id_usuario, id_modulo)
            $table->unique(['user_id', 'modulo_id'], 'uq_progresso_usuario_modulo');

        });
        
        // Adicionando as restrições CHECK específicas do PostgreSQL
        DB::statement("ALTER TABLE progresso_modulos ADD CONSTRAINT ck_progresso_limite 
            CHECK (progresso >= 0 AND progresso <= 100)");

        DB::statement("ALTER TABLE progresso_modulos ADD CONSTRAINT ck_status_progresso 
            CHECK (status IN ('NAO_INICIADO', 'EM_ANDAMENTO', 'CONCLUIDO'))");

        DB::statement("ALTER TABLE progresso_modulos ADD CONSTRAINT ck_prog_modulo_datas 
            CHECK (concluido_em IS NULL OR (iniciado_em IS NOT NULL AND concluido_em >= iniciado_em))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progresso__modulos');
    }
};
