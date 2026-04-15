# 🐦 Chirper - Sistema de Microblogging

Este é o projeto **Chirper**, desenvolvido durante o curso de Sistemas de Desenvolvimento. O projeto consiste em uma aplicação web completa (**Full-Stack**) que permite aos usuários postarem mensagens rápidas (**Chirps**), com persistência em banco de dados e um painel administrativo integrado.

## 🚀 Veja o projeto online
[[Chisper](https://chirper-laravel-main-kx9nel.free.laravel.cloud/)]

---

## 🛠️ Tecnologias Utilizadas

- **Framework:** Laravel 11  
- **Linguagem:** PHP 8.4  
- **Banco de Dados:** MySQL 8.4 (Hospedado via Laravel Cloud)  
- **Frontend:** Blade Templates & Tailwind CSS  
- **Autenticação:** Sistema nativo de login e registro do Laravel  

---

## ✨ Funcionalidades

- ✅ **Autenticação:** Registro e login de usuários  
- ✅ **Postagens:** Criação e listagem de mensagens (Chirps)  
- ✅ **Painel Administrativo:** Acesso restrito para o administrador configurado  
- ✅ **Cloud Native:** Deploy automatizado via GitHub e Laravel Cloud  

---

## 🚀 Como rodar o projeto localmente

### 1. Clone o repositório

    git clone https://github.com/RenatoFMS/chirper-laravel.git

### 2. Instale as dependências

    composer install
    npm install && npm run dev

### 3. Configure o ambiente

- Renomeie o arquivo `.env.example` para `.env`
- Configure suas credenciais de banco de dados (MySQL ou SQLite)

### 4. Gere a chave da aplicação e rode as migrations

    php artisan key:generate
    php artisan migrate

### 5. Inicie o servidor

    php artisan serve

---

## 👨‍💻 Desenvolvedor

**Renato Felipe Martins Silva** 🎓  
Estudante de Desenvolvimento de Sistemas - ETEC/P-TECH
