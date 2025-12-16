<x-guest-layout>
    {{-- Texto de instrução: O dark:text-gray-400 já está aplicado. --}}
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            {{-- MODIFICAÇÃO 1: Label do Input --}}
            {{-- Adicionando a classe para texto claro no Modo Escuro --}}
            <x-input-label for="email" class="dark:text-gray-200" :value="__('Email')" />
            
            {{-- MODIFICAÇÃO 2: Input de Email --}}
            {{-- Adicionando borda, fundo e texto escuros no Dark Mode --}}
            <x-text-input id="email" 
                          class="block mt-1 w-full dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200" 
                          type="email" 
                          name="email" 
                          :value="old('email')" 
                          required 
                          autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            {{-- Botão: Assumindo que x-primary-button já tem suporte ao Dark Mode --}}
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>