<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Administrativo'; //deixando a pág. no administrativo
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <!-- fazendo o estilo da página-->
    <?= $this->Html->css(['bootstrap.min', 'signin']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="text-center">
    <!--página de cima da tela-->
    <?= $this->Flash->render() ?>
    <!--Parte de login-->
    <div class="container clearfix">
        <?= $this->fetch('content') ?> <!--Mostra as opções de usuário-->
    </div>
    <?= $this->Html->script(['jquery-3.3.1.min', 'signin']) ?> <!--Incluindo o js no projeto-->
</body>
</html>

