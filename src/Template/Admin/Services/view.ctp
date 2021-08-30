<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Serviços</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Editar'), ['controller'=>'Services','action' => 'edit', $service->id], ['class'=>'btn btn-outline-warning btn-sm']) ?>
    </div>
</div><hr>

<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">ID</dt><!--dt é o título-->
    <dd class="col-sm-9"><?= $this->Number->format($service->id) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">Titulo</dt>
    <dd class="col-sm-9"><?= h($service->tittle_ser) ?></dd>

    <dt class="col-sm-3">Título Um</dt>
    <dd class="col-sm-9"><?= h($service->tittle_one) ?></dd>

    <dt class="col-sm-3">Ícone um</dt>
    <dd class="col-sm-9"><i class="<?= $service->icon_one?>"></i> - <?= h($service->icon_one) ?></dd>

    <dt class="col-sm-3">Descrição um</dt>
    <dd class="col-sm-9"><?= h($service->description_one) ?></dd>

    <dt class="col-sm-3">Título dois</dt>
    <dd class="col-sm-9"><?= h($service->tittle_two) ?></dd>

    <dt class="col-sm-3 text-truncate">Ícone dois</dt>
    <dd class="col-sm-9"><i class="<?= $service->icon_two?>"></i> - <?= h($service->icon_two) ?></dd>

    <dt class="col-sm-3">Descrição dois</dt>
    <dd class="col-sm-9"><?= h($service->description_two) ?></dd>
    
    <dt class="col-sm-3 text-truncate">Título três</dt>
    <dd class="col-sm-9"><?= h($service->tittle_three) ?></dd>

    <dt class="col-sm-3 text-truncate">Ícone três</dt>
    <dd class="col-sm-9"><i class="<?= $service->icon_three?>"></i> - <?= h($service->icon_three) ?></dd>
    
    <dt class="col-sm-3">Descrição três</dt>
    <dd class="col-sm-9"><?= h($service->description_three) ?></dd>
    
    <dt class="col-sm-3 text-truncate">Criado</dt>
    <dd class="col-sm-9"><?= h($service->created) ?></dd>
    
    <dt class="col-sm-3 text-truncate">Modificado</dt>
    <dd class="col-sm-9"><?= h($service->modified) ?></dd>
</dl>