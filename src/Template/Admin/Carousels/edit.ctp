<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carousel $carousel
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Carousel</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Listar'), ['controller' => 'Carousels', 'action'=>'index'],  ['class'=>'btn btn-outline-secondary btn-sm'] )?>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($carousel, ['enctype'=>'multipart/form-data']) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Nome do slide</label>
        <?= $this->Form->control('name_carousel', ['class'=>'form-control', 'placeholder'=>'Exempo: Slide 1', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Título do slide</label>
        <?= $this->Form->control('tittle', ['class'=>'form-control', 'placeholder'=>'Adicione o título da imagem', 'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Descrição</label>
        <?= $this->Form->control('description', ['class'=>'form-control', 'placeholder'=>'Descrição da imagem', 'label' => false]);?>
    </div>
    <div class="form-group col-md-4">
        <label><span class="text-danger">* </span>Título do Botão</label>
        <?= $this->Form->control('tittle_button', ['class'=>'form-control', 'placeholder'=>'Informe o texto do botão', 'label' => false]);?>
    </div>
    <div class="form-group col-md-5">
        <label>Link</label>
        <?= $this->Form->control('link', ['class'=>'form-control', 'placeholder'=>'Informe o link do botão', 'label'=>false]) ?>
    </div>
    <div class="form-group col-md-3">
        <label>Cor do Botão</label>
        <?= $this->Form->control('colors_id', ['class'=>'form-control','options' => $colors,'empty'=>true,'label'=>false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Posição do botão</label>
        <?= $this->Form->control('positions_id', ['class'=>'form-control','options' => $positions, 'label'=>false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Situação do Carousel</label>
        <?= $this->Form->control('situations_id', ['class'=>'form-control','options' => $situations, 'label'=>false]); ?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>
