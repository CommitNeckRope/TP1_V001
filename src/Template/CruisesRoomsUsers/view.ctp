<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CruisesRoomsUser $cruisesRoomsUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cruises Rooms User'), ['action' => 'edit', $cruisesRoomsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cruises Rooms User'), ['action' => 'delete', $cruisesRoomsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cruisesRoomsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cruises Rooms Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cruises Rooms User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cruises'), ['controller' => 'Cruises', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cruise'), ['controller' => 'Cruises', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cruisesRoomsUsers view large-9 medium-8 columns content">
    <h3><?= h($cruisesRoomsUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cruise') ?></th>
            <td><?= $cruisesRoomsUser->has('cruise') ? $this->Html->link($cruisesRoomsUser->cruise->id, ['controller' => 'Cruises', 'action' => 'view', $cruisesRoomsUser->cruise->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $cruisesRoomsUser->has('user') ? $this->Html->link($cruisesRoomsUser->user->id, ['controller' => 'Users', 'action' => 'view', $cruisesRoomsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Room') ?></th>
            <td><?= $cruisesRoomsUser->has('room') ? $this->Html->link($cruisesRoomsUser->room->id, ['controller' => 'Rooms', 'action' => 'view', $cruisesRoomsUser->room->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cruisesRoomsUser->id) ?></td>
        </tr>
    </table>
</div>
