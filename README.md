# Sistema de Login e Gerenciamento de Usuários

Projeto desenvolvido em PHP com AJAX, JavaScript e Bootstrap, focado no aprendizado e aplicação de conceitos de desenvolvimento web.

## Índice

- [Sistema de Login e Gerenciamento de Usuários](#sistema-de-login-e-gerenciamento-de-usuários)
  - [Índice](#índice)
  - [Sobre](#sobre)
  - [Tecnologias Utilizadas](#tecnologias-utilizadas)
  - [Instalação](#instalação)
  - [Gif](#gif)
  - [Link para o Projeto](#link-para-o-projeto)

## Sobre

Este projeto é um sistema de login e gerenciamento de usuários, que inclui funcionalidades como cadastro de usuários, login seguro, painel administrativo, gerenciamento de dados com DataTables, uploads de imagens, e controle de permissões de acesso.

## Tecnologias Utilizadas

- PHP
- MySQL
- AJAX
- JavaScript
- Bootstrap

## Instalação

1. Clone o repositório no XAMPP:

   ```bash
   cd c:\xampp\htdocs
   git clone https://github.com/joaocorner/Projeto_Painel_PHP.git
   ```

2. Inicie o Apache e MySQL através do painel de controle do XAMPP.

3. Crie um banco de dados no MySQL:

   ```sql
   CREATE DATABASE projeto;
   ```

4. Crie as tabelas dentro do banco de dados projeto. Os comandos de criação estão localizados em projeto.sql

5. Configure o arquivo de conexão com o banco de dados com suas credenciais:

   ```php
   // por padrão em conexao.php
   $servidor = 'localhost';
   $banco = 'projeto';
   $usuario = 'root';
   $senha = '';
   ```

6. Acesse `http://localhost/Projeto_Painel_PHP` em seu navegador.
7. Realize o login, inicialmente como usuario jcornerusi@gmail.com.br e senha 123

## Gif

Projeto em execução:

[![Navegação pela página](https://s12.gifyu.com/images/SYdme.gif)](https://s12.gifyu.com/images/SYdme.gif)
_Navegação pela página_


## Link para o Projeto

O projeto hospedado em: [https://jcorner.byethost5.com/](https://jcorner.byethost5.com/)

Hospedado por https://byet.host/
