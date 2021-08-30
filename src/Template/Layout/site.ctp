<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?= $this->Html->charset() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription = 'Buzz -';?>
        <?= $this->fetch('title') ?>

    </title>
    <?= $this->Html->meta('icon') ?>
    
    <!-- fazendo o estilo da página-->
    <?= $this->Html->css(['bootstrap.min-1', 'persite']) ?>
    <?= $this->Html->css(['fontawesome.min.css']) ?>



    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <!--página de cima da tela-->
    <?= $this->Element('menu_site') ?><!--Carrega o menu do site, presente no arquivo menu_site.ctp-->
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?> <!--Mostra o  conteúdo do site -->
    <?= $this->Element('rodape_site') ?><!--Carrega o menu do site, presente no arquivo rodape_site.ctp-->

    <?= $this->Html->script(['jquery-3.2.1.slim.min', 'popper.min', 'bootstrap.min']) ?> <!--Incluindo o js no projeto-->
</body>
</html>

