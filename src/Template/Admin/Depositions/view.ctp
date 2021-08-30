<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $deposition
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Depoimentos</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Editar'), ['controller'=>'Depositions','action' => 'edit', $deposition->id], ['class'=>'btn btn-outline-warning btn-sm']) ?>
    </div>
</div><hr>

<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">ID</dt><!--dt é o título-->
    <dd class="col-sm-9"><?= $this->Number->format($deposition->id) ?></dd><!--dd é o conteúdo-->
    
    <dt class="col-sm-3">Título</dt><!--dt é o título-->
    <dd class="col-sm-9"><?= h($deposition->name_dep) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">Descrição do depoimento</dt>
    <dd class="col-sm-9"><?= h($deposition->description_dep) ?></dd> <!--O h() transforma em string-->

    <dt class="col-sm-3">Primeiro vídeo</dt>
    <dd class="col-sm-9"><?= $deposition->video_one ?></dd>

    <dt class="col-sm-3">Segundo vídeo</dt>
    <dd class="col-sm-9"><?= $deposition->video_two ?></dd>
    
    <dt class="col-sm-3 text-truncate">Terceiro vídeo</dt>
    <dd class="col-sm-9"><?= $deposition->video_three ?></dd>
    
    <dt class="col-sm-3 text-truncate">Criado</dt>
    <dd class="col-sm-9"><?= h($deposition->created) ?></dd>
    
    <dt class="col-sm-3 text-truncate">Modificado</dt>
    <dd class="col-sm-9"><?= h($deposition->modified) ?></dd>
</dl>
