# WorkBridge
<img width="1902" height="943" alt="{CE7E4BAE-CC76-4192-8D4A-4104CE39D513}" src="https://github.com/user-attachments/assets/a9770a9a-ed35-4efb-95c0-c3e37c0984ba" />
Guia de Execução do Projeto

## Requisitos

- [XAMPP](https://www.apachefriends.org/pt_br/index.html) instalado  
- [VSCode](https://code.visualstudio.com/) instalado  
- PHP (já vem com o XAMPP)


### 1. Iniciar os serviços do XAMPP

- Abra o painel do XAMPP  
- Startar o **Apache** e o **MySQL**
- Rode o comando php artisan server 

### 2. Configurar o banco de dados

- Conecte ao seu banco mysql com o nome do banco, root e a senha, caso tenha
- Rode o comando /php artisan migrate --seed para criar as tabelas e popular elas com o factory e seeders

### 3. Acessar o projeto
- Abra o navegador em http://localhost:8000
- Ai pode se cadastrar ou usar o login de teste:
- Email: teste@gmail.com
- Senha: admin123
