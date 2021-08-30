<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Alterar foto do carousel</h2>
    </div>

    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Visualizar'), ['controller' => 'Carousels', 'action'=>'view', $carousel->id],  ['class'=>'btn btn-outline-success btn-sm'] )?>
        </span>
        <div class="dropdown d-block d-md-none">
            <button class="btn btn-dark dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                <?= $this->Html->link(__('Visualizar'), ['controller'=>'Carousels', 'action' => 'view', $carousel->id], ['class'=>'dropdown-item']) ?>
            </div>
        </div>
    </div>    
</div><hr>
<?= $this->Flash->render()?>
<?= $this->Form->create($carousel, ['type' => 'file'])?>

<div class="form-row">
    <div class="form-group col-md-6">
            <label><span class="text-danger">* </span>Foto (1920x1024)</label><br>
            <?= $this->Form->control('image', ['type'=>'file', 'label' => false, 'onchange'=>'previewImagem()']);?>
        </div>
        <div class="form-group col-md-6">
            <?php 
            //usa-se o user, pois foi o usado no CarouselsController para recuperar o $user_id
                if($carousel->image !== null){
                    $image_antiga='..\..\..\files\carousel\\'.$carousel->id.'\\'.$carousel->image;//mostrar a imagem
                }else{
                    $image_antiga='..\..\..\files\carousel\preview.png';//mostrar a imagem pré-definida
                }
            ?>
            <img src='<?= $image_antiga ?>' alt='Preview da imagem' id="preview-img" class='img-thumbnail' style="width: 280px; height: 180px;">
    </div>

</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary'])?>
<?= $this->Form->end()?>