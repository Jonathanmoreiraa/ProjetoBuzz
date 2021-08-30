<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Senha</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Visualizar'), ['controller' => 'Users', 'action'=>'perfil'],  ['class'=>'btn btn-outline-success btn-sm'] )?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-dark dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Visualizar'), ['controller'=>'Users', 'action' => 'perfil'], ['class'=>'dropdown-item']) ?>
            </div>
        </div>    
    </div>
</div><hr>
<?= $this->Flash->render() //apresenta a mensagem de sucessou ou erro?>
<?= $this->Form->create($user) //cria o formulário com as informações -- não é necessário colocar quando se cria a ação no userscontroller?>
<div class="form-row">
    <div class="form-group col-md-12">
        <label><span class="text-danger">* </span>Senha</label>
        <?= $this->Form->control('password', ['class'=>'form-control', 'placeholder'=>'Senha', 'label' => false]);?>
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
