document.addEventListener('alpine:init', () => {
    Alpine.data('sistemaPerguntas', () => ({
        busca: '',
        
        // O seu "Banco de Dados" local (depois podemos puxar do MySQL via API)
        bancoDados: {
            'Programação Orientada a Objetos': { 
                status: 'Concluído', 
                dificuldade: 'Média', 
                questoes: [1,2,3,4,5,6,7,8] // Exemplo: 8 de 10 feitas
            },
            'Estruturas de Dados': { 
                status: 'Pendente', 
                dificuldade: 'Difícil', 
                questoes: [1,2] 
            },
            'Arquitetura de Computadores': { 
                status: 'Pendente', 
                dificuldade: 'Fácil', 
                questoes: [] 
            },
            'Redes de Computadores': { 
                status: 'Concluído', 
                dificuldade: 'Média', 
                questoes: [1,2,3,4,5,6,7,8,9,10] 
            },
            'Sistemas Operacionais': { 
                status: 'Pendente', 
                dificuldade: 'Difícil', 
                questoes: [1,2,3,4] 
            },
            'Arquitetura Web': { 
                status: 'Concluído', 
                dificuldade: 'Difícil', 
                questoes: [1,2,3,4] 
            },
            'Engenharia de Software': { 
                status: 'Concluído', 
                dificuldade: 'Difícil', 
                questoes: [1,2,3,4] 
            },
            'Programação Orientada a Objetos 2': { 
                status: 'Concluído', 
                dificuldade: 'Difícil', 
                questoes: [1,2,3,4] 
            },
            'Lógica de Predicados': { 
                status: 'Pendente', 
                dificuldade: 'Difícil', 
                questoes: [1,2,3,4] 
            },
            'Análise de Algoritmos': { 
                status: 'Concluído', 
                dificuldade: 'Difícil', 
                questoes: [1,2,3,4] 
            }
        },

        // Lógica de Filtragem (Computada)
        get listaFiltrada() {
            // Se a busca estiver vazia, retorna tudo
            if (this.busca.trim() === '') {
                return this.bancoDados;
            }

            const resultado = {};
            const termo = this.busca.toLowerCase();

            // Itera sobre as chaves do objeto (os títulos)
            Object.keys(this.bancoDados).forEach(titulo => {
                const info = this.bancoDados[titulo];
                
                // Filtra pelo título OU pela dificuldade
                if (titulo.toLowerCase().includes(termo) || info.dificuldade.toLowerCase().includes(termo)) {
                    resultado[titulo] = info;
                }
            });

            return resultado;
        },

        // Função para o botão "Iniciar"
        iniciarQuestionario(nome) {
            alert('Iniciando questionário de: ' + nome);
            // Aqui você poderá redirecionar: window.location.href = '/quiz/' + nome;
        }
    }));
});