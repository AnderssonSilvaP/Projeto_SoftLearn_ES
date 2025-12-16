<!DOCTYPE html>
{{-- MODIFICAÇÃO 1: Adicionar classe 'light' (padrão) e lógica de inicialização JS --}}
<html lang="pt-BR" class="light"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Perfil - {{ config('app.name') }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- MODIFICAÇÃO 2: Script para prevenir o "flash" de tema (FTC) --}}
    <script>
        // Script para prevenir flash de tema (FTC)
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

{{-- MODIFICAÇÃO 3: Ajustar o fundo da tag <body> --}}
<body class="bg-gray-100 dark:bg-gray-900">
    
    {{-- Navegação (Que já modificamos para ter o toggle) --}}
    @include('layouts.navigation')

    <main>
        @yield('content')
    </main>

</body>
</html>