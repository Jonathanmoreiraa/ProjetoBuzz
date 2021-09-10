<?php

use PhpParser\Node\Stmt\Label;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Cadastrar Sobre Empresa</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Listar'), ['controller' => 'EmpresasSobs', 'action'=>'index'],  ['class'=>'btn btn-outline-secondary btn-sm'] )?>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($empresasSob) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-6">
    <label><span class="text-danger">* </span>Título</label>
        <?= $this->Form->control('tittle', ['class'=>'form-control', 'placeholder'=>'Adicione o título', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Situação do Carousel</label>
        <?= $this->Form->control('situations_id', ['class'=>'form-control','options' => $situations, 'label'=>false]); ?>
    </div>
    <div class="form-group col-md-12">
        <label>Descrição</label>
        <?= $this->Form->control('description', ['class'=>'form-control', 'label' => false]);?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Cadastrar'), ['class'=>'btn btn-info']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>

