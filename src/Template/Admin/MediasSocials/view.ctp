<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MediasSocial $mediasSocial
 */
?>
<?php

use Cake\Routing\Router;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Rede Social</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller'=>'MediasSocials', 'action'=>'index'], ['class'=>'btn btn-outline-secondary btn-sm'])?>
            <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
            <?= $this->Html->link(__('Editar'), ['controller'=>'MediasSocials', 'action'=>'edit', $mediasSocial->id], ['class'=>'btn btn-outline-warning btn-sm'])?>
           <?php 
                echo $this->Html->link(
                    $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                '#', 
                array(
                    'class'=>'btn-confirm', //tirar um dos dois
                    'data-toggle'=> 'modal',
                    'data-target' => '#apagarRegistro',
                    'data-action'=> Router::url(
                array('action'=>'delete',$mediasSocial->id)
                ),
            'escape' => false), 
            false);
            ?>
            
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-dark dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller'=>'MediasSocials', 'action'=>'index'], ['class'=>'dropdown-item'])?>
                <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
                <?= $this->Html->link(__('Editar'), ['controller'=>'MediasSocials', 'action'=>'edit', $mediasSocial->id], ['class'=>'dropdown-item'])?>
                <?php 
                    echo $this->Html->link(
                        $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                    '#', 
                    array(
                        'class'=>'btn-confirm', //tirar um dos dois
                        'data-toggle'=> 'modal',
                        'data-target' => '#apagarRegistro',
                        'data-action'=> Router::url(
                    array('action'=>'delete',$mediasSocial->id)
                    ),
                'escape' => false), 
                false);
                ?>            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">ID</dt><!--dt é o título-->
    <dd class="col-sm-9"><?= $this->Number->format($mediasSocial->id) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">Título da rede</dt>
    <dd class="col-sm-9"><?= h($mediasSocial->tittle) ?></dd>

    <dt class="col-sm-3 text-truncate">Link da rede</dt>
    <dd class="col-sm-9"><?= h($mediasSocial->link) ?></dd>

    <dt class="col-sm-3 text-truncate">Situação</dt>
    <dd class="col-sm-9">
        <?php
            if($mediasSocial->situation->id == 1){
                echo "<span class='badge badge-warning text-white'>"
                .$mediasSocial->situation->name_situation."</span>"; 
            }else if($mediasSocial->situation->id == 2){
                echo "<span class='badge badge-success'>"
                .$mediasSocial->situation->name_situation."</span>";
            }else if($mediasSocial->situation->id == 3){
                echo "<span class='badge badge-danger'>"
                .$mediasSocial->situation->name_situation."</span>";
            }
            else{
                echo "<span class='badge badge-warning text-white'>"
                .$mediasSocial->situation->name_situation."</span>";           }
        ?>
    </dd>

    <dt class="col-sm-3 text-truncate">Ícone da rede</dt>
    <dd class="col-sm-9"><h3><i class="<?= $mediasSocial->icon?>"></i></h3></dd>
    
    <dt class="col-sm-3 text-truncate">Criado</dt>
    <dd class="col-sm-9"><?= h($mediasSocial->created) ?></dd>
    
    <dt class="col-sm-3 text-truncate">Modificado</dt>
    <dd class="col-sm-9"><?= h($mediasSocial->modified) ?></dd>
</dl>
<?= $this->Element('modalex-item')?>