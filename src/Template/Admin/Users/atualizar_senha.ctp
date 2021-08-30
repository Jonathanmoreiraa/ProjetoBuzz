<?= $this->Form->create($user, ['class'=>'form-signin']) ?>
<?= $this->Flash->render();?>
<h1 class="h3 mb-3 fw-normal">Atualizar Senha</h1>

<div class="form-group">
    <?= $this->Form->control('password', ['class'=>'form-control', 'placeholder'=>'Digite a nova senha', 'label'=>false]) ?>
    <?= $this->Form->control('password_confirm', ['class'=>'form-control', 'type'=>'password' ,'placeholder'=>'Confirme a nova senha', 'label'=>false]) ?><br>
</div>
<?= $this->Form->button(__('Atualizar'), ['class'=>'w-100 btn btn-lg btn-primary']) ?>
<p class="text-center">
    <br><?= $this->Html->link(__('Página de login'), ['controller'=>'Users', 'action'=>'login'])//adiciona o link para a tela de cadastrar?>
</p>
<?= $this->Form->end() ?>