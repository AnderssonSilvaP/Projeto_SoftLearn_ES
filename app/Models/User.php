<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
        'xp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'level' => 'integer',
            'xp' => 'integer',
        ];
    }

    public function modules() {
        return $this->hasMany(Module::class);
    }

    /**
     * Relacionamento para acessar os níveis que o usuário completou.
     * Usa a tabela pivot 'level_user'.
     */
    public function completedLevels()
    {
        return $this->belongsToMany(Level::class, 'level_user')
                    ->withPivot('completed_at', 'score')
                    ->withTimestamps();
    }

    // Um usuário pode estar matriculado em muitos cursos
    public function matriculas()
    {
        return $this->belongsToMany(Curso::class, 'matriculas_cursos', 'user_id', 'curso_id')
            ->withPivot('status', 'iniciado_em', 'concluido_em');
    }

    public function progressoModulos() 
    {
        return $this->belongsToMany(Modulo::class, 'progresso_modulos')
            ->using(Progresso_Modulo::class)
            ->withPivot('progresso', 'status', 'iniciado_em', 'concluido_em')
            ->withTimestamps();
    }

    public function aulas()
    {
        return $this->belongsToMany(Lesson::class, 'progresso_aulas')
            ->using(Progresso_Aula::class)
            ->withPivot('progresso', 'status', 'assistido')
            ->withTimestamps();
    }
    
    /**
     * Relacionamento muitos para muitos entre user e flashcard
     */
    public function flashcards()
    {
        return $this->belongsToMany(Flashcard::class)
                    ->withPivot('easiness_factor','repetitions')
                    ->withTimestamps();
    }
}