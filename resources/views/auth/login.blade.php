<x-guest-layout>
    {{-- CARD PRINCIPAL: Fundo Branco para Escuro, Borda Clara para Escura --}}
    <div class="w-full max-w-md px-2 py-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-xl sm:rounded-xl mt-16 z-[1]">
        
        {{-- 1. BLOCk DA IMAGEM (Coruja) --}}
        <div class="w-full flex justify-center"> 
            <img class="w-56 h-auto max-h-96 object-contain -mt-24 mb-2" src="/img/Coruja Estudiosa com Óculos e Livro 2.svg" alt="Imagem do mascote do site">
        </div>

        {{-- 2. TÍTULO DE BOAS-VINDAS (Mantida a cor de destaque verde) --}}
        <h1 class="text-2xl font-extrabold text-center text-[#16a24b]">{{ __('Bem-Vindo ao SoftLearn') }}</h1>
        
        <div class="flex flex-col items-center">
            
            {{-- Fundo interno do formulário também ajustado --}}
            <div class="w-full max-w-md bg-white dark:bg-gray-800 overflow-hidden p-6">
                
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    {{-- CAMPOS DE EMAIL --}}
                    <div>
                        {{-- LABEL: text-custom-dark (claro) -> dark:text-gray-200 (escuro) --}}
                        <x-input-label class="text-custom-dark font-inter dark:text-gray-200" for="email" :value="__('Email:')" />
                        
                        {{-- INPUT: Borda e Fundo escuros, Texto claro no Dark Mode --}}
                        <x-text-input id="email" 
                                      class="block mt-1 w-full border-custom-input dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 focus:border-[#16a24b] text-custom-dark font-inter" 
                                      type="email" 
                                      name="email" 
                                      :value="old('email')" 
                                      required autofocus 
                                      autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- CAMPOS DE SENHA --}}
                    <div class="mt-4">
                        {{-- LABEL: text-custom-dark (claro) -> dark:text-gray-200 (escuro) --}}
                        <x-input-label class="text-custom-dark font-inter dark:text-gray-200" for="password" :value="__('Senha:')" />
                        
                        {{-- INPUT: Borda e Fundo escuros, Texto claro no Dark Mode --}}
                        <x-text-input id="password" 
                                      class="block mt-1 w-full border-custom-input dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 focus:border-[#16a24b] text-custom-dark font-inter"
                                      type="password"
                                      name="password"
                                      required 
                                      autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- CHECKBOX LEMBRAR-ME --}}
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            {{-- CHECKBOX: Borda e Fundo escuros no Dark Mode --}}
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            {{-- TEXTO: text-custom-texto (claro) -> dark:text-gray-400 (escuro) --}}
                            <span class="ms-2 text-sm text-custom-texto dark:text-gray-400 font-inter">{{ __('Lembre-se de mim') }}</span>
                        </label>
                    </div>
                    
                    {{-- Botão de Login Customizado (Mantida a cor de destaque verde) --}}
                    <div class="flex items-center justify-center mt-6">
                        <button type="submit" class="w-full sm:w-auto bg-[#16a24b] text-white py-2 px-6 rounded-lg text-lg font-semibold hover:bg-gray-800 transition-colors">
                            {{ __('Acessar') }}
                        </button>
                    </div>
                    
                    {{-- Links de Ação (Esqueceu a Senha e Criar Conta) --}}
                    <div class="flex items-center justify-between mt-4 text-sm">
                         @if (Route::has('password.request'))
                             {{-- LINK 1: Texto escuro -> dark:text-gray-400 --}}
                             <a class="text-custom-texto dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 font-inter" href="{{ route('password.request') }}">
                                 {{ __('Esqueceu a senha?') }}
                             </a>
                         @endif
                        
                         {{-- LINK 2: Mantida a cor de destaque azul --}}
                         <a class="text-[#1A01FD] hover:text-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 font-inter" href="{{ route('register') }}">
                             {{ __('Criar conta') }}
                         </a>
                    </div>
                </form>
            </div>
        </div>

    </div>
    
    {{-- Fundo SVG: Mantida a cor de branding --}}
    <div class="fixed bottom-[-70px] w-full z-0"> 
        <svg id="bg-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path id="bg-svg-path" fill="#16a24b" fill-opacity="1" d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,186.7C672,192,768,256,864,266.7C960,277,1056,235,1152,202.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>

</x-guest-layout>