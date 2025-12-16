<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mapa de Níveis') }}
        </h2>
    </x-slot>

    {{-- MODIFICAÇÃO 1: Fundo da seção principal --}}
    {{-- A classe dark:bg-gray-900 deve ser aplicada no layout principal (x-app-layout)
         mas adicionamos a classe dark:text-gray-200 para o texto da seção 'empty' --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                {{-- MODIFICAÇÃO 2: Fundo da Mensagem de Sucesso (mantendo o verde de alerta) --}}
                <div class="bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-300 p-4 mb-6" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($levels as $level)
                    @php
                        $isCompleted = in_array($level->id, $completedLevelIds);
                    @endphp

                    {{-- MODIFICAÇÃO 3: CARD DE NÍVEL --}}
                    {{-- bg-white para dark:bg-gray-800 (Fundo) --}}
                    {{-- O 'shadow' pode ser escurecido usando dark:shadow-lg se quiser mais contraste --}}
                    <div class="relative bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border-2 {{ $isCompleted ? 'border-green-500' : 'border-transparent' }} hover:shadow-xl transition-shadow duration-300">
                        
                        <div class="absolute top-0 right-0 mt-4 mr-4">
                            @if($isCompleted)
                                {{-- Badge Concluído: Fundo e Texto ajustados --}}
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-100">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    Concluído
                                </span>
                            @else
                                {{-- Badge Pendente: Fundo e Texto ajustados --}}
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                                    Pendente
                                </span>
                            @endif
                        </div>

                        <div class="p-6">
                            {{-- Título do Nível: text-gray-900 para dark:text-gray-100 --}}
                            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-2">
                                #{{ $level->order }} - {{ $level->title }}
                            </h3>
                            
                            {{-- Descrição do Nível: text-gray-600 para dark:text-gray-400 --}}
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 h-16 overflow-hidden">
                                {{ Str::limit($level->description, 80) }}
                            </p>

                            <div class="mt-4 flex items-center justify-between">
                                @if($isCompleted)
                                    {{-- Botão Desabilitado: Fundo e Texto ajustados --}}
                                    <button disabled class="w-full bg-gray-300 dark:bg-gray-700 text-gray-500 dark:text-gray-400 font-bold py-2 px-4 rounded cursor-not-allowed">
                                        Tarefa Realizada
                                    </button>
                                @else
                                    {{-- Botão Ativo: Mantido o azul de destaque --}}
                                    <a href="{{ route('levels.show', $level) }}" class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">
                                        Iniciar Nível
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- Mensagem de Vazio: Texto ajustado --}}
                    <div class="col-span-3 text-center text-gray-500 dark:text-gray-400 py-10">
                        Nenhum nível cadastrado ainda.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>