<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactMessages[]|\Cake\Collection\CollectionInterface $contactMessages
 */
?>

<?php use Cake\Routing\Router;
?>
<!--a controler recebe o nome da classe-->
<div class="d-flex">
        <div class="mr-auto p-2">
            <h2 class="display-4 titulo">Listar Mensagens</h2>
        </div>
    <a href="cadastrar.html">
        <div class="p-2">
        <?= $this->Html->link(__('Cadastrar'), ['controller' => 'ContactMessages', 'action'=>'add'], ['class'=>'btn btn-outline-info btn-sm'])?>
        </div>
    </a>
</div>
<?= $this->Flash->render()?> <!--Mostra a imagem de alerta-->
<div class="table-responsive">
    <!--tabela dos usuários do BD-->
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th class="d-none d-md-table-cell">E-mail</th><!--oculta o e-mail quando está na tela xs-->
                <th class="d-none d-sm-table-cell">Assunto</th>
                <th>Situação</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>        
        <tbody>
            <!--Mostrar todos usuários na tabela-->
            <?php foreach ($contactMessages as $contactMessage): ?><!--user= usuário específico-->
            <tr><!--<tr class="table-(cor)"></tr> para colocar a cor na linha-->
                <td><?= $this->Number->format($contactMessage->id) ?></td>
                <td><?= h($contactMessage->name) ?></td>
                <td class="d-none d-md-table-cell"><?= h($contactMessage->email) ?></td>
                <td class="d-none d-sm-table-cell"><?= h($contactMessage->subject) ?></td>
                <td>
                <?php
                    //cores da situação do artigo
                    if($contactMessage->cont_message_situation->id == 1){
                        echo "<span class='badge badge-warning text-white'>"
                        .$contactMessage->cont_message_situation->name_message_situation."</span>"; 
                    }else if($contactMessage->cont_message_situation->id == 3){
                        echo "<span class='badge badge-success'>"
                        .$contactMessage->cont_message_situation->name_message_situation."</span>";
                    }else if($contactMessage->cont_message_situation->id == 2){
                        echo "<span class='badge badge-info'>"
                        .$contactMessage->cont_message_situation->name_message_situation."</span>";
                    }
                    else{
                        echo "<span class='badge badge-warning text-white'>"
                        .$contactMessage->cont_message_situation->name_message_situation."</span>";            }
                /* Outra forma é adicionar o ContMessageSituations.Colors no contain na controller e depois  */
                ?>
                </td>
                <td class="text-center">
                    <span class="d-none d-md-block">
                        <?= $this->Html->link(__('Visualizar'), ['controller' => 'ContactMessages', 'action' => 'view', $contactMessage->id], ['class'=>'btn btn-outline-success btn-sm']) ?>
                        <?= $this->Html->link(__('Editar'), ['controller'=>'ContactMessages', 'action' => 'edit', $contactMessage->id], ['class'=>'btn btn-outline-warning btn-sm']) ?>
                        <?php 
                            echo $this->Html->link(
                                $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                            '#', 
                            array(
                                'class'=>'btn-confirm', //tirar um dos dois
                                'data-toggle'=> 'modal',
                                'data-target' => '#apagarRegistro',
                                'data-action'=> Router::url(
                            array('action'=>'delete',$contactMessage->id)
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
                            <?= $this->Html->link(__('Visualizar'), ['controller' => 'ContactMessages', 'action' => 'view', $contactMessage->id], ['class'=>'dropdown-item']) ?>
                            <?= $this->Html->link(__('Editar'), ['controller'=>'ContactMessages', 'action' => 'edit', $contactMessage->id], ['class'=>'dropdown-item']) ?>
                            <?php 
                                echo $this->Html->link(
                                    $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                                '#', 
                                array(
                                    'class'=>'btn-confirm', //tirar um dos dois
                                    'data-toggle'=> 'modal',
                                    'data-target' => '#apagarRegistro',
                                    'data-action'=> Router::url(
                                array('action'=>'delete',$contactMessage->id)
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