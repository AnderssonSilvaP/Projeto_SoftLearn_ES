<x-app-layout>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                Configurações
            </h1>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <div class="space-y-6">
                        <div>
                            <label for="theme" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tema</label>
                            <select id="theme" name="theme" class="w-full rounded-md border-gray-300 bg-white text-gray-900 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                <option value="system" class="bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">Padrão do sistema</option>
                                <option value="light" class="bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">Claro</option>
                                <option value="dark" class="bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">Escuro</option>
                            </select>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Volume</label>
                                <span id="volume-value" class="text-sm text-gray-500 dark:text-gray-400">80%</span>
                            </div>
                            <input id="volume" type="range" min="0" max="100" value="80" class="w-full h-2 bg-gray-200 rounded-lg accent-green-600 dark:bg-gray-700">
                            <label class="inline-flex items-center mt-3 text-sm text-gray-700 dark:text-gray-300">
                                <input id="mute" type="checkbox" class="mr-2 rounded border-gray-300 dark:border-gray-600 text-green-600 focus:ring-green-500">
                                Mudo
                            </label>
                        </div>

                        <div class="space-y-3">
                            <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                                <input id="sound_effects" type="checkbox" checked class="mr-2 rounded border-gray-300 dark:border-gray-600 text-green-600 focus:ring-green-500">
                                <span class="text-sm">Efeitos sonoros</span>
                            </label>
                            <br>
                            <label class="inline-flex items-center text-gray-700 dark:text-gray-300">
                                <input id="reduced_motion" type="checkbox" class="mr-2 rounded border-gray-300 dark:border-gray-600 text-green-600 focus:ring-green-500">
                                <span class="text-sm">Reduzir animações</span>
                            </label>
                        </div>

                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <button id="settings-save" type="button" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors">
                                    Salvar
                                </button>
                                <button id="settings-reset" type="button" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                                    Restaurar padrão
                                </button>
                                <span id="save-status" class="text-sm text-gray-500 dark:text-gray-400"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>