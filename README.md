# 🚀 Projeto SoftLearn ES

![Badge em Desenvolvimento](http://img.shields.io/static/v1?label=STATUS&message=EM%20DESENVOLVIMENTO&color=GREEN&style=for-the-badge)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)

> **Plataforma interativa e gamificada para o ensino de Engenharia de Software.**

O **SoftLearn ES** transforma o aprendizado de modelagem de sistemas (UML, DFD, DER) em uma experiência envolvente. Através de um laboratório interativo (sandbox) e mecânicas de jogos, os alunos progridem em sua jornada de conhecimento de forma prática.

## 🎯 Funcionalidades Principais

- **🎮 Gamificação Completa**: Sistema de XP, níveis, emblemas (badges) e rankings globais.
- **🛠️ Sandbox de Modelagem**: Ferramenta interativa para criar e validar diagramas UML, DFD e DER em tempo real.
- **📚 Módulos de Conteúdo**: Trilhas de aprendizado progressivas com teoria e prática.
- **📊 Painel do Aluno**: Visualização de progresso pessoal e conquistas.

## 🛠️ Tecnologias Utilizadas

- **Back-end**: PHP 8.x, Laravel 10/11
- **Front-end**: Blade Templates, TailwindCSS, Vite
- **Banco de Dados**: MySQL / PostgreSQL
- **Testes**: PHPUnit / Pest

## 🚀 Como Rodar o Projeto

### Pré-requisitos
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL

### Passo a passo

1. **Clone o repositório**
   ```bash
   git clone https://github.com/AnderssonSilvaP/Projeto_SoftLearn_ES.git
   cd Projeto_SoftLearn_ES
   ```

2. **Instale as dependências**
   ```bash
   composer install
   npm install
   ```

3. **Configure o ambiente**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Configure suas credenciais de banco de dados no arquivo `.env`.*

4. **Prepare o banco de dados**
   ```bash
   php artisan migrate --seed
   ```

5. **Inicie o servidor**
   ```bash
   npm run dev
   php artisan serve
   ```
   Acesse: `http://localhost:8000`

## 🤝 Como Contribuir

Contribuições são sempre bem-vindas! Veja o nosso arquivo [CONTRIBUTING.md](CONTRIBUTING.md) para saber como começar.

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
