@extends('layouts.profile')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Header --}}
    <div class="mb-8">
        {{-- MOD 1: Header de Título --}}
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Configurações de Perfil</h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Gerencie suas informações pessoais e preferências de conta</p>
    </div>

    {{-- Mensagens de Sucesso --}}
    @if(session('status') === 'profile-updated' || session('status') === 'password-updated')
        {{-- MOD 2: Banners de Sucesso --}}
        <div class="mb-6 bg-green-50 dark:bg-green-900/50 border-l-4 border-green-400 p-4 rounded-r-lg transition-colors">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700 dark:text-green-300 font-medium">
                        {{ session('status') === 'profile-updated' ? 'Perfil atualizado com sucesso!' : 'Senha atualizada com sucesso!' }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Sidebar de Navegação --}}
        <div class="lg:col-span-1">
            {{-- MOD 3: Fundo da Sidebar --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 transition-colors">
                <nav class="space-y-1">
                    {{-- Link Ativo --}}
                    <a href="#informacoes" class="flex items-center px-4 py-3 text-sm font-medium text-gray-900 dark:text-white bg-green-50 dark:bg-green-900/50 rounded-lg border-l-4 border-green-500">
                        <svg class="mr-3 h-5 w-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Informações do Perfil
                    </a>
                    {{-- Link Inativo 1 --}}
                    <a href="#senha" class="flex items-center px-4 py-3 text-sm font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <svg class="mr-3 h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        Segurança
                    </a>
                    {{-- Link Inativo 2 --}}
                    <a href="#excluir" class="flex items-center px-4 py-3 text-sm font-medium text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <svg class="mr-3 h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Excluir Conta
                    </a>
                </nav>
            </div>
        </div>

        {{-- Conteúdo Principal --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Card: Informações do Perfil --}}
            <div id="informacoes" class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden transition-colors">
                
                {{-- MOD 4: Header do Card Informações --}}
                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-green-50 dark:from-green-900/20 to-white dark:to-gray-800">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Informações do Perfil</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Atualize as informações do perfil e o endereço de e-mail da sua conta.</p>
                </div>

                <form action="{{ route('profile.update') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @method('PATCH')

                    {{-- Input Nome --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nome Completo
                        </label>
                        {{-- MOD 5: Input (Ajustes de fundo, borda e foco) --}}
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name', $user->name) }}"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-green-500 dark:focus:ring-green-600 focus:border-transparent transition-all @error('name') border-red-500 ring-2 ring-red-200 dark:ring-red-900/50 @enderror"
                            placeholder="Seu nome completo"
                            required
                        >
                        {{-- Mensagem de Erro --}}
                        @error('name')
                            <div class="mt-2 flex items-center text-sm text-red-600 dark:text-red-400">
                                <svg class="mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Input Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Endereço de E-mail
                        </label>
                        {{-- MOD 6: Input (Ajustes de fundo, borda e foco) --}}
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            value="{{ old('email', $user->email) }}"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-green-500 dark:focus:ring-green-600 focus:border-transparent transition-all @error('email') border-red-500 ring-2 ring-red-200 dark:ring-red-900/50 @enderror"
                            placeholder="seu@email.com"
                            required
                        >
                        @error('email')
                            <div class="mt-2 flex items-center text-sm text-red-600 dark:text-red-400">
                                <svg class="mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- MOD 7: Banner de E-mail Não Verificado --}}
                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div class="mt-3 bg-yellow-50 dark:bg-yellow-900/50 border border-yellow-200 dark:border-yellow-700 rounded-lg p-3 transition-colors">
                                <p class="text-sm text-yellow-800 dark:text-yellow-300">
                                    <svg class="inline mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Seu endereço de e-mail não foi verificado.
                                    <button form="send-verification" class="underline font-medium hover:text-yellow-900 dark:hover:text-yellow-100">
                                        Clique aqui para reenviar o e-mail de verificação.
                                    </button>
                                </p>
                            </div>
                        @endif
                    </div>

                    {{-- Botão Salvar --}}
                    <div class="flex items-center justify-end pt-4 border-t border-gray-200 dark:border-gray-700">
                        <button 
                            type="submit" 
                            class="inline-flex items-center px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800"
                        >
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>

            {{-- Card: Atualizar Senha --}}
            <div id="senha" class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden transition-colors">
                
                {{-- MOD 8: Header do Card Senha --}}
                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-blue-50 dark:from-blue-900/20 to-white dark:to-gray-800">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Atualizar Senha</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Certifique-se de que sua conta está usando uma senha longa e aleatória para se manter segura.</p>
                </div>

                <form action="{{ route('profile.password') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- Input Senha Atual --}}
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Senha Atual
                        </label>
                        {{-- MOD 9: Input (Ajustes de fundo, borda e foco) --}}
                        <input 
                            type="password" 
                            name="current_password" 
                            id="current_password" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-all @error('current_password') border-red-500 ring-2 ring-red-200 dark:ring-red-900/50 @enderror"
                            placeholder="••••••••"
                            required
                        >
                        @error('current_password')
                            <div class="mt-2 flex items-center text-sm text-red-600 dark:text-red-400">
                                <svg class="mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Input Nova Senha --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nova Senha
                        </label>
                        {{-- MOD 10: Input --}}
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-all @error('password') border-red-500 ring-2 ring-red-200 dark:ring-red-900/50 @enderror"
                            placeholder="••••••••"
                            required
                        >
                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Mínimo 8 caracteres, incluindo letras e números</p>
                        @error('password')
                            <div class="mt-2 flex items-center text-sm text-red-600 dark:text-red-400">
                                <svg class="mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Input Confirmar Nova Senha --}}
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Confirmar Nova Senha
                        </label>
                        {{-- MOD 11: Input --}}
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-600 focus:border-transparent transition-all"
                            placeholder="••••••••"
                            required
                        >
                    </div>

                    {{-- Botão Atualizar Senha --}}
                    <div class="flex items-center justify-end pt-4 border-t border-gray-200 dark:border-gray-700">
                        <button 
                            type="submit" 
                            class="inline-flex items-center px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800"
                        >
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            Atualizar Senha
                        </button>
                    </div>
                </form>
            </div>

            {{-- Card: Excluir Conta --}}
            <div id="excluir" class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-red-200 dark:border-red-900/50 overflow-hidden transition-colors">
                
                {{-- MOD 12: Header do Card Excluir Conta --}}
                <div class="px-6 py-5 border-b border-red-200 dark:border-red-900/50 bg-gradient-to-r from-red-50 dark:from-red-900/20 to-white dark:to-gray-800">
                    <h2 class="text-xl font-semibold text-red-600 dark:text-red-400">Zona de Perigo</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Ações irreversíveis relacionadas à sua conta.</p>
                </div>

                <div class="p-6">
                    {{-- MOD 13: Banner de Aviso (Ajuste de cores e texto) --}}
                    <div class="bg-red-50 dark:bg-red-900/50 border border-red-200 dark:border-red-700 rounded-lg p-4 mb-6 transition-colors">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400 dark:text-red-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800 dark:text-red-300">Atenção!</h3>
                                <div class="mt-2 text-sm text-red-700 dark:text-red-200">
                                    <p>Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente deletados. Antes de excluir sua conta, por favor baixe quaisquer dados ou informações que você deseja manter.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Botão Excluir --}}
                    <button 
                        type="button"
                        onclick="document.getElementById('deleteModal').classList.remove('hidden')"
                        class="inline-flex items-center px-6 py-3 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800"
                    >
                        <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Excluir Minha Conta
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal de Confirmação de Exclusão --}}
<div id="deleteModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50 flex items-center justify-center p-4">
    {{-- MOD 14: Conteúdo do Modal --}}
    <div class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-md w-full transform transition-all">
        <div class="p-6">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 dark:bg-red-900/50 rounded-full mb-4">
                <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>

            <h3 class="text-xl font-semibold text-gray-900 dark:text-white text-center mb-2">
                Excluir Conta Permanentemente?
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 text-center mb-6">
                Esta ação não pode ser desfeita. Todos os seus dados serão permanentemente removidos dos nossos servidores.
            </p>

            <form action="{{ route('profile.destroy') }}" method="POST" class="space-y-4">
                @csrf
                @method('DELETE')

                <div>
                    <label for="modal_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Digite sua senha para confirmar
                    </label>
                    {{-- MOD 15: Input de Senha no Modal --}}
                    <input 
                        type="password" 
                        name="password" 
                        id="modal_password" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-lg focus:ring-2 focus:ring-red-500 dark:focus:ring-red-600 focus:border-transparent"
                        placeholder="••••••••"
                        required
                    >
                    @error('password', 'userDeletion')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 pt-4">
                    {{-- MOD 16: Botão Cancelar do Modal --}}
                    <button 
                        type="button"
                        onclick="document.getElementById('deleteModal').classList.add('hidden')"
                        class="flex-1 px-4 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-medium rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 dark:focus:ring-offset-gray-800"
                    >
                        Cancelar
                    </button>
                    {{-- Botão Excluir do Modal --}}
                    <button 
                        type="submit"
                        class="flex-1 px-4 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-offset-gray-800"
                    >
                        Sim, Excluir
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@if($errors->userDeletion->any())
    <script>
        document.getElementById('deleteModal').classList.remove('hidden');
    </script>
@endif

<style>
    /* Mantendo o estilo customizado */
    html {
        scroll-behavior: smooth;
    }
</style>
@endsection