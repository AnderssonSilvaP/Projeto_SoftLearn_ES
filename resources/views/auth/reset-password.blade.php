<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            {{-- MODIFICAÇÃO 1: Label do Input de Email --}}
            <x-input-label for="email" class="dark:text-gray-200" :value="__('Email')" />
            
            {{-- MODIFICAÇÃO 2: Input de Email --}}
            <x-text-input id="email" 
                          class="block mt-1 w-full dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200" 
                          type="email" 
                          name="email" 
                          :value="old('email', $request->email)" 
                          required 
                          autofocus 
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            {{-- MODIFICAÇÃO 3: Label do Input de Senha --}}
            <x-input-label for="password" class="dark:text-gray-200" :value="__('Password')" />
            
            {{-- MODIFICAÇÃO 4: Input de Senha --}}
            <x-text-input id="password" 
                          class="block mt-1 w-full dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200" 
                          type="password" 
                          name="password" 
                          required 
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            {{-- MODIFICAÇÃO 5: Label do Input de Confirmação de Senha --}}
            <x-input-label for="password_confirmation" class="dark:text-gray-200" :value="__('Confirm Password')" />

            {{-- MODIFICAÇÃO 6: Input de Confirmação de Senha --}}
            <x-text-input id="password_confirmation" 
                          class="block mt-1 w-full dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200"
                          type="password"
                          name="password_confirmation" 
                          required 
                          autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>