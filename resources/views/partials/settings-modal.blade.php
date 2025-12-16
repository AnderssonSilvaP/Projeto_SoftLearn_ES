<div id="settings-modal" class="settings-modal" style="display:none;">
    {{-- Fundo do Modal --}}
    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-[1000] p-4">
        
        {{-- Painel de Conteúdo --}}
        <div class="settings-panel bg-white dark:bg-gray-800 text-gray-900 dark:text-white 
                    w-full max-w-xl max-h-[90vh] overflow-auto p-6 rounded-xl shadow-2xl transition-colors duration-300">
            
            {{-- Cabeçalho --}}
            <div class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700 pb-3 mb-4">
                <h2 class="text-xl font-bold">Configurações</h2>
                <button id="settings-close" aria-label="Fechar" class="text-gray-500 hover:text-gray-900 dark:hover:text-white transition-colors text-2xl cursor-pointer">
                    &times;
                </button>
            </div>

            <form id="settings-form" class="space-y-4">
                
                {{-- Tema Dropdown --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tema</label>
                    <select id="theme" name="theme" class="w-full rounded-md border-gray-300 dark:border-gray-600 bg-white text-gray-900 text-sm dark:bg-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500 p-2">
                        <option value="system" class="bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">Padrão do sistema</option>
                        <option value="light" class="bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">Claro</option>
                        <option value="dark" class="bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">Escuro</option>
                    </select>
                </div>

                {{-- Volume Slider --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Volume <span id="volume-value" class="text-gray-500 dark:text-gray-400 ml-2"></span></label>
                    <input type="range" id="volume" name="volume" min="0" max="100" class="w-full h-2 bg-gray-200 rounded-lg accent-green-600 dark:bg-gray-700 mt-2">
                    <label class="inline-flex items-center mt-3 text-sm text-gray-700 dark:text-gray-300">
                        {{-- Checkbox Mudo --}}
                        <input type="checkbox" id="mute" name="mute" class="mr-2 rounded border-gray-300 dark:border-gray-600 text-green-600 focus:ring-green-500 dark:bg-gray-800"> 
                        Mudo
                    </label>
                </div>

                {{-- Checkbox Efeitos Sonoros --}}
                <div>
                    <label class="inline-flex items-center text-sm text-gray-700 dark:text-gray-300">
                        <input type="checkbox" id="sound_effects" name="sound_effects" class="mr-2 rounded border-gray-300 dark:border-gray-600 text-green-600 focus:ring-green-500 dark:bg-gray-800"> 
                        Efeitos sonoros
                    </label>
                </div>

                {{-- Checkbox Reduzir Animações --}}
                <div>
                    <label class="inline-flex items-center text-sm text-gray-700 dark:text-gray-300">
                        <input type="checkbox" id="reduced_motion" name="reduced_motion" class="mr-2 rounded border-gray-300 dark:border-gray-600 text-green-600 focus:ring-green-500 dark:bg-gray-800"> 
                        Reduzir animações
                    </label>
                </div>

                {{-- Botões de Ação --}}
                <div class="pt-4 border-t border-gray-200 dark:border-gray-700 flex gap-3 items-center">
                    {{-- Botão Salvar --}}
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors">
                        Salvar
                    </button>
                    {{-- Botão Restaurar Padrão --}}
                    <button type="button" id="settings-reset" class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                        Restaurar padrão
                    </button>
                    <span id="save-status" class="text-sm text-gray-500 dark:text-gray-400 ml-2"></span>
                </div>
            </form>
        </div>
    </div>
</div>