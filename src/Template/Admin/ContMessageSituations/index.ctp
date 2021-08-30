<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContMessageSituation[]|\Cake\Collection\CollectionInterface $contMessageSituations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cont Message Situation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contact Messages'), ['controller' => 'ContactMessages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contact Message'), ['controller' => 'ContactMessages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contMessageSituations index large-9 medium-8 columns content">
    <h3><?= __('Cont Message Situations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_message_situation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('colors_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contMessageSituations as $contMessageSituation): ?>
            <tr>
                <td><?= $this->Number->format($contMessageSituation->id) ?></td>
                <td><?= h($contMessageSituation->name_message_situation) ?></td>
                <td><?= $contMessageSituation->has('color') ? $this->Html->link($contMessageSituation->color->name_color, ['controller' => 'Colors', 'action' => 'view', $contMessageSituation->color->id]) : '' ?></td>
                <td><?= h($contMessageSituation->created) ?></td>
                <td><?= h($contMessageSituation->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contMessageSituation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contMessageSituation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contMessageSituation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contMessageSituation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
