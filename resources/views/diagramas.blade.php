<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                Montagem de Diagramas
            </h1>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-semibold mb-3">Problema do Diagrama: Cadastro de Alunos</h2>
                    <p>Crie um Diagrama de Classes que represente um sistema de gestão de cursos. O sistema deve incluir as entidades **Aluno**, **Curso**, e a relação de associação **Matrícula** entre eles. Cada curso pode ter vários alunos, e cada aluno pode estar matriculado em vários cursos (relação N:M).</p>
                </div>
            </div>

            <div class="flex space-x-4 h-[700px]"> {{-- Altura definida para a área de jogo --}}
                
                {{-- 2. PALETA DE PEÇAS --}}
                <div class="w-1/5 bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg p-4">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2 dark:border-gray-700">
                        Peças Disponíveis
                    </h3>
                    
                    <div id="palette-source" class="space-y-4">
                        {{-- Itens que serão arrastados pela biblioteca SortableJS --}}
                        <div class="diagram-node p-3 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-lg shadow cursor-grab">
                            Classe: Aluno
                        </div>
                        <div class="diagram-node p-3 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-lg shadow cursor-grab">
                            Classe: Curso
                        </div>
                        <div class="diagram-node p-3 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-lg shadow cursor-grab">
                            Associação N:M (Matrícula)
                        </div>
                        <div class="diagram-node p-3 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-lg shadow cursor-grab">
                            Atributo: Nome
                        </div>
                        <div class="diagram-node p-3 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-lg shadow cursor-grab">
                            Peça Errada
                        </div>
                    </div>
                </div>

                {{-- 3. ÁREA DE MONTAGEM (Canvas do Jogo) --}}
                <div class="w-4/5 bg-white dark:bg-gray-700 shadow-lg sm:rounded-lg p-6 relative overflow-hidden border-2 border-dashed border-gray-300 dark:border-gray-600">
                    <h3 class="text-xl font-semibold mb-4 text-center text-gray-400 dark:text-gray-500">
                        Arraste as peças aqui
                    </h3>
                    
                    {{-- Onde o JSPlumb e Sortable farão a mágica --}}
                    <div id="diagram-canvas" class="w-full h-full absolute top-0 left-0">
                        {{-- Peças montadas e linhas de conexão aparecerão aqui --}}
                    </div>
                </div>
            </div>

            <button id="check-solution" class="mt-6 px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition duration-150">
                Verificar Solução
            </button>

        </div>
    </div>
</x-app-layout>