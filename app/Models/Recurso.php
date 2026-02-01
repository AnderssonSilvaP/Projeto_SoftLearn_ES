<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    //
    const TIPO_CONTEUDO = 'CONTEUDO';
    const TIPO_QUESTAO = 'QUESTAO';
    const TIPO_FLASHCARD = 'FLASHCARD';

    protected $fillable = ['aula_id', 'tipo', 'titulo', 'url', 'ativo'];
    
    // Desabilitamos o updated_at já que seu SQL original só previa o criado_em
    public $timestamps = false;
    protected $dates = ['created_at'];

    public function aula()
    {
        return $this->belongsTo(Lesson::class);
    }
}
