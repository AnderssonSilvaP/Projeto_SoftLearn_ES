<?php

namespace App\Http\Controllers;

use App\Models\Flashcard;
use Illuminate\Http\Request;

class FlashcardController extends Controller
{
    public function index()
    {
        // Pega um card aleatório para o piloto
        $card = Flashcard::inRandomOrder()->first();

        // Se não houver cards, criamos um de exemplo para não quebrar o teste
        if (!$card) {
            $card = (object) [
                'question' => 'Nenhum card encontrado. Crie um no banco!',
                'answer' => 'Dica: use o php artisan tinker'
            ];
        }

        return view('flashcards', compact('card'));
    }

    public function nextCard()
    {
        // 1. Busca um card aleatório
        $card = Flashcard::inRandomOrder()->first();

        // 2. RETORNA APENAS DADOS (JSON)
        return response()->json($card);
    }
}
