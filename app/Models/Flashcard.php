<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    use HasFactory;

    // Adicione esta linha abaixo:
    protected $fillable = ['question', 'answer','lesson_id'];

    /**
     * Relacionamento muitos para muitos entre user e flashcard
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('easiness_factor','repetitions')
                    ->withTimestamps();
    }

    /**
     * Relacionamento um para muitos entre flashcard e lessons
     */
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
