# BATEPONTO

Sistema simples para controle da jornada de trabalho, bateponto. O projeto já se encontra em produção no IP (http://104.131.46.150/).
Inicialmente o projeto se encontra hospedado no ambiente da Digital Ocean.

## 🚀 Começando

NÃO é necessário instalar o projeto na sua máquina local para usá-lo, pois ele já se encontra em produção no IP (http://104.131.46.150/). TODAS as senha de todos os usuários mokados estão como "pass123@Word" .

Para acessar o phpmyadmin do servidor de produção basta acessar (http://104.131.46.150:8081/).  
Servidor:      mysql  
Utilizador:    root  
Palavra-passe: pass123@Word  

Lista de alguns usuários mokados:

Tipo:  Administrador  
Email: salgado.martinho@example.net  
Senha: pass123@Word  

Tipo:  Administrador  
Email: emeireles@example.org  
Senha: pass123@Word  

Tipo:  Funcionário  
Email: lira.breno@example.com  
Senha: pass123@Word  

Tipo:  Funcionário  
Email: mascarenhas.teo@example.org  
Senha: pass123@Word  

Tipo:  Funcionário  
Email: soares.milena@example.com  
Senha: pass123@Word  

### 📋 Pré-requisitos

De que coisas você precisa para instalar o software e como instalá-lo?

```
PHP 8
MySQL Latest
NodeJS
Composer
NPM
Xampp
Git
```

### 🔧 Instalação

Essa é a série de passo-a-passo que você deve executar para ter um ambiente de desenvolvimento em execução:

Passos:

```
Instalar todos os pré-requisitos mencionados anteriormente.
```

```
Clonar o projeto para a pasta htdocs dentro da pasta raiz de instalação do XAMPP.
```

```
Executar o comando: composer install
```

```
Executar o comando: npm install
```

```
Criar o banco de dados chamado bateponto com configuração utf8mb4_unicode_ci no phpmyadmin.
```

```
Copiar o arquivo .env.example para .env.
```

```
Configurar a conexão com o banco de dados no arquivo .env.
```

```
Configurar a conexão com o servidor SMTP (para envio de emails de recuperação de senha) no .env.
```

```
Gerar a key do sistema através do comando php artisan key:generate
```

```
Criar as tabelas do banco de dados através do comando php artisan migrate
```

```
Criar os dados fakes do banco de dados através do comando php artisan db:seed
```

Esse ultimo comando cria vários usuários de teste nas tabelas. Todos os acessos estão com a senha padrão pass123@Word .

## 📦 Desenvolvimento

Todo o desenvolvimento foi em cima do framework Laravel. Utilizando migrations, eloquent, seeds, fakers, factories, model, middlewares, controllers e form requests.

## 🛠️ Construído com

* [Laravel](https://laravel.com/) - Framework usado para todo o desenvolvimento.
* [Laravel Breeze](https://github.com/laravel/breeze) - Responsável pela autenticação do projeto.
* [MySQL](https://www.mysql.com/) - Banco de Dados usado no Framework.
* [Git](https://git-scm.com/) - Usada para versionameto do projeto.
* [Docker](https://www.docker.com/) - Docker usado para criar os ambientes para cada serviço: MySQL, NGINX e PHP.
* [Digital Ocean](https://www.digitalocean.com/) - Hospedagem em Nuvem.

## 📌 Versão

Nós usamos [Git](https://git-scm.com/) para controle de versão. 

## ✒️ Autores

* **Hawllysson Gardel Queiroz Almeida** - *Versão Inicial* - [Hawllysson](https://github.com/hawllysson-gardel)

## 🎁 Expressões de gratidão

* Conte a outras pessoas sobre este projeto 📢
* Convide alguém da equipe para uma cerveja 🍺 
* Obrigado publicamente 🤓.

---
⌨️ com ❤️ por [Hawllysson](https://github.com/hawllysson-gardel) 😊