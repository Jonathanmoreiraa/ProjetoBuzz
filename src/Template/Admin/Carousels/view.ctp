<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carousel $carousel
 */
?>
<?php

use Cake\Controller\Controller;
use Cake\Routing\Router;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Carousel</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller'=>'Carousels', 'action'=>'index'], ['class'=>'btn btn-outline-secondary btn-sm'])?>
            <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
            <?= $this->Html->link(__('Editar'), ['controller'=>'Carousels', 'action'=>'edit', $carousel->id], ['class'=>'btn btn-outline-warning btn-sm'])?>
           <?php 
                echo $this->Html->link(
                    $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                '#', 
                array(
                    'class'=>'btn-confirm', //tirar um dos dois
                    'data-toggle'=> 'modal',
                    'data-target' => '#apagarRegistro',
                    'data-action'=> Router::url(
                array('action'=>'delete',$carousel->id)
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
                <?= $this->Html->link(__('Listar'), ['controller'=>'Carousels', 'action'=>'index'], ['class'=>'dropdown-item'])?>
                <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
                <?= $this->Html->link(__('Editar'), ['controller'=>'Carousels', 'action'=>'edit', $carousel->id], ['class'=>'dropdown-item'])?>
                <?php 
                    echo $this->Html->link(
                        $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                    '#', 
                    array(
                        'class'=>'btn-confirm', //tirar um dos dois
                        'data-toggle'=> 'modal',
                        'data-target' => '#apagarRegistro',
                        'data-action'=> Router::url(
                    array('action'=>'delete',$carousel->id)
                    ),
                'escape' => false), 
                false);
                ?>            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">Imagem de perfil</dt>
    <dd class="col-sm-9">
        <div class="img-perfil">
            <?php if(!empty($carousel->image)) {?>
                <!--Adiciona o ícone do perfil e nome de usuário--><?= $this->Html->image('../files/carousel/'.$carousel->id.'/'.$carousel->image , ['width'=>'200', 'height'=>'120']) //usa a imagem armazenada no BD.?>&nbsp;
            <?php }else{ //se o usuário não tiver cadastrado uma imagem?>
                <?= $this->Html->image('../files/carousel/preview.png', ['width'=>'200', 'height'=>'120']) //usa a imagem armazenada no BD.?>&nbsp;       
            <?php } ?>    
        </div>
        <?= $this->Html->link(__('Alterar Foto'), ['controller'=>'Carousels', 'action'=>'addImageCarousel', $carousel->id], ['class'=>'btn btn-outline-primary btn-sm'] )?>
    </dd>
    <dt class="col-sm-3">ID</dt><!--dt é o título-->
    <dd class="col-sm-9"><?= $this->Number->format($carousel->id) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= h($carousel->name_carousel) ?></dd>

    <dt class="col-sm-3">Título do slide</dt>
    <dd class="col-sm-9"><?= h($carousel->tittle) ?></dd>

    <dt class="col-sm-3">Descrição</dt>
    <dd class="col-sm-9"><?= h($carousel->description) ?></dd>

    <dt class="col-sm-3">Título do Botão</dt>
    <dd class="col-sm-9"><?= h($carousel->tittle_button) ?></dd>

    <dt class="col-sm-3 text-truncate">Link do Botão</dt>
    <dd class="col-sm-9"><?= h($carousel->link) ?></dd>

    <dt class="col-sm-3 text-truncate">Cor do Botão</dt>
    <dd class="col-sm-9">
        <?php if(!empty($carousel->color->color)){ ?>
            <button type="button" class="btn btn-<?= h($carousel->color->color) ?> btn-sm">
                <?= h($carousel->color->name_color) ?>
            </button>
        <?php } ?>
    </dd>

    <dt class="col-sm-3 text-truncate">Posição do Botão</dt>
    <dd class="col-sm-9"><?= h($carousel->position->name_position) ?></dd>

    <dt class="col-sm-3 text-truncate">Situação</dt>
    <dd class="col-sm-9">
        <?php
            if($carousel->situation->id == 1){
                echo "<span class='badge badge-warning text-white'>"
                .$carousel->situation->name_situation."</span>"; 
            }else if($carousel->situation->id == 2){
                echo "<span class='badge badge-success'>"
                .$carousel->situation->name_situation."</span>";
            }else if($carousel->situation->id == 3){
                echo "<span class='badge badge-danger'>"
                .$carousel->situation->name_situation."</span>";
            }
            else{
                echo "<span class='badge badge-warning text-white'>"
                .$carousel->situation->name_situation."</span>";           }
        ?>
    </dd>
    
    <dt class="col-sm-3 text-truncate">Criado</dt>
    <dd class="col-sm-9"><?= h($carousel->created) ?></dd>
    
    <dt class="col-sm-3 text-truncate">Modificado</dt>
    <dd class="col-sm-9"><?= h($carousel->modified) ?></dd>
</dl>
<?= $this->Element('exc-carousel')?>