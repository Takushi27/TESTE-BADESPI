# WorkBridge
<img width="1902" height="943" alt="{CE7E4BAE-CC76-4192-8D4A-4104CE39D513}" src="https://github.com/user-attachments/assets/a9770a9a-ed35-4efb-95c0-c3e37c0984ba" />


# WorkBridge (Ponte de Trabalho)

O WorkBridge é uma aplicação web full-stack desenvolvida em PHP com o framework Laravel. O projeto funciona como uma plataforma de classificados de empregos (Job Board), conectando empresas que procuram talentos e profissionais em busca de oportunidades.

## 🛠️ Descrição Técnica

A arquitetura do projeto segue o padrão **MVC (Model-View-Controller)**, utilizando a stack de tecnologias:

* **Backend:** **Laravel** (PHP 8+)
* **Frontend:** **Blade** (motor de template do Laravel), CSS e JavaScript
* **Banco de Dados:** **MySQL** (ou MariaDB, via XAMPP)
* **Servidor de Desenvolvimento:** Apache (via XAMPP)

### Funcionalidades Principais

* **Sistema de Roteamento:** Gerenciamento de rotas web para navegação e endpoints de API.
* **ORM Eloquent:** Mapeamento objeto-relacional para interações seguras e eficientes com o banco de dados.
* **Motor de Template Blade:** Renderização de views dinâmicas no lado do servidor, permitindo a construção de interfaces componentizadas.
* **Operações CRUD:** Funcionalidade completa para Criar, Ler, Atualizar e Excluir vagas de emprego.
* **Autenticação de Usuários:** O sistema (provavelmente) diferencia dois tipos de perfis:
    * **Recrutadores:** Podem se cadastrar, fazer login, publicar novas vagas e gerenciar suas postagens.
    * **Candidatos:** Podem pesquisar, filtrar e visualizar as vagas disponíveis.

### Ambiente de Execução

O projeto é configurado para ser executado em um ambiente de desenvolvimento local, como o **XAMPP**, que fornece o servidor web Apache, o interpretador PHP e o banco de dados MySQL necessários.



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
