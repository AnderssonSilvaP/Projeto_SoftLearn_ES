<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    //

    protected $fillable = ['curso_id', 'ordem', 'titulo', 'descricao', 'ativo'];

    // Relacionamento: Um Módulo pertence a um Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('ordem');
    }
}
