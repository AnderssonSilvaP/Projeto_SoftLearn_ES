<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Meus Módulos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Botão de Criar Novo Módulo (Já estava correto) --}}
                    <a href="{{ route('modules.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mb-4">
                        Criar Novo Módulo
                    </a>

                    @if (session('success'))
                        {{-- MODIFICAÇÃO 1: Mensagem de Sucesso --}}
                        <div class="mb-4 p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-700 dark:text-green-400" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        {{-- MODIFICAÇÃO 2: Cabeçalho e Linhas da Tabela --}}
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            {{-- Cabeçalho (thead) --}}
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descrição
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Ação
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($modules as $module)
                                {{-- Linha de Dados (tr) --}}
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-150">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $module->nome }}
                                    </th>
                                    <td class="px-6 py-4 dark:text-gray-300">
                                        {{ $module->descricao }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('modules.destroy', $module->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este módulo?');">
                                            @csrf
                                            @method('DELETE')
                                            {{-- Botão Deletar (Já estava correto) --}}
                                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                {{-- Linha de Nenhum Módulo (Texto precisa de dark:) --}}
                                <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                                    <td colspan="3" class="px-6 py-4 text-center dark:text-gray-300">
                                        Nenhum módulo encontrado.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>