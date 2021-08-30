<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MediasSocial $mediasSocial
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Cadastrar Rede Social</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Listar'), ['controller' => 'MediasSocials', 'action'=>'index'],  ['class'=>'btn btn-outline-secondary btn-sm'] )?>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($mediasSocial, ['enctype'=>'multipart/form-data']) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Nome da rede social</label>
        <?= $this->Form->control('tittle', ['class'=>'form-control', 'placeholder'=>'Adicione o título da imagem', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Link</label>
        <?= $this->Form->control('link', ['class'=>'form-control', 'placeholder'=>'Informe o link do botão', 'label'=>false]) ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Ícone da rede</label>
        <?= $this->Form->control('icon', ['class'=>'form-control','label'=>false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Situação da rede social</label>
        <?= $this->Form->control('situations_id', ['class'=>'form-control','placeholder'=>'Exemplo: fab fa-facebook-square','options' => $situations, 'label'=>false]); ?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Cadastrar'), ['class'=>'btn btn-info']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>