<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cruise $cruise
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cruise'), ['action' => 'edit', $cruise->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cruise'), ['action' => 'delete', $cruise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cruise->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cruises'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cruise'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ships'), ['controller' => 'Ships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ship'), ['controller' => 'Ships', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cruises Rooms Users'), ['controller' => 'CruisesRoomsUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cruises Rooms User'), ['controller' => 'CruisesRoomsUsers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cruises view large-9 medium-8 columns content">
    <h3><?= h($cruise->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ship') ?></th>
            <td><?= $cruise->has('ship') ? $this->Html->link($cruise->ship->id, ['controller' => 'Ships', 'action' => 'view', $cruise->ship->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Details') ?></th>
            <td><?= h($cruise->other_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cruise->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($cruise->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($cruise->end_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cruises Rooms Users') ?></h4>
        <?php if (!empty($cruise->cruises_rooms_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cruise Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Room Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cruise->cruises_rooms_users as $cruisesRoomsUsers): ?>
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
    <div class="related">
        <h4><?= __('Related Rooms') ?></h4>
        <?php if (!empty($cruise->rooms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cruise Id') ?></th>
                <th scope="col"><?= __('Ref Room Category Id') ?></th>
                <th scope="col"><?= __('Room Name') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cruise->rooms as $rooms): ?>
            <tr>
                <td><?= h($rooms->id) ?></td>
                <td><?= h($rooms->cruise_id) ?></td>
                <td><?= h($rooms->ref_room_category_id) ?></td>
                <td><?= h($rooms->room_name) ?></td>
                <td><?= h($rooms->other_details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rooms', 'action' => 'view', $rooms->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rooms', 'action' => 'edit', $rooms->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rooms', 'action' => 'delete', $rooms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rooms->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
