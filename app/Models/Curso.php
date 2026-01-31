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
}
