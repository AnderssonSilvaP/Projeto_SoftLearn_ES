<x-guest-layout>
    {{-- Texto de instrução: O dark:text-gray-400 já estava aplicado. --}}
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        {{-- Mensagem de Sucesso: As cores já estavam ajustadas para Dark Mode --}}
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        
        {{-- Formulário de Reenvio do Link (Botão) --}}
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                {{-- Botão: Assumindo que x-primary-button já tem suporte ao Dark Mode --}}
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        {{-- Botão de Log Out (Link de Ação) --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            
            {{-- MODIFICAÇÃO 1: Ajuste no hover e no focus ring offset --}}
            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>