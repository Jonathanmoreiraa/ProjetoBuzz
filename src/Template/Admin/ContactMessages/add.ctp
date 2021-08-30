<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactMessage $contactMessage
 */
?>

<?php

use PhpParser\Node\Stmt\Label;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Cadastrar Usuários</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Listar'), ['controller' => 'users', 'action'=>'index'],  ['class'=>'btn btn-outline-secondary btn-sm'] )?>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($contactMessage) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Nome</label>
        <?= $this->Form->control('name', ['class'=>'form-control', 'placeholder'=>'Nome Completo', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>E-mail</label>
        <?= $this->Form->control('email', ['class'=>'form-control', 'placeholder'=>'Endereço de e-mail', 'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Assunto da mensagem</label>
        <?= $this->Form->control('subject', ['class'=>'form-control', 'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Conteúdo da mensagem</label>
        <?= $this->Form->control('message', ['class'=>'form-control', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Usuário que enviou</label>
        <?= $this->Form->control('users_id', ['options' => $users, 'class'=>'form-control', 'label' => false, 'empty'=> true]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Situação da mensagem</label>
        <?= $this->Form->control('cont_message_situation_id', ['options' => $contMessageSituations,'class'=>'form-control', 'label' => false]);?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Cadastrar'), ['class'=>'btn btn-info']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>

