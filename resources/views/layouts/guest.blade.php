<!DOCTYPE html>
{{-- MODIFICAÇÃO 1: Adicionar lógica para inicializar a classe 'dark' no <html> --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        {{-- MODIFICAÇÃO 2: Script para inicializar o modo antes do carregamento do body (melhor UX) --}}
        <script>
            // Script para prevenir flash de tema (FTC)
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
    </head>
    
    {{-- MODIFICAÇÃO 3: Fundo da body e overflow-hidden para o layout --}}
    <body class="font-sans antialiased overflow-hidden bg-gray-100 dark:bg-gray-900">
        
        {{-- MODIFICAÇÃO CRUCIAL A: Container principal usa fundo claro/escuro --}}
        <div class="flex min-h-screen bg-gray-50 dark:bg-gray-900">
            {{-- Usando bg-gray-50 como fundo claro para garantir que cubra tudo --}}

            <div class="flex-1 flex flex-col overflow-hidden">
                
                {{-- MODIFICAÇÃO CRUCIAL B: Header com fundo adaptável --}}
                <header class="h-16 bg-white dark:bg-gray-800 shadow-sm flex items-center justify-between px-6 border-b border-gray-200 dark:border-gray-700">

                    {{-- TÍTULO DO SITE --}}
                    <div class="h-16 flex items-center justify-center">
                        <span class="text-2xl font-bold text-green-600 dark:text-green-500">SOFTLEARN</span>
                    </div>

                    <div class="flex items-center space-x-5">
                        
                        {{-- BOTÃO DE TOGGLE DE MODO ESCURO --}}
                        <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{-- Ícone da Lua (Dark Mode) --}}
                            <svg id="theme-toggle-dark-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                            {{-- Ícone do Sol (Light Mode) --}}
                            <svg id="theme-toggle-light-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </button>
                    </div>
                </header>
                
                {{-- O conteúdo (Login/Registro) está aqui --}}
                <main class="flex items-start justify-center pt-12 pb-10 min-h-screen">
                    {{ $slot }}    
                </main>
            </div>

        </div>
    </body>
</html>