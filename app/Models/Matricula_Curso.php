<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula_Curso extends Model
{
    protected $fillable = ['user_id', 'curso_id', 'status', 'iniciado_em', 'concluido_em'];

    //public function cursos()
    //{
    //    return $this->belongsToMany(Curso::class, 'matriculas_cursos')
    //        ->withPivot('status', 'iniciado_em', 'concluido_em')
    //        ->withTimestamps();
    //}

    public function usuario() 
    { 
        return $this->belongsTo(User::class, 'user_id'); 
    }
    public function curso() 
    { 
        return $this->belongsTo(Curso::class, 'curso_id'); 
    }
}
