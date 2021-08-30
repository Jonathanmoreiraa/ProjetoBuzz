<?php use Cake\Routing\Router;?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Mensagens de contato</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller'=>'ContactMessages', 'action'=>'index'], ['class'=>'btn btn-outline-secondary btn-sm'])?>
            <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
            <?= $this->Html->link(__('Editar'), ['controller'=>'ContactMessages', 'action'=>'edit', $contactMessage->id], ['class'=>'btn btn-outline-warning btn-sm'])?>
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
            <button class="btn btn-dark dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Listar'), ['controller'=>'ContactMessages', 'action'=>'index'], ['class'=>'dropdown-item'])?>
                <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
                <?= $this->Html->link(__('Editar'), ['controller'=>'ContactMessages', 'action'=>'edit', $contactMessage->id], ['class'=>'dropdown-item'])?>
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
    </div>
</div><hr>

<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">ID</dt><!--dt é o título-->
    <dd class="col-sm-9"><?= $this->Number->format($contactMessage->id) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">Nome</dt><!--dt é o título-->
    <dd class="col-sm-9"><?= h($contactMessage->name) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">E-mail</dt>
    <dd class="col-sm-9"><?= h($contactMessage->email) ?></dd> <!--O h() transforma em string-->

    <dt class="col-sm-3">Assunto</dt>
    <dd class="col-sm-9"><?= h($contactMessage->subject) ?></dd>

    <dt class="col-sm-3">Mensagem</dt>
    <div class="col-sm-9" style="word-wrap:break-word; width:50vh"><?= h($contactMessage->message) ?></div>
    
    <dt class="col-sm-3">Usuário</dt>
    <dd class="col-sm-9"><?= $contactMessage->has('user')?></dd>

    <dt class="col-sm-3">Situação</dt>
    <dd class="col-sm-9"><button type="button" class="btn btn-<?php 
        if($contactMessage->cont_message_situation->colors_id == 5){echo 'warning';}
        else if($contactMessage->cont_message_situation->colors_id == 7){echo 'info';}
        else if($contactMessage->cont_message_situation->colors_id == 2){echo 'success';}
    ?> btn-sm">
        <?= h($contactMessage->cont_message_situation->name_message_situation) ?>
    </button><dd>    
    
    <dt class="col-sm-3 text-truncate">Criado</dt>
    <dd class="col-sm-9"><?= h($contactMessage->created) ?></dd>
    
    <dt class="col-sm-3 text-truncate">Modificado</dt>
    <dd class="col-sm-9"><?= h($contactMessage->modified) ?></dd>
</dl>
<?= $this->Element('modalex-item')?>