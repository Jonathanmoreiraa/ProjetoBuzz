<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContMessageSituation $contMessageSituation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cont Message Situations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contact Messages'), ['controller' => 'ContactMessages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contact Message'), ['controller' => 'ContactMessages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contMessageSituations form large-9 medium-8 columns content">
    <?= $this->Form->create($contMessageSituation) ?>
    <fieldset>
        <legend><?= __('Add Cont Message Situation') ?></legend>
        <?php
            echo $this->Form->control('name_message_situation');
            echo $this->Form->control('colors_id', ['options' => $colors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
