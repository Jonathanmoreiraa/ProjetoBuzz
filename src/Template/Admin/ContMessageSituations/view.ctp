<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContMessageSituation $contMessageSituation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cont Message Situation'), ['action' => 'edit', $contMessageSituation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cont Message Situation'), ['action' => 'delete', $contMessageSituation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contMessageSituation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cont Message Situations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cont Message Situation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contact Messages'), ['controller' => 'ContactMessages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact Message'), ['controller' => 'ContactMessages', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contMessageSituations view large-9 medium-8 columns content">
    <h3><?= h($contMessageSituation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name Message Situation') ?></th>
            <td><?= h($contMessageSituation->name_message_situation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= $contMessageSituation->has('color') ? $this->Html->link($contMessageSituation->color->name_color, ['controller' => 'Colors', 'action' => 'view', $contMessageSituation->color->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contMessageSituation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($contMessageSituation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($contMessageSituation->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Contact Messages') ?></h4>
        <?php if (!empty($contMessageSituation->contact_messages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Users Id') ?></th>
                <th scope="col"><?= __('Cont Message Situation Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($contMessageSituation->contact_messages as $contactMessages): ?>
            <tr>
                <td><?= h($contactMessages->id) ?></td>
                <td><?= h($contactMessages->name) ?></td>
                <td><?= h($contactMessages->email) ?></td>
                <td><?= h($contactMessages->subject) ?></td>
                <td><?= h($contactMessages->message) ?></td>
                <td><?= h($contactMessages->users_id) ?></td>
                <td><?= h($contactMessages->cont_message_situation_id) ?></td>
                <td><?= h($contactMessages->created) ?></td>
                <td><?= h($contactMessages->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ContactMessages', 'action' => 'view', $contactMessages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ContactMessages', 'action' => 'edit', $contactMessages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ContactMessages', 'action' => 'delete', $contactMessages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactMessages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
