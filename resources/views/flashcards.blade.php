<x-app-layout>
    <style>[x-cloak] { display: none !important; }</style>
    
    <div class="py-10 px-10" x-data="sistemaPerguntas()" x-cloak>
        {{-- Corrigido para max-w-7xl ou use full se preferir --}}
        <div class="max-w-8xl mx-auto sm:px-5">
            
            {{-- MOD 1: Cabeçalho com Título e Busca --}}
            <div class="flex justify-between items-start mb-5"> 
                <div>
                    <h1 class="text-3xl font-bold text-[#585555] dark:text-gray-100 mb-2">
                        Questionários
                    </h1>
                    <p class="text-black">Relação de temas organizada por blocos, contendo 10 exercícios práticos para cada assunto listado.</p>
                </div>

                <input type="text" 
                    x-model="busca"  
                    placeholder="Filtrar por assunto ou dificuldade..." 
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 w-1/3 h-10 text-black">
            </div> {{-- AGORA FECHADO CORRETAMENTE --}}
            
            {{-- MOD 2: Grid de Conteúdo (Onde entrará o template) --}}
            <div class="w-full  rounded-[20px] border-[1.5px] border-[#585555]/25 shadow-lg overflow-hidden">
                <div class="grid grid-cols-7 px-4 py-3 font-bold text-[#585555] border-[1.5px] border-b-[#585555]/25">
                    <div class="ml-3 col-span-3">Título</div>
                    <div class="text-center" > Status</div>
                    <div class="text-center" >Dificuldade</div>
                    <div class="text-center" >Resultado</div>
                    <div class="text-center" >Ações</div>
                </div>
                <template x-for="(conteudo,nome) in listaFiltrada" :key="nome">
                    <div class="grid grid-cols-7 px-4 py-4 border-[1.5px] border-b-[#585555]/25">
                        <div class="ml-3 col-span-3 font-semibold text-gray-700 capitalize" x-text="nome" ></div>
                        <div :class="conteudo.status === 'Concluído' ? 'text-[#2F8850] bg-[#DEFBE4]' : 'bg-[#FEEEBE] text-[#A99244]'" class="rounded-lg font-semibold text-gray-700 capitalize text-center" x-text="conteudo.status" ></div>
                        <div class=" font-semibold text-gray-700 capitalize text-center" x-text="conteudo.dificuldade" ></div>

                    </div>

                </template>
            </div>

        </div>
    </div>
</x-app-layout>