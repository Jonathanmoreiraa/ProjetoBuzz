<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AutorsSob $autorsSob
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Sobre Autor</h2>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($autorsSob, ['enctype'=>'multipart/form-data']) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Título</label>
        <?= $this->Form->control('tittle', ['class'=>'form-control','placeholder'=>'Adicione o título do sobre autor', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Situação do Sobre Autor</label>
        <?= $this->Form->control('situations_id', ['class'=>'form-control','options' => $situations, 'label'=>false]); ?>
    </div>
    <div class="form-group col-md-12">
        <span class="text-danger">* </span>Descrição do Sobre Autor</label>
        <?= $this->Form->control('description', ['class'=>'form-control', 'id'=>'editor-sobre','placeholder'=>'Descrição do sobre autor', 'label' => false]);?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>
<?= $this->element('text-editor') ?>