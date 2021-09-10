<?php use Cake\Routing\Router;
?>
<!--a controler recebe o nome da classe-->
<div class="d-flex">
        <div class="mr-auto p-2">
            <h2 class="display-4 titulo">Listar Carousels</h2>
        </div>
    <a href="cadastrar.html">
        <div class="p-2">
        <?= $this->Html->link(__('Cadastrar'), ['controller' => 'carousels', 'action'=>'add'], ['class'=>'btn btn-outline-info btn-sm'])?>
        </div>
    </a>
</div>
<?= $this->Flash->render()?>
<div class="table-responsive">
    <!--tabela dos usuários do BD-->
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th class="d-none d-sm-table-cell">Ordem</th><!--oculta o e-mail quando está na tela xs-->
                <th class="d-none d-lg-table-cell">Situação</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>        
        <tbody>
            <!--Mostrar todos usuários na tabela-->
            <?php foreach ($carousels as $carousel): ?><!--carousel= usuário específico-->
            <tr>
                <td><?= $this->Number->format($carousel->id) ?></td>
                <td><?= h($carousel->name_carousel) ?></td>
                <td class="d-none d-sm-table-cell"><?= h($carousel->ordem) ?></td>
                <td class="d-none d-lg-table-cell">
                <?php
                    //cores da situação do artigo
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
                        .$carousel->situation->name_situation."</span>";            }
                ?>
                </td>
                <td class="text-center">
                    <span class="d-none d-md-block">
                        <?= $this->Html->link(__('<i class="fas fa-angle-double-up"></i>'), 
                        [
                            'controller' => 'Carousels', 
                            'action' => 'altOrdemCarousel', 
                            $carousel->id
                        ], 
                        [
                            'class'=>'btn btn-outline-dark btn-sm', 
                            'escape'=>false
                        ]) ?>
                        <?= $this->Html->link(__('Visualizar'), ['controller' => 'Carousels', 'action' => 'view', $carousel->id], ['class'=>'btn btn-outline-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editar'), ['controller'=>'Carousels', 'action' => 'edit', $carousel->id], ['class'=>'btn btn-outline-warning btn-sm']) ?>
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
                        <button class="btn btn-dark dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ações
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                            <?= $this->Html->link(__('<i class="fas fa-angle-double-up"></i>'), 
                            [
                                'controller' => 'Carousels', 
                                'action' => 'altOrdemCarousel', 
                                $carousel->id
                            ], 
                            [
                                'class'=>'text-center dropdown-item', 
                                'escape'=>false
                            ]) ?>
                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'Carousels', 'action' => 'view', $carousel->id], ['class'=>'dropdown-item']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller'=>'Carousels', 'action' => 'edit', $carousel->id], ['class'=>'dropdown-item']) ?>
                            <?php 
                                echo $this->Html->link(
                                    $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                                '#', 
                                array(
                                    'class'=>'btn-confirm', //tirar um dos dois
                                    'data-toggle'=> 'modal',
                                    'data-target' => '#apagarRegistro',
                                    'data-action'=> Router::url(
                                array('action'=>'delete', $carousel->id)
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
<?= $this->Element('exc-carousel')?>
