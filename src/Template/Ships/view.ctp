<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ship $ship
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ship'), ['action' => 'edit', $ship->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ship'), ['action' => 'delete', $ship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ship->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ships'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ship'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cruises'), ['controller' => 'Cruises', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cruise'), ['controller' => 'Cruises', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ships view large-9 medium-8 columns content">
    <h3><?= h($ship->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ship Name') ?></th>
            <td><?= h($ship->ship_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Details') ?></th>
            <td><?= h($ship->other_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ship->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cruises') ?></h4>
        <?php if (!empty($ship->cruises)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ship Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ship->cruises as $cruises): ?>
            <tr>
                <td><?= h($cruises->id) ?></td>
                <td><?= h($cruises->ship_id) ?></td>
                <td><?= h($cruises->start_date) ?></td>
                <td><?= h($cruises->end_date) ?></td>
                <td><?= h($cruises->other_details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cruises', 'action' => 'view', $cruises->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cruises', 'action' => 'edit', $cruises->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cruises', 'action' => 'delete', $cruises->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cruises->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
