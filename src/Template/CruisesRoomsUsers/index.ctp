<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CruisesRoomsUser[]|\Cake\Collection\CollectionInterface $cruisesRoomsUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cruises Rooms User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cruises'), ['controller' => 'Cruises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cruise'), ['controller' => 'Cruises', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cruisesRoomsUsers index large-9 medium-8 columns content">
    <h3><?= __('Cruises Rooms Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cruise_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('room_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cruisesRoomsUsers as $cruisesRoomsUser): ?>
            <tr>
                <td><?= $this->Number->format($cruisesRoomsUser->id) ?></td>
                <td><?= $cruisesRoomsUser->has('cruise') ? $this->Html->link($cruisesRoomsUser->cruise->id, ['controller' => 'Cruises', 'action' => 'view', $cruisesRoomsUser->cruise->id]) : '' ?></td>
                <td><?= $cruisesRoomsUser->has('user') ? $this->Html->link($cruisesRoomsUser->user->id, ['controller' => 'Users', 'action' => 'view', $cruisesRoomsUser->user->id]) : '' ?></td>
                <td><?= $cruisesRoomsUser->has('room') ? $this->Html->link($cruisesRoomsUser->room->id, ['controller' => 'Rooms', 'action' => 'view', $cruisesRoomsUser->room->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cruisesRoomsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cruisesRoomsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cruisesRoomsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cruisesRoomsUser->id)]) ?>
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
