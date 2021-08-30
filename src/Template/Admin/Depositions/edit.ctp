<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Depoimentos</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Visualizar'), ['controller' => 'Depositions', 'action'=>'view', $deposition->id],  ['class'=>'btn btn-outline-success btn-sm'] )?>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($deposition, ['enctype'=>'multipart/form-data']) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Título</label>
        <?= $this->Form->control('name_dep', ['class'=>'form-control', 'placeholder'=>'Exempo: Slide 1', 'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Descrição Um</label>
        <?= $this->Form->control('description_dep', ['class'=>'form-control',   'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Primeiro vídeo</label>
        <?= $this->Form->control('video_one', ['class'=>'form-control',   'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Segundo vídeo</label>
        <?= $this->Form->control('video_two', ['class'=>'form-control',   'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Terceiro vídeo</label>
        <?= $this->Form->control('video_three', ['class'=>'form-control',   'label' => false]);?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>
