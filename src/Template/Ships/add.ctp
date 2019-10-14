<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ship $ship
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ships'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cruises'), ['controller' => 'Cruises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cruise'), ['controller' => 'Cruises', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ships form large-9 medium-8 columns content">
    <?= $this->Form->create($ship) ?>
    <fieldset>
        <legend><?= __('Add Ship') ?></legend>
        <?php
            echo $this->Form->control('ship_name');
            echo $this->Form->control('other_details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
