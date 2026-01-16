<x-app-layout>
    <div class="py-12" x-data="flashcardApp()" @keydown.window="handleKeydown($event)">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Meus Flashcards</h1>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-center gap-4 w-full min-h-[400px]">
                        
                        <button @click="next()" class="bg-gray-400 hover:bg-gray-500 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition transform hover:scale-105"> 
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </button>
                        
                        <div class="bg-white dark:bg-gray-700 p-8 rounded-lg shadow-lg w-full max-w-lg text-center relative border dark:border-gray-600">
                            <div class="mb-8 p-6 border-2 border-dashed border-gray-300 dark:border-gray-500 rounded">
                                <p class="text-2xl font-bold text-gray-800 dark:text-gray-100" x-text="card ? card.question : 'Carregando...'"></p>
                            </div>

                            <button x-show="!showAnswer" @click="reveal()" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded transition w-full">
                                Mostrar Resposta <span class="text-xs font-normal opacity-75">(Espaço)</span>
                            </button>

                            <div x-show="showAnswer" x-cloak>
                                <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/30 rounded border border-green-200 dark:border-green-800">
                                    <p class="text-xl font-bold text-green-800 dark:text-green-300" x-text="card ? card.answer : ''"></p>
                                </div>

                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Como foi sua memória?</p>

                                <div class="grid grid-cols-4 gap-2">
                                    <button @click="submitReview('again')" class="bg-red-500 hover:bg-red-600 text-white py-2 rounded text-sm font-semibold">1<br>Again</button>
                                    <button @click="submitReview('hard')" class="bg-orange-500 hover:bg-orange-600 text-white py-2 rounded text-sm font-semibold">2<br>Hard</button>
                                    <button @click="submitReview('good')" class="bg-blue-500 hover:bg-blue-600 text-white py-2 rounded text-sm font-semibold">3<br>Good</button>
                                    <button @click="submitReview('easy')" class="bg-green-500 hover:bg-green-600 text-white py-2 rounded text-sm font-semibold">4<br>Easy</button>
                                </div>
                            </div>
                        </div>

                        <button @click="next()" class="bg-gray-400 hover:bg-gray-500 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition transform hover:scale-105"> 
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Usamos uma função simples que retorna o objeto imediatamente
        function flashcardApp() {
            return {
                showAnswer: false,
                // Injetamos os dados diretamente aqui
                card: { 
                    question: `{!! addslashes($card->question) !!}`, 
                    answer: `{!! addslashes($card->answer) !!}` 
                },

                async next() {
                    this.showAnswer = false;
                    try {
                        const response = await fetch('{{ route('api.next-card') }}');
                        const data = await response.json();
                        if (data) {
                            this.card = data;
                        }
                    } catch (e) {
                        console.error("Erro ao carregar card:", e);
                    }
                },

                reveal() {
                    this.showAnswer = true;
                },

                submitReview(status) {
                    console.log('Status:', status);
                    this.next();
                },

                handleKeydown(event) {
                    if (['INPUT', 'TEXTAREA'].includes(event.target.tagName)) return;
                    if (!this.showAnswer && (event.code === 'Space' || event.key === ' ')) {
                        event.preventDefault();
                        this.reveal();
                    }
                }
            }
        }
    </script>
</x-app-layout>