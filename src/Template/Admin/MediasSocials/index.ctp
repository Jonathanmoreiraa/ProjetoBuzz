<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MediasSocial[]|\Cake\Collection\CollectionInterface $mediasSocials
 */

?>
<?php use Cake\Routing\Router;?>
<div class="d-flex">
        <div class="mr-auto p-2">
            <h2 class="display-4 titulo">Listar Redes Sociais</h2>
        </div>
        <div class="p-2">
        <?= $this->Html->link(__('Cadastrar'), ['controller' => 'MediasSocials', 'action'=>'add'], ['class'=>'btn btn-outline-info btn-sm'])?>
        </div>
</div>
<?= $this->Flash->render()?>
<div class="table-responsive">
    <!--tabela dos usuários do BD-->
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th class="d-none d-sm-table-cell">Link</th><!--oculta o e-mail quando está na tela xs-->
                <th class="d-none d-md-table-cell">Situação</th>
                <th class="d-none d-sm-table-cell">Ícone</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>        
        <tbody>
            <!--Mostrar todos usuários na tabela-->
            <?php foreach ($mediasSocials as $mediasSocial): ?><!--article= usuário específico-->
            <tr>
                <td><?= $this->Number->format($mediasSocial->id) ?></td>
                <td><?= h($mediasSocial->tittle) ?></td>
                <td class="d-none d-sm-table-cell"><?= $mediasSocial->link ?></td>
                <td class="d-none d-md-table-cell">
                <?php
                    //cores da situação do artigo
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
                        .$mediasSocial->situation->name_situation."</span>";            }
                ?>
                </td>
                <td class="d-none d-sm-table-cell"><h4><?= $mediasSocial->icon ?></i></h4></td>

                <td class="text-center">
                    <span class="d-none d-md-block">
                        <?= $this->Html->link(__('Visualizar'), ['controller' => 'MediasSocials', 'action' => 'view', $mediasSocial->id], ['class'=>'btn btn-outline-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editar'), ['controller'=>'MediasSocials', 'action' => 'edit', $mediasSocial->id], ['class'=>'btn btn-outline-warning btn-sm']) ?>
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
                        <button class="btn btn-dark dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ações
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'MediasSocials', 'action' => 'view', $mediasSocial->id], ['class'=>'dropdown-item']) ?>
                            <?= $this->Html->link(__('Editar'), ['controller'=>'MediasSocials', 'action' => 'edit', $mediasSocial->id], ['class'=>'dropdown-item']) ?>
                            <?php 
                                echo $this->Html->link(
                                    $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                                '#', 
                                array(
                                    'class'=>'btn-confirm', //tirar um dos dois
                                    'data-toggle'=> 'modal',
                                    'data-target' => '#apagarRegistro',
                                    'data-action'=> Router::url(
                                array('action'=>'delete', $mediasSocial->id)
                                ),
                            'escape' => false), 
                            false);
                            ?>                       
                        </div>
                    </div>    
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <?= $this->element('pagination');//cita o doc pagination que está na past element?>
</div>
<?= $this->Element('modalex-item')?>