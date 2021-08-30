<?= $this->Form->create('post', ['class'=>'form-signin']) ?>
<?= $this->Flash->render();?>
<?=  $this->Html->image('favicon.png', ['class'=>'mb-4', 'alt'=>'Buzz', 'width'=>'82', 'height'=>'82']) ?>  <!--usa e edita a logo-->
<h1 class="h3 mb-3 fw-normal">Área Restrita</h1>
    <?php
    //editando as barras de usuário e senha, usando as configurações do HTML
        echo $this->Form->control('username', ['class'=> 'form-control', 'placeholder'=>'Usuário', 'label'=>false]); //cria a barra de usuário, utiliza as informações do nput do Html em um array.
        echo $this->Form->control('password', ['class'=>'form-control', 'placeholder'=>'Senha', 'label'=>false]);//cria a barra de senha, usando as informações do bootstrap no HTML
    ?>
    <?= $this->Form->button(__('Acessar'), ['class'=>'w-100 btn btn-lg btn-primary']) ?>
    <p class="text-center">
        <?= $this->Html->link(__('Cadastrar'), ['controller'=>'Users', 'action'=>'cadastrar'])//adiciona o link para a tela de cadastrar?> 
        - <?= $this->Html->link(__('Esqueceu a senha?'), ['controller'=>'Users', 'action'=>'recuperarSenha'])?>
    </p>
    <?= $this->Form->end() ?>