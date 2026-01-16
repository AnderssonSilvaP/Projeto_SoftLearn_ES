<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    use HasFactory;

    // Adicione esta linha abaixo:
    protected $fillable = ['question', 'answer'];
}
