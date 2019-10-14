<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefRoomCategory $refRoomCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $refRoomCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $refRoomCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ref Room Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refRoomCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($refRoomCategory) ?>
    <fieldset>
        <legend><?= __('Edit Ref Room Category') ?></legend>
        <?php
            echo $this->Form->control('cruise_charge');
            echo $this->Form->control('daily_gratuity_rate');
            echo $this->Form->control('room_category_description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
