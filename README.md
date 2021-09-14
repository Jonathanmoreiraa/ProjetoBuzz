# Projeto Buzz

[![GitHub](https://img.shields.io/github/license/Jonathanmoreiraa/ProjetoBuzz)](https://github.com/Jonathanmoreiraa/ProjetoBuzz/blob/main/LICENSE)
 

## 📑 Sobre o projeto

O Buzz foi construído principalmente para meu aprendizado, mas, pode ser implementado de diversas formas.

Entre suas principais funcionalidades, conta-se com:

* Site Administrativo
* Blog
* Controle de artigos
* Controle de depoimentos
* Controle de serviços
* Controle de carousel
* Controle de usuários

Essas são algumas das funções, elas são explicadas da melhor forma no vídeo do projeto.

### 📋 Antes de tudo

Primeira coisa, não se esqueça de baixar um dos programas para o PHP, como o XAMPP (eu pessoalmente utilizo o XAMPP) ou WAMP.

Antes de começar a trabalhar com o Buzz, também é preciso verificar se o composer está baixado e instalado em sua máquina, caso não esteja, vou ensinar a baixar o composer.

Última coisa antes de começar, vou ensinar a forma que funcionou para mim, não posso garantir 100% que funcionará para você também, porém, no youtube existem algumas videoaulas ótimas ensinando a baixar e instalar.

Sendo assim, siga os passos:

1. Baixar o arquivo pelo [SITE OFICIAL](https://getcomposer.org/download/).
2. Se estiver pelo Windows (meu caso) pode baixar o instalador, caso contrário, é possível baixar por linha de comando.

A partir de agora, vou mostrar os passos para instalar no Windows:

1. Feito o download do arquivo, basta executar.
2. Não precisa deixar marcado o Developer mode.
3. Geralmente, o programa já localiza onde está baixado o executável do PHP, basta você confirmar e avançar.
4. Se você possui algum proxy, basta colocar na próxima tela, se não possuir, pode deixar em branco e avançar.
5. Clicar em instalar.
6. Por fim, clicar em finalizar.
7. Depois, para verificar se instalou basta ir no cmd e digitar ``` composer --version ``` ou somente ``` composer ```.

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

## ⚖️ Licença

A licença desse projeto é MIT, para mais detalhes acesse: [LICENSE.md](https://github.com/Jonathanmoreiraa/ProjetoBuzz/blob/main/LICENSE).

## 👤 Contato

* LinkedIn: [Jonathan Moreira](https://linkedin.com/in/jonathanmoreira1)
