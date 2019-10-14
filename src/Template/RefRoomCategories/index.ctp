<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefRoomCategory[]|\Cake\Collection\CollectionInterface $refRoomCategories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ref Room Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refRoomCategories index large-9 medium-8 columns content">
    <h3><?= __('Ref Room Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cruise_charge') ?></th>
                <th scope="col"><?= $this->Paginator->sort('daily_gratuity_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('room_category_description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($refRoomCategories as $refRoomCategory): ?>
            <tr>
                <td><?= $this->Number->format($refRoomCategory->id) ?></td>
                <td><?= $this->Number->format($refRoomCategory->cruise_charge) ?></td>
                <td><?= $this->Number->format($refRoomCategory->daily_gratuity_rate) ?></td>
                <td><?= h($refRoomCategory->room_category_description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $refRoomCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $refRoomCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $refRoomCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refRoomCategory->id)]) ?>
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
