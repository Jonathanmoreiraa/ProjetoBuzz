<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticlesCategory[]|\Cake\Collection\CollectionInterface $articlesCategories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Articles Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Situations'), ['controller' => 'Situations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Situation'), ['controller' => 'Situations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="articlesCategories index large-9 medium-8 columns content">
    <h3><?= __('Articles Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('situations_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articlesCategories as $articlesCategory): ?>
            <tr>
                <td><?= $this->Number->format($articlesCategory->id) ?></td>
                <td><?= h($articlesCategory->name) ?></td>
                <td><?= $articlesCategory->has('situation') ? $this->Html->link($articlesCategory->situation->name_situation, ['controller' => 'Situations', 'action' => 'view', $articlesCategory->situation->id]) : '' ?></td>
                <td><?= h($articlesCategory->created) ?></td>
                <td><?= h($articlesCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $articlesCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $articlesCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $articlesCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesCategory->id)]) ?>
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
