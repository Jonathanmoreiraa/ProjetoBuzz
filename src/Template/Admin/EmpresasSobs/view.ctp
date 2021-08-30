<?php

use Cake\Controller\Controller;
use Cake\Routing\Router;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Sobre Empresa</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller'=>'EmpresasSobs', 'action'=>'index'], ['class'=>'btn btn-outline-secondary btn-sm'])?>
            <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
            <?= $this->Html->link(__('Editar'), ['controller'=>'EmpresasSobs', 'action'=>'edit', $empresasSob->id], ['class'=>'btn btn-outline-warning btn-sm'])?>
           <?php 
                echo $this->Html->link(
                    $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                '#', 
                array(
                    'class'=>'btn-confirm', //tirar um dos dois
                    'data-toggle'=> 'modal',
                    'data-target' => '#apagarRegistro',
                    'data-action'=> Router::url(
                array('action'=>'delete',$empresasSob->id)
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
                <?= $this->Html->link(__('Listar'), ['controller'=>'EmpresasSobs', 'action'=>'index'], ['class'=>'dropdown-item'])?>
                <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
                <?= $this->Html->link(__('Editar'), ['controller'=>'EmpresasSobs', 'action'=>'edit', $empresasSob->id], ['class'=>'dropdown-item'])?>
                <?php 
                    echo $this->Html->link(
                        $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                    '#', 
                    array(
                        'class'=>'btn-confirm', //tirar um dos dois
                        'data-toggle'=> 'modal',
                        'data-target' => '#apagarRegistro',
                        'data-action'=> Router::url(
                    array('action'=>'delete',$empresasSob->id)
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
            <?php if(!empty($empresasSob->image)) {?>
                <!--Adiciona o ícone do perfil e nome de usuário--><?= $this->Html->image('../files/empresassob/'.$empresasSob->id.'/'.$empresasSob->image , ['width'=>'250', 'height'=>'170']) //usa a imagem armazenada no BD.?>&nbsp;
            <?php }else{ //se o usuário não tiver cadastrado uma imagem?>
                <?= $this->Html->image('../files/empresassob/preview.png', ['width'=>'250', 'height'=>'170']) //usa a imagem armazenada no BD.?>&nbsp;       
            <?php } ?>    
        </div>
        <?= $this->Html->link(__('Alterar Foto'), ['controller'=>'EmpresasSobs', 'action'=>'alterarFotoSobempre', $empresasSob->id], ['class'=>'btn btn-outline-primary btn-sm'] )?>
    </dd>
    <dt class="col-sm-3">ID</dt><!--dt é o título-->
    <dd class="col-sm-9"><?= $this->Number->format($empresasSob->id) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">Título</dt>
    <dd class="col-sm-9"><?= h($empresasSob->tittle) ?></dd>

    <dt class="col-sm-3">Descrição</dt>
    <dd class="col-sm-9"><?= h($empresasSob->description) ?></dd>

    <dt class="col-sm-3">Ordem</dt>
    <dd class="col-sm-9"><?= h($empresasSob->ordem) ?></dd>

    <dt class="col-sm-3 text-truncate">Situação</dt>
    <dd class="col-sm-9">
        <?php
            if($empresasSob->situation->id == 1){
                echo "<span class='badge badge-warning text-white'>"
                .$empresasSob->situation->name_situation."</span>"; 
            }else if($empresasSob->situation->id == 2){
                echo "<span class='badge badge-success'>"
                .$empresasSob->situation->name_situation."</span>";
            }else if($empresasSob->situation->id == 3){
                echo "<span class='badge badge-danger'>"
                .$empresasSob->situation->name_situation."</span>";
            }
            else{
                echo "<span class='badge badge-warning text-white'>"
                .$empresasSob->situation->name_situation."</span>";           }
        ?>
    </dd>
    
    <dt class="col-sm-3 text-truncate">Criado</dt>
    <dd class="col-sm-9"><?= h($empresasSob->created) ?></dd>
    
    <dt class="col-sm-3 text-truncate">Modificado</dt>
    <dd class="col-sm-9"><?= h($empresasSob->modified) ?></dd>
</dl>
<?= $this->Element('modalex-item')?>