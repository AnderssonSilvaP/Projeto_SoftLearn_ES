<x-guest-layout>
    {{-- MODIFICAÇÃO 1: Texto de instrução --}}
    {{-- O dark:text-gray-400 já estava presente, o que é ótimo! --}}
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div>
            {{-- MODIFICAÇÃO 2: Label do Input --}}
            {{-- Adicionando a classe para texto claro no Modo Escuro --}}
            <x-input-label for="password" class="dark:text-gray-200" :value="__('Password')" />

            {{-- MODIFICAÇÃO 3: Input de Senha --}}
            {{-- Adicionando borda, fundo e texto escuros no Dark Mode --}}
            <x-text-input id="password" 
                            class="block mt-1 w-full dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            {{-- Botão de Confirmação: Assumindo que x-primary-button já tem suporte --}}
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>