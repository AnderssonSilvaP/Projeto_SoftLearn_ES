<x-app-layout>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- MOD 1: Título Principal (Já adaptado) --}}
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                Minhas informações
            </h1>

            {{-- MOD 2: Container Principal (Card) --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Este é o conteúdo da página.
                    {{-- FUTURO: Conteúdo real com informações de contato, etc. será adicionado aqui. --}}
                </div>
            </div>

        </div>
    </div>

</x-app-layout>