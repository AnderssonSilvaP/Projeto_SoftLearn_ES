<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Aulas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- MOD 1: Fundo do Container Principal --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <h3 class="text-2xl font-bold mb-6">Módulos Disponíveis</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        @foreach ($modulos as $modulo)
                            {{-- MOD 2: Card de Módulo --}}
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden transform transition-all hover:scale-[1.02] duration-300">
                                {{-- Usando bg-white no modo claro para dar mais destaque, mas mantendo o dark:bg-gray-700 --}}
                                
                                <img src="{{ $modulo['imagem_url'] }}" alt="Imagem do {{ $modulo['titulo'] }}" class="w-full h-40 object-cover">
                                
                                <div class="p-4">
                                    <h4 class="text-lg font-semibold mb-2 text-gray-900 dark:text-gray-100">{{ $modulo['titulo'] }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">{{ $modulo['descricao'] }}</p>

                                    <div class="mb-2">
                                        @if ($modulo['aulas_total'] > 0)
                                            @php
                                                $progresso = ($modulo['aulas_concluidas'] / $modulo['aulas_total']) * 100;
                                            @endphp
                                            {{-- MOD 3: Contagem de Aulas e Barra de Progresso --}}
                                            <span class="text-xs font-semibold text-gray-900 dark:text-gray-100">{{ $modulo['aulas_concluidas'] }} / {{ $modulo['aulas_total'] }} aulas</span>
                                            <div class="w-full bg-gray-300 dark:bg-gray-900 rounded-full h-2.5 mt-1">
                                                <div class="bg-green-600 dark:bg-green-500 h-2.5 rounded-full" style="width: {{ $progresso }}%"></div>
                                            </div>
                                        @else
                                            <span class="text-xs font-semibold text-gray-900 dark:text-gray-100">Sem aulas definidas.</span>
                                        @endif
                                    </div>
                                    
                                    {{-- MOD 4: Botão (Ajustado para o Modo Escuro) --}}
                                    <a href="{{ route('aulas.show', ['id' => $modulo['id']]) }}" class="inline-block mt-4 bg-green-600 hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition-colors">
                                        Iniciar Módulo
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>