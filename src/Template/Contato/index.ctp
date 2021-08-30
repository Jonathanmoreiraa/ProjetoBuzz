<main role="main">
    <div class="jumbotron contato">
        <div class="container">
        <h2 class="display-4 text-center contato-titulo">Contato</h2><br>
        <?= $this->Flash->render() //aprensenta a mensagem de erro ou sucesso ?>
        <?= $this->Form->create($contactMessage) //cria o formulário e trás as validação da ContactMessagesTable?>
        <!--Criar um campo invisível, que torna o campo diretamente pendente-->
        <?= $this->Form->control('cont_message_situation_id', ['type'=>'hidden','class'=>'form-control','value'=>1,'label' => false]);?>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><span class="text-danger">* </span>Nome</label>
                    <?= $this->Form->control('name', ['class'=>'form-control', 'placeholder'=>'Nome Completo', 'label' => false]);?>
                </div>
                <div class="form-group col-md-6">
                    <label><span class="text-danger">* </span>E-mail</label>
                    <?= $this->Form->control('email', ['class'=>'form-control', 'placeholder'=>'Endereço de e-mail', 'label' => false]);?>
                </div>
                <div class="form-group col-md-12">
                    <label><span class="text-danger">* </span>Assunto da mensagem</label>
                    <?= $this->Form->control('subject', ['class'=>'form-control', 'label' => false]);?>
                </div>
                <div class="form-group col-md-12">
                    <label><span class="text-danger">* </span>Mensagem</label>
                    <?= $this->Form->control('message', ['class'=>'form-control', 'rows'=>4,'label' => false]);?>
                </div>
                <p>
                    <span class="text-danger">* </span> Campo obrigatório
                </p>
            </div>
        <?= $this->Form->button(__('Enviar'), ['class'=>'btn btn-env', 'style'=>'float: right;']) //cria botão cadastrar?>
        <?= $this->Form->end() //finaliza o formulário?><br><br>
        </div>
        <hr class="featurette-divider">
    </div>
</main
