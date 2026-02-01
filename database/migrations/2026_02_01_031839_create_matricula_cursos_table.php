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
        Schema::create('matricula_cursos', function (Blueprint $table) {
            $table->id();

            // id_usuario BIGINT NOT NULL REFERENCES usuario(id)
            // Mudei o nome de id_usuario para user_id para seguir a convenção do Laravel
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // id_curso BIGINT NOT NULL REFERENCES curso(id)
            // Fiz o mesmo aqui, mudando id_curso para curso_id
            $table->foreignId('curso_id')->constrained('cursos')->onDelete('cascade');

            // status TEXT NOT NULL DEFAULT 'ATIVA' com CHECK
            $table->string('status')->default('ATIVA');

            // CONSTRAINT uq_matricula UNIQUE (id_usuario, id_curso)
            $table->unique(['user_id', 'curso_id'], 'uq_matricula_usuario_curso');

            $table->timestamp('iniciado_em')->useCurrent();
            $table->timestamp('concluido_em')->nullable();
        });

        // Adicionando os CHECK constraints específicos do PostgreSQL via SQL puro
        DB::statement("ALTER TABLE matricula_cursos ADD CONSTRAINT ck_status_matricula 
            CHECK (status IN ('ATIVA', 'PAUSADA', 'CONCLUIDA', 'CANCELADA'))");

        DB::statement("ALTER TABLE matricula_cursos ADD CONSTRAINT ck_matricula_datas 
            CHECK (concluido_em IS NULL OR concluido_em >= iniciado_em)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matricula__cursos');
    }
};
