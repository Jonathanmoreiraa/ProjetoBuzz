<?php

use Cake\Controller\Controller;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Usuário</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller'=>'users', 'action'=>'index'], ['class'=>'btn btn-outline-secondary btn-sm'])?>
            <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
            <?= $this->Html->link(__('Editar'), ['controller'=>'users', 'action'=>'editPerfil' /**$user['id']fechar o id em chaves, pq ele é um array*/], ['class'=>' btn btn-outline-warning btn-sm'])?>
        <?= $this->Html->link(__('Editar Senha'), ['controller'=>'users', 'action'=>'editSenhaPerfil' /**$user['id']fechar o id em chaves, pq ele é um array*/], ['class'=>' btn btn-outline-danger btn-sm'])?>

        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-dark dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller'=>'users', 'action'=>'index'], ['class'=>'dropdown-item'])?>
                <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
                <?= $this->Html->link(__('Editar'), ['controller'=>'users', 'action'=>'editPerfil'], ['class'=>'dropdown-item'])?>
                <?= $this->Html->link(__('Editar Senha'), ['controller'=>'users', 'action'=>'editSenhaPerfil'], ['class'=>'dropdown-item'])?>

            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">Foto de perfil</dt><!--dt é o título-->
    <dd class="col-sm-9">
        <div class="img-perfil">
        <?php if(!empty($user->image)) {?>
            <!--Adiciona o ícone do perfil e nome de usuário--><?= $this->Html->image('../files/user/'.$user->id.'/'.$user->image , ['class'=>'rounded-circle', 'width'=>'120', 'height'=>'120']) //usa a imagem armazenada no BD.?>&nbsp;
        <?php }else{ //se o usuário não tiver cadastrado uma imagem?>
            <?= $this->Html->image('../files/user/user_icon.png', ['class'=>'rounded-circle', 'width'=>'120', 'height'=>'120']) //usa a imagem armazenada no BD.?>&nbsp;       
            <div class="edit">
            <?= $this->Html->link('<i class="fas fa-edit"></i>', ['controller'=>'Users', 'action'=>'alterarFotoPerfil'], ['escape'=>false]) ?>
            </div>
        <?php } ?>
        <div class="edit">
            <?= $this->Html->link('<i class="fas fa-edit"></i>', ['controller'=>'Users', 'action'=>'alterarFotoPerfil'], ['escape'=>false]) ?>
        </div>
        </div>
        <!--Caso queira ter o botão<?= $this->Html->link(__('Alterar Foto'), ['action'=>'alterarFotoPerfil'], ['class'=>'btn btn-outline-primary btn-sm'] )?>-->
    </dd>
    <dt class="col-sm-3">ID</dt><!--dt é o título-->
    <dd class="col-sm-9"><?= $user->id ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= $user->name ?></dd>

    <dt class="col-sm-3">Nome de usuário</dt>
    <dd class="col-sm-9"><?= $user->username ?></dd>

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?= $user->email ?></dd>
</dl>
