# TESTE-BADESPI

# Guia de Execução do Projeto

## Requisitos

- [XAMPP](https://www.apachefriends.org/pt_br/index.html) instalado  
- [VSCode](https://code.visualstudio.com/) instalado  
- PHP (já vem com o XAMPP)


### 1. Iniciar os serviços do XAMPP

- Abra o painel do XAMPP  
- Inicie o **Apache** e o **MySQL**
- Rode o comando php artisan server 

### 2. Configurar o banco de dados

- Acesse o **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
- Criar um banco e passar os dados para o arquivo .envi para estabelecer a conexão
- Rode o comando php artisan migrate --seed para criar as tabelas e popular elas

### 3. Acessar o projeto
- Abra o navegador em http://localhost:8000
- Ai pode se cadastrar ou usar o login de teste:
- Email: teste@gmail.com
- Senha: admin123
