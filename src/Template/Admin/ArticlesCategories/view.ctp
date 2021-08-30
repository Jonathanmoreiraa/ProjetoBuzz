<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesCategory $articlesCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articles Category'), ['action' => 'edit', $articlesCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articles Category'), ['action' => 'delete', $articlesCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articles Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articlesCategories view large-9 medium-8 columns content">
    <h3><?= h($articlesCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($articlesCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Situation') ?></th>
            <td><?= $articlesCategory->has('situation') ? $this->Html->link($articlesCategory->situation->name_situation, ['controller' => 'Situations', 'action' => 'view', $articlesCategory->situation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articlesCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($articlesCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($articlesCategory->modified) ?></td>
        </tr>
    </table>
</div>
