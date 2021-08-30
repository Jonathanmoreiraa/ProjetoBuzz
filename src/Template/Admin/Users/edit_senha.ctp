<?php use Cake\Routing\Router;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Senha</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller' => 'users', 'action'=>'index'],  ['class'=>'btn btn-outline-secondary btn-sm'] )?>
            <?= $this->Html->link(__('Visualizar'), ['controller' => 'users', 'action'=>'view', $user->id],  ['class'=>'btn btn-outline-success btn-sm'] )?>
            <?php 
                echo $this->Html->link(
                    $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                '#', 
                array(
                    'class'=>'btn-confirm', //tirar um dos dois
                    'data-toggle'=> 'modal',
                    'data-target' => '#apagarRegistro',
                    'data-action'=> Router::url(
                array('action'=>'delete',$user->id)
                ),
            'escape' => false), 
            false);
            ?>        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-dark dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller' => 'users', 'action' => 'index', $user->id], ['class'=>'dropdown-item']) ?>
                <?= $this->Html->link(__('Visualizar'), ['controller'=>'users', 'action' => 'view', $user->id], ['class'=>'dropdown-item']) ?>
                <?php 
                    echo $this->Html->link(
                        $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                    '#', 
                    array(
                        'class'=>'btn-confirm', //tirar um dos dois
                        'data-toggle'=> 'modal',
                        'data-target' => '#apagarRegistro',
                        'data-action'=> Router::url(
                    array('action'=>'delete',$user->id)
                    ),
                'escape' => false), 
                false);
                ?>            
            </div>
        </div>    
    </div>
</div><hr>
<?= $this->Flash->render() //apresenta a mensagem de sucessou ou erro?>
<?= $this->Form->create($user) //cria o formulário com as informações -- não é necessário colocar quando se cria a ação no userscontroller?>
<div class="form-row">
    <div class="form-group col-md-12">
            <label><span class="text-danger">* </span>Senha</label>
            <?= $this->Form->control('password', ['class'=>'form-control', 'placeholder'=>'Senha', 'value'=>'', 'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
            <label><span class="text-danger">* </span>Confirme sua senha</label>
            <?= $this->Form->control('password_confirm', ['class'=>'form-control', 'type'=>'password' ,'placeholder'=>'Confirme a nova senha', 'label'=>false]) ?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>
<?= $this->Element('modal-ex')?>