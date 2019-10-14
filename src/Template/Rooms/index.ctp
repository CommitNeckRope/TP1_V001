<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room[]|\Cake\Collection\CollectionInterface $rooms
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cruises'), ['controller' => 'Cruises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cruise'), ['controller' => 'Cruises', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ref Room Categories'), ['controller' => 'RefRoomCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Room Category'), ['controller' => 'RefRoomCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cruises Rooms Users'), ['controller' => 'CruisesRoomsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cruises Rooms User'), ['controller' => 'CruisesRoomsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rooms index large-9 medium-8 columns content">
    <h3><?= __('Rooms') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cruise_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ref_room_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('room_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?= $this->Number->format($room->id) ?></td>
                <td><?= $room->has('cruise') ? $this->Html->link($room->cruise->id, ['controller' => 'Cruises', 'action' => 'view', $room->cruise->id]) : '' ?></td>
                <td><?= $room->has('ref_room_category') ? $this->Html->link($room->ref_room_category->id, ['controller' => 'RefRoomCategories', 'action' => 'view', $room->ref_room_category->id]) : '' ?></td>
                <td><?= h($room->room_name) ?></td>
                <td><?= h($room->other_details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $room->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $room->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?>
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
