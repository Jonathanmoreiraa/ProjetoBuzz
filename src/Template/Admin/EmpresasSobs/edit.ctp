<?php
use Cake\Routing\Router;
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EmpresasSob $empresasSob
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Usuários</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Listar'), ['controller' => 'EmpresasSobs', 'action'=>'index'],  ['class'=>'btn btn-outline-secondary btn-sm'] )?>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($empresasSob, ['enctype'=>'multipart/form-data']) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Título</label>
        <?= $this->Form->control('tittle', ['class'=>'form-control', 'placeholder'=>'Adicione o título da imagem', 'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Descrição</label>
        <?= $this->Form->control('description', ['class'=>'form-control', 'placeholder'=>'Descrição da imagem', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Situação do Sobre Empresa</label>
        <?= $this->Form->control('situations_id', ['class'=>'form-control','options' => $situations, 'label'=>false]); ?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>
