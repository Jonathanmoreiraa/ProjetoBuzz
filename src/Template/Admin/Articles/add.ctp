<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<?php

use PhpParser\Node\Stmt\Label;
?>
<div class="d-flex">
    <div class="mr-auto p-2">
        <h2 class="display-4 titulo">Cadastrar Artigos</h2>
    </div>
    <div class="p-2">
        <?= $this->Html->link(__('Listar Artigos'), ['controller' => 'Articles', 'action'=>'index'],  ['class'=>'btn btn-outline-secondary btn-sm'] )?>
    </div>
</div><hr>
<?= $this->Flash->render() ?>
<?= $this->Form->create($article, ['enctype'=>'multipart/form-data']) //cria o formulário?>
<div class="form-row">
    <div class="form-group col-md-12">
        <span class="text-danger">* </span><label>Título do Artigo</label>
        <?= $this->Form->control('tittle', ['class'=>'form-control', 'placeholder'=>'Adicione o título do artigo', 'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <span class="text-danger">* </span><label>Descrição do artigo</label>
        <?= $this->Form->control('description_article', ['class'=>'form-control', 'id'=>'editor-um','placeholder'=>'Descrição do artigo', 'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <span class="text-danger">* </span><label>Conteúdo do artigo</label>
        <?= $this->Form->control('content', ['class'=>'form-control', 'id'=>'editor-dois','placeholder'=>'Conteúdo do artigo', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <span class="text-danger">* </span><label>Slug do artigo</label>
        <?= $this->Form->control('slug', ['class'=>'form-control', 'placeholder'=>'Slug do artigo', 'label' => false]);?>
    </div>
    <div class="form-group col-md-6">
        <span class="text-danger">* </span><label>Palavras-chave</label>
        <?= $this->Form->control('keywords', ['class'=>'form-control', 'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <span class="text-danger">* </span><label>Descrição SEO</label>
        <?= $this->Form->control('description', ['class'=>'form-control', 'label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <span class="text-danger">* </span><label>Resumo público</label>
        <?= $this->Form->control('public_summary', ['class'=>'form-control', 'id'=>'editor-tres','label' => false]);?>
    </div>
    <div class="form-group col-md-12">
        <span class="text-danger">* </span><label>Situação dos buscadores</label>
        <?= $this->Form->control('robots_id', ['class'=>'form-control', 'label' => false, 'options'=>$robots]);?>
    </div>
    <div class="form-group col-md-4">
        <span class="text-danger">* </span><label>Quantidade de acesso</label>
        <?= $this->Form->control('access_quantity', ['class'=>'form-control', 'label' => false]);?>
    </div>
    <div class="form-group col-md-4">
        <span class="text-danger">* </span><label>Usuário escritor</label>
        <?= $this->Form->control('users_id', ['class'=>'form-control', 'label' => false, 'options'=>$users]);?>
    </div>
    <div class="form-group col-md-4">
        <label><span class="text-danger">* </span>Situação do Artigo</label>
        <?= $this->Form->control('situations_id', ['class'=>'form-control','options' => $situations, 'label'=>false]); ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Tipo do artigo</label>
        <?= $this->Form->control('articles_types_id', ['class'=>'form-control','options' => $articlesTypes, 'label'=>false]); ?>
    </div>
    <div class="form-group col-md-6">
        <label><span class="text-danger">* </span>Categoria do artigo</label>
        <?= $this->Form->control('articles_categories_id', ['class'=>'form-control','options' => $articlesCategories, 'label'=>false]); ?>
    </div>
</div>
<p>
    <span class="text-danger">* </span> Campo obrigatório
</p>
<?= $this->Form->button(__('Cadastrar'), ['class'=>'btn btn-info']) //cria botão cadastrar?>
<?= $this->Form->end() //finaliza o formulário?>

<?= $this->element('text-editor') ?>