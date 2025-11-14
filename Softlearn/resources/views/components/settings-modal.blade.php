<div id="settings-modal" class="fixed inset-0 z-50 hidden items-center justify-center px-4 py-8">
  <!-- backdrop -->
  <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" aria-hidden="true"></div>

  <!-- dialog -->
  <div class="relative w-full max-w-2xl mx-auto bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100 rounded-lg shadow-xl overflow-hidden">
    <header class="flex items-center justify-between px-6 py-4 border-b dark:border-gray-800">
      <h3 class="text-lg font-semibold">Configurações</h3>
      <button id="settings-close" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white" aria-label="Fechar">
        ✕
      </button>
    </header>

    <div class="px-6 py-6 space-y-4">
      <div>
        <label class="block text-sm font-medium mb-1">Tema</label>
        <select id="theme" name="theme" class="w-full rounded-md border-gray-200 bg-white text-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-green-300">
          <option value="system">Padrão do sistema</option>
          <option value="light">Claro</option>
          <option value="dark">Escuro</option>
        </select>
      </div>

      <div>
        <div class="flex items-center justify-between mb-2">
          <label class="text-sm font-medium">Volume</label>
          <span id="volume-value" class="text-sm text-gray-500 dark:text-gray-300">80%</span>
        </div>
        <input id="volume" type="range" min="0" max="100" class="w-full h-2 bg-gray-200 rounded-lg accent-green-600 dark:bg-gray-700">
        <label class="inline-flex items-center mt-2 text-sm">
          <input id="mute" type="checkbox" class="mr-2 rounded border-gray-300 dark:border-gray-600">
          Mudo
        </label>
      </div>

      <div class="space-y-2">
        <label class="inline-flex items-center">
          <input id="sound_effects" type="checkbox" class="mr-2 rounded border-gray-300 dark:border-gray-600" checked>
          Efeitos sonoros
        </label>
        <label class="inline-flex items-center">
          <input id="reduced_motion" type="checkbox" class="mr-2 rounded border-gray-300 dark:border-gray-600">
          Reduzir animações
        </label>
      </div>

      <div class="pt-3 border-t dark:border-gray-800">
        <div class="flex items-center gap-3">
          <button id="settings-save" type="button" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Salvar</button>
          <button id="settings-reset" type="button" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-200">Restaurar padrão</button>
          <span id="save-status" class="text-sm text-gray-500 dark:text-gray-300"></span>
        </div>
      </div>
    </div>
  </div>
</div>