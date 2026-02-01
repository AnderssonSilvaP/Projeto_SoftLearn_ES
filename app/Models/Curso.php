<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
    protected $fillable = [
        'nome_curso',
        'descricao',
        'area',
        'ativo'
    ];

    // Relacionamento: Um Curso tem muitos Módulos
    public function modulos()
    {
        return $this->hasMany(Modulo::class);
    }

    public function alunos()
    {
        // Um curso tem muitos usuários através da tabela de matrículas
        return $this->belongsToMany(User::class, 'matriculas_cursos', 'curso_id', 'user_id')
            ->withPivot('status', 'iniciado_em', 'concluido_em');
    }
}
