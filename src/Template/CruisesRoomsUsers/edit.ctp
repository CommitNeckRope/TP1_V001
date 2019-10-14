<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CruisesRoomsUser $cruisesRoomsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cruisesRoomsUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cruisesRoomsUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cruises Rooms Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cruises'), ['controller' => 'Cruises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cruise'), ['controller' => 'Cruises', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cruisesRoomsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($cruisesRoomsUser) ?>
    <fieldset>
        <legend><?= __('Edit Cruises Rooms User') ?></legend>
        <?php
            echo $this->Form->control('cruise_id', ['options' => $cruises]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('room_id', ['options' => $rooms]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
