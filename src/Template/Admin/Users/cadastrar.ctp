<?= $this->Form->create($user, ['class'=>'form-signin']) ?>
<?= $this->Flash->render();?>
<h1 class="h3 mb-3 fw-normal">Cadastrar novo usuário</h1>
<div class="form-group">
    <label>Nome</label>
    <?= $this->Form->control('name', ['class'=>'form-control', 'placeholder'=>'Digite seu nome', 'label'=>false]) ?><br>
</div>
<div class="form-group">
    <label>E-mail</label>
    <?= $this->Form->control('email', ['class'=>'form-control', 'placeholder'=>'Digite o E-mail', 'label'=>false]) ?><br>
</div>
<div class="form-group">
    <label>Nome de usuário</label>
    <?= $this->Form->control('username', ['class'=>'form-control', 'placeholder'=>'Digite o nome de usuário', 'label'=>false]) ?><br>
</div>
<div class="form-group">
    <label>Senha</label>
    <?= $this->Form->control('password', ['class'=>'form-control', 'placeholder'=>'Digite a senha', 'label'=>false]) ?>
</div>
<?= $this->Form->button(__('Cadastrar'), ['class'=>'w-100 btn btn-lg btn-success']) ?>
<p class="text-center">
    <?= $this->Html->link(__('Página de login'), ['controller'=>'Users', 'action'=>'login'])//adiciona o link para a tela de cadastrar?> 
</p>
<?= $this->Form->end() ?>