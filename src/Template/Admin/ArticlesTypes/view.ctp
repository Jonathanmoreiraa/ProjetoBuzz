<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesType $articlesType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articles Type'), ['action' => 'edit', $articlesType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articles Type'), ['action' => 'delete', $articlesType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articles Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articlesTypes view large-9 medium-8 columns content">
    <h3><?= h($articlesType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($articlesType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articlesType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($articlesType->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($articlesType->modified) ?></td>
        </tr>
    </table>
</div>
