<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Robot $robot
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Robot'), ['action' => 'edit', $robot->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Robot'), ['action' => 'delete', $robot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $robot->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Robots'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Robot'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="robots view large-9 medium-8 columns content">
    <h3><?= h($robot->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($robot->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($robot->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($robot->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($robot->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($robot->modified) ?></td>
        </tr>
    </table>
</div>
