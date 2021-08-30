<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesType[]|\Cake\Collection\CollectionInterface $articlesTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Articles Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articlesTypes index large-9 medium-8 columns content">
    <h3><?= __('Articles Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articlesTypes as $articlesType): ?>
            <tr>
                <td><?= $this->Number->format($articlesType->id) ?></td>
                <td><?= h($articlesType->name) ?></td>
                <td><?= h($articlesType->created) ?></td>
                <td><?= h($articlesType->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articlesType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articlesType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articlesType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesType->id)]) ?>
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
