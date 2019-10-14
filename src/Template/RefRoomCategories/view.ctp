<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefRoomCategory $refRoomCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ref Room Category'), ['action' => 'edit', $refRoomCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ref Room Category'), ['action' => 'delete', $refRoomCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refRoomCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ref Room Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Room Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="refRoomCategories view large-9 medium-8 columns content">
    <h3><?= h($refRoomCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Room Category Description') ?></th>
            <td><?= h($refRoomCategory->room_category_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($refRoomCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cruise Charge') ?></th>
            <td><?= $this->Number->format($refRoomCategory->cruise_charge) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Daily Gratuity Rate') ?></th>
            <td><?= $this->Number->format($refRoomCategory->daily_gratuity_rate) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rooms') ?></h4>
        <?php if (!empty($refRoomCategory->rooms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cruise Id') ?></th>
                <th scope="col"><?= __('Ref Room Category Id') ?></th>
                <th scope="col"><?= __('Room Name') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($refRoomCategory->rooms as $rooms): ?>
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
