<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    //Novo codigo
    protected $fillable = ['modulo_id', 'ordem', 'titulo', 'descricao', 'duracao', 'ativo'];
    //Codigo antigo
    //protected $fillable = ['module_id', 'titulo', 'conteudo', 'ordem'];

    // Relacionamento: Uma Lição pertence a um Módulo
    
    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }
    
    //Codigo antigo
    //public function module()
    //{
        
        
        //Codigo anigo
        //return $this->belongsTo(Aula_modulos::class, 'module_id');
    
    //}

    public function completions()
    {
        return $this->hasMany(LessonCompletion::class);
    }

    public function recursos()
    {
        return $this->hasMany(Recurso::class);
    }
    
    //Relacionamento um para muitos com flashcard
    public function flashcards()
    {
        return $this->hasMany(Flashcard::class);
    }
}