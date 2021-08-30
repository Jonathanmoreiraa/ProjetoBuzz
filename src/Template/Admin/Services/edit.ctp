<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>

<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Serviços</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Visualizar'), ['controller' => 'Services', 'action'=>'view', $service->id],  ['class'=>'btn btn-outline-success btn-sm'] )?>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($service, ['enctype'=>'multipart/form-data']) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Título</label>
        <?= $this->Form->control('tittle_ser', ['class'=>'form-control', 'placeholder'=>'Exempo: Slide 1', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Título Um</label>
        <?= $this->Form->control('tittle_one', ['class'=>'form-control',   'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Ícone Um</label>
        <?= $this->Form->control('icon_one', ['class'=>'form-control',   'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Descrição Um</label>
        <?= $this->Form->control('description_one', ['class'=>'form-control',   'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Título Dois</label>
        <?= $this->Form->control('tittle_two', ['class'=>'form-control',   'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Ícone Dois</label>
        <?= $this->Form->control('icon_two', ['class'=>'form-control',   'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Descrição Dois</label>
        <?= $this->Form->control('description_two', ['class'=>'form-control',   'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Título Três</label>
        <?= $this->Form->control('tittle_three', ['class'=>'form-control',   'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Ícone Três</label>
        <?= $this->Form->control('icon_three', ['class'=>'form-control',   'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Descrição Três</label>
        <?= $this->Form->control('description_three', ['class'=>'form-control',   'label' => false]);?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>