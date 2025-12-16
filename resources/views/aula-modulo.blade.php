<x-app-layout>
    @php
        $user = Auth::user();
        $lessonIds = $modulo->lessons->pluck('id')->toArray();
        $completedCount = count(array_intersect($lessonIds, $concluidas));
        $totalLessons = max(1, $modulo->lessons->count());
        $progressPercent = round(($completedCount / $totalLessons) * 100);
    @endphp

    <x-slot name="header">
        {{-- MOD 1: Título do Header (Já ajustado no x-app-layout, mas reforçamos) --}}
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $modulo->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- MOD 2: Breadcrumb --}}
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                <a href="{{ route('aulas') }}" class="hover:underline text-gray-700 dark:text-gray-300">Aulas</a>
                <span class="mx-2">></span>
                <span>{{ $modulo->titulo }}</span>
            </div>

            @if (session('status'))
                {{-- MOD 3: Mensagem de Status/Sucesso --}}
                <div class="mb-4 p-3 rounded bg-green-100 dark:bg-green-900/50 text-green-800 dark:text-green-300 transition-colors">
                    {{ session('status') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

                {{-- COLUNA 1: SYLLABUS --}}
                <div class="lg:col-span-1 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 h-fit transition-colors">
                    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Syllabus</h3>
                    <ul>
                        @foreach ($syllabus as $item)
                            <li>
                                <a href="{{ route('aulas.show', ['id' => $item->id]) }}"
                                   {{-- MOD 4: Estilização do Item Ativo/Inativo do Syllabus --}}
                                   class="block mb-2 p-2 rounded 
                                          {{ $item->id === $modulo->id 
                                            ? 'bg-gray-200 dark:bg-gray-700 font-bold text-gray-900 dark:text-white' 
                                            : 'hover:bg-gray-100 dark:hover:bg-gray-700/50 text-gray-700 dark:text-gray-300' }} 
                                          transition-colors">
                                    {{ $item->titulo }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- COLUNA 2: CONTEÚDO --}}
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 transition-colors">
                    <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Conteúdo do módulo</h2>
                    <p class="text-gray-700 dark:text-gray-300 mb-6">{{ $modulo->descricao }}</p>

                    <div class="space-y-6">
                        @forelse ($modulo->lessons as $lesson)
                            {{-- MOD 5: Card de Cada Aula --}}
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 transition-colors">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Aula {{ $lesson->ordem }}</p>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $lesson->titulo }}</h3>
                                    </div>
                                    <form method="POST" action="{{ route('gamification.lessons.complete', $lesson->id) }}">
                                        @csrf
                                        {{-- MOD 6: Botão Concluir/Concluída --}}
                                        <button type="submit" 
                                                class="px-3 py-2 text-sm font-semibold rounded transition-colors 
                                                       {{ in_array($lesson->id, $concluidas) 
                                                          ? 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-400 cursor-not-allowed' 
                                                          : 'bg-green-600 text-white hover:bg-green-700' }}" 
                                                {{ in_array($lesson->id, $concluidas) ? 'disabled' : '' }}>
                                            {{ in_array($lesson->id, $concluidas) ? 'Concluída' : '+XP Concluir aula' }}
                                        </button>
                                    </form>
                                </div>
                                {{-- MOD 7: Conteúdo da Aula --}}
                                <div class="mt-3 text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                                    {!! nl2br(e(Str::limit($lesson->conteudo, 400))) !!}
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-600 dark:text-gray-400">Nenhuma aula cadastrada para este módulo ainda.</p>
                        @endforelse
                    </div>
                </div>

                {{-- COLUNA 3: PROGRESSO/XP --}}
                <div class="lg:col-span-1 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 h-fit transition-colors">
                    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Progresso & XP</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Nível {{ $user->level }} · {{ number_format($user->xp) }} XP</p>
                    {{-- MOD 8: Barra de Progresso --}}
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mb-4">
                        <div class="bg-green-600 h-2 rounded-full" style="width: {{ $progressPercent }}%"></div>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-gray-300">{{ $completedCount }} / {{ $totalLessons }} aulas concluídas</p>

                    <div class="mt-6">
                        <h4 class="font-semibold mb-2 text-gray-900 dark:text-white">Registrar atividade prática</h4>
                        <form method="POST" action="{{ route('gamification.activities.complete') }}" class="space-y-2">
                            @csrf
                            <input type="hidden" name="activity_key" value="modulo-{{ $modulo->id }}-atividade">
                            <input type="hidden" name="description" value="Atividade prática do módulo {{ $modulo->titulo }}">
                            {{-- MOD 9: Botão Registrar Atividade --}}
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-3 rounded dark:bg-blue-700 dark:hover:bg-blue-600 transition-colors">+XP Registrar atividade</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>