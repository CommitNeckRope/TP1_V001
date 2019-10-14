<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cruises'), ['controller' => 'Cruises', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cruise'), ['controller' => 'Cruises', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ref Room Categories'), ['controller' => 'RefRoomCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Room Category'), ['controller' => 'RefRoomCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cruises Rooms Users'), ['controller' => 'CruisesRoomsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cruises Rooms User'), ['controller' => 'CruisesRoomsUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rooms view large-9 medium-8 columns content">
    <h3><?= h($room->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cruise') ?></th>
            <td><?= $room->has('cruise') ? $this->Html->link($room->cruise->id, ['controller' => 'Cruises', 'action' => 'view', $room->cruise->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ref Room Category') ?></th>
            <td><?= $room->has('ref_room_category') ? $this->Html->link($room->ref_room_category->id, ['controller' => 'RefRoomCategories', 'action' => 'view', $room->ref_room_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Room Name') ?></th>
            <td><?= h($room->room_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Details') ?></th>
            <td><?= h($room->other_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($room->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cruises Rooms Users') ?></h4>
        <?php if (!empty($room->cruises_rooms_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cruise Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Room Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($room->cruises_rooms_users as $cruisesRoomsUsers): ?>
            <tr>
                <td><?= h($cruisesRoomsUsers->id) ?></td>
                <td><?= h($cruisesRoomsUsers->cruise_id) ?></td>
                <td><?= h($cruisesRoomsUsers->user_id) ?></td>
                <td><?= h($cruisesRoomsUsers->room_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CruisesRoomsUsers', 'action' => 'view', $cruisesRoomsUsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CruisesRoomsUsers', 'action' => 'edit', $cruisesRoomsUsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CruisesRoomsUsers', 'action' => 'delete', $cruisesRoomsUsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cruisesRoomsUsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
