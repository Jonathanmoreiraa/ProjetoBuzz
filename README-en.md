# Buzz Project

[![GitHub](https://img.shields.io/github/license/Jonathanmoreiraa/ProjetoBuzz)](https://github.com/Jonathanmoreiraa/ProjetoBuzz/blob/main/LICENSE)
 

## 📑 About the project

Buzz was created primarily for my learning, but it can be implemented in different ways.

Among its main features, it has:

* Administrative website
* Blog
* Articles control
* Depositions control
* Services control
* Carousel control
* Users control

These are some of its functions, they are explained of a better way in the project video.

### 📋 Before start

First thing, do not forget to download one of the programs to PHP, like XAMPP or WAMP.

Before starting to work with the Buzz, also is required to check if the composer is downloaded and installed in your computer, if it is not, i wll teach how to do it.

Last thing before start, i will teach the way that worked to me, i can not guarantee 100% that will also work to you, but, exists some great videos teaching how to do this in youtube.

So, follow the steps:

1. Download the composer for the [OFICIAL WEBSITE](https://getcomposer.org/download/).
2. If your computer is Windows (my case), you can download the installer, otherwise, it's possible download by command line. 

Now, i will show how to install in the Windows:

1. Execute the installer.
2. You do not need to keep developer mode checked
3. Usually, the program already finds where the PHP executable is downloaded, you just need to confirm and go forward.
5. If you have any proxy, just write on the next screen, if you do not have one, just leave blank.
7. Click on install.
8. Por fim, clicar em finalizar.
9. Depois, para verificar se instalou basta ir no cmd e digitar ``` composer --version ``` ou somente ``` composer ```.

### 💻 Instalação

Se o composer estiver instalado e funcionando, basta seguir os seguintes passos para instalar o projeto.

1. Ir no cmd ou git bash
2. ```git init```
3. ```git clone https://github.com/Jonathanmoreiraa/ProjetoBuzz.git```
4. Acessar o CMD da pasta do repositório
5. ```composer update```

A instalação do projeto foi feita, agora, é preciso habilitar as seguintes extensões no php.ini para que o projeto funcione normalmente:

* intl
* gd2
* mbstring

#### Instalação do banco de dados

Primeiramente, acessar o script ```aulanova.sql``` e copiar os dados.

Ir no phpmyadmin e importar os dados, isso pode ser feito tanto pelo próprio arquivo, quanto por script, para isso basta abrir esse arquivo, copiar seu conteúdo e colar na seção SQL (phpmyadmin).

#### Configuração do projeto

Feito isso, é preciso renomear o arquivo ```app.default.php``` para ```app.php```.

Por fim, é só preciso mudar as informações do banco para que acesse os dados, onde:

* Acessar o arquivo ```app.php```
* 'username'=>'nome-banco'
* 'password'=>'senha' ou 'password'=>'' (caso o banco não tenha senha).
* 'database'=>'aulanova'

## 🎨 Layout

Ao clicar na imagem abaixo, você será redirecionado ao vídeo do youtube mostrando todas as funções da aplicação. Ou, se preferir, [CLIQUE AQUI!](https://www.youtube.com/watch?v=H3M8_4rv8IU).

<div align="center">
  <a href="https://www.youtube.com/watch?v=H3M8_4rv8IU"><img src="https://user-images.githubusercontent.com/61876910/133122105-ec6cf218-edf5-4add-a6bb-60a80963d020.PNG" height="40%"></a>
</div>

## 🛠️ Construído com

A ferramentas usadas para construir esse projeto foram:

* PHP 7
* [CAKEPHP 3](https://book.cakephp.org/3/en/index.html) - Framework usado
* HTML5, CSS3 e JavaScript
* [Bootstrap 4](https://getbootstrap.com/docs/4.0/getting-started/introduction/)
* [Font Awesome 5](https://fontawesome.com/v5.15/icons?d=gallery&p=2) - Usado para adicionar os ícones ao site

## 📄 Licença

A licença desse projeto é MIT, para mais detalhes acesse: [LICENSE.md](https://github.com/Jonathanmoreiraa/ProjetoBuzz/blob/main/LICENSE).

## 👤 Contato

* LinkedIn: [Jonathan Moreira](https://linkedin.com/in/jonathanmoreira1)
