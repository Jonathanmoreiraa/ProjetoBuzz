<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Editar Foto de Perfil</h2>
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
<?= $this->Flash->render()?>
<?= $this->Form->create($user, ['type' => 'file'])?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Foto (150x150)</label><br>
        <?= $this->Form->control('image', ['type'=>'file', 'label' => false, 'onchange'=>'previewImagem()']);?>
    </div>
    <div class="form-group col-md-6">
        <?php 
        //usa-se o user, pois foi o usado no UsersController para recuperar o $user_id
            if($user->image !== null){
                $image_antiga='..\..\files\user\\'.$user->id.'\\'.$user->image;//mostrar a imagem
            }else{
                $image_antiga='..\..\files\user\preview.png';//mostrar a imagem pré-definida
            }
            
        ?>
        <img src='<?= $image_antiga ?>' alt='<?= $user->name?>' id="preview-img" class='img-thumbnail' style="width: 150px; height: 150px;">
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary'])?>
<?= $this->Form->end()?>