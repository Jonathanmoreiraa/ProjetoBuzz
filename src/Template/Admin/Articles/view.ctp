<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<?php
use Cake\Controller\Controller;
use Cake\Routing\Router;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Artigo</h2>
    </div>
    <div class="p-2">
        <span class="d-none d-md-block">
            <?= $this->Html->link(__('Listar'), ['controller'=>'Articles', 'action'=>'index'], ['class'=>'btn btn-outline-secondary btn-sm'])?>
            <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
            <?= $this->Html->link(__('Editar'), ['controller'=>'Articles', 'action'=>'edit', $article->id], ['class'=>'btn btn-outline-warning btn-sm'])?>
           <?php 
                echo $this->Html->link(
                    $this->Html->tag('n', 'Apagar', ['class' => 'btn btn-outline-danger btn-sm']), 
                '#', 
                array(
                    'class'=>'btn-confirm', //tirar um dos dois
                    'data-toggle'=> 'modal',
                    'data-target' => '#apagarRegistro',
                    'data-action'=> Router::url(
                array('action'=>'delete',$article->id)
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
                <?= $this->Html->link(__('Listar'), ['controller'=>'Articles', 'action'=>'index'], ['class'=>'dropdown-item'])?>
                <!--é preciso adicionar o $user->id para que o programa localize o usuário para editar-->
                <?= $this->Html->link(__('Editar'), ['controller'=>'Articles', 'action'=>'edit', $article->id], ['class'=>'dropdown-item'])?>
                <?php 
                    echo $this->Html->link(
                        $this->Html->tag('n', 'Apagar', ['class' => 'dropdown-item']), 
                    '#', 
                    array(
                        'class'=>'btn-confirm', //tirar um dos dois
                        'data-toggle'=> 'modal',
                        'data-target' => '#apagarRegistro',
                        'data-action'=> Router::url(
                    array('action'=>'delete',$article->id)
                    ),
                'escape' => false), 
                false);
                ?>            </div>
        </div>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<dl class="row">
    <dt class="col-sm-3">Imagem do artigo</dt>
    <dd class="col-sm-9">
        <div class="img-perfil">
            <?php if(!empty($article->image)) {?>
                <!--Adiciona o ícone do perfil e nome de usuário--><?= $this->Html->image('../files/articles/'.$article->id.'/'.$article->image , ['width'=>'250', 'height'=>'170']) //usa a imagem armazenada no BD.?>&nbsp;
            <?php }else{ //se o usuário não tiver cadastrado uma imagem?>
                <?= $this->Html->image('../files/articles/preview.png', ['width'=>'250', 'height'=>'170']) //usa a imagem armazenada no BD.?>&nbsp;       
            <?php } ?>    
        </div>
        <?= $this->Html->link(__('Alterar Foto'), ['controller'=>'Articles', 'action'=>'alterarFotoArtigo', $article->id], ['class'=>'btn btn-outline-dark btn-sm'] )?>
    </dd>
    <dt class="col-sm-3">ID</dt><!--dt é o título-->
    <dd class="col-sm-9"><?= $this->Number->format($article->id) ?></dd><!--dd é o conteúdo-->

    <dt class="col-sm-3">Título do artigo</dt>
    <dd class="col-sm-9"><?= h($article->tittle) ?></dd>

    <dt class="col-sm-3 text-truncate">Autor</dt>
    <dd class="col-sm-9"><?= $article->has('user') ? $this->Html->link($article->user->name, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></dd>
    
    <dt class="col-sm-3 text-truncate">Situação</dt>
    <dd class="col-sm-9">
        <?php
            if($article->situation->id == 1){
                echo "<span class='badge badge-warning text-white'>"
                .$article->situation->name_situation."</span>"; 
            }else if($article->situation->id == 2){
                echo "<span class='badge badge-success'>"
                .$article->situation->name_situation."</span>";
            }else if($article->situation->id == 3){
                echo "<span class='badge badge-danger'>"
                .$article->situation->name_situation."</span>";
            }
            else{
                echo "<span class='badge badge-warning text-white'>"
                .$article->situation->name_situation."</span>";           }
        ?>
    </dd>
    
    <dt class="col-sm-3 text-truncate">Quantidade de acesso</dt>
    <dd class="col-sm-9"><?= h($article->access_quantity) ?></dd>
    
    <dt class="col-sm-3 text-truncate">Criado</dt>
    <dd class="col-sm-9"><?= h($article->created) ?></dd>

    <dt class="col-sm-3 text-truncate">Modificado</dt>
    <dd class="col-sm-9"><?= h($article->modified) ?></dd>

    <dt class="col-sm-3"><br>Slug</dt>
    <dd class="col-sm-9"><br><?= h($article->slug) ?></dd>

    <dt class="col-sm-3 text-truncate">Palavras-chave</dt>
    <dd class="col-sm-9"><?= h($article->keywords) ?></dd>

    <dt class="col-sm-3 text-truncate">Descrição SEO</dt>
    <dd class="col-sm-9"><?= $article->description ?></dd>

    <dt class="col-sm-3 text-truncate">Buscadores</dt>
    <dd class="col-sm-9"><?= h($article->robot->name) ?></dd>

    <dt class="col-sm-3 text-truncate">Tipo de artigo</dt>
    <dd class="col-sm-9"><?= h($article->articles_type->name) ?></dd>
    
    <dt class="col-sm-3 text-truncate"><br>Categoria</dt>
    <dd class="col-sm-9"><br><?= h($article->articles_category->name) ?></dd>
    
    <dt class="col-sm-3">Descrição</dt>
    <dd class="col-sm-9"><?= $article->description_article ?></dd>
    
    <dt class="col-sm-3">Conteúdo</dt>
    <dd class="col-sm-9"><?= $article->content ?></dd>

    <dt class="col-sm-3 text-truncate">Resumo Público</dt>
    <dd class="col-sm-9"><?= $article->public_summary ?></dd>
</dl>
<?= $this->Element('modalex-artigo')?>