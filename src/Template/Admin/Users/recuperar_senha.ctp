<?= $this->Form->create($user, ['class'=>'form-signin']) ?>
<?= $this->Flash->render();?>
<h1 class="h3 mb-3 fw-normal">Recuperar Senha</h1>

<div class="form-group">
    <label>E-mail</label>
    <?= $this->Form->control('email', ['class'=>'form-control', 'placeholder'=>'Digite o E-mail', 'label'=>false]) ?><br>
</div>
<?= $this->Form->button(__('Recuperar'), ['class'=>'w-100 btn btn-lg btn-primary']) ?>
<p class="text-center">
    <?= $this->Html->link(__('Página de login'), ['controller'=>'Users', 'action'=>'login'])//adiciona o link para a tela de cadastrar?> 
</p>
<?= $this->Form->end() ?>