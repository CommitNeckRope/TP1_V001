<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ship[]|\Cake\Collection\CollectionInterface $ships
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ship'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cruises'), ['controller' => 'Cruises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cruise'), ['controller' => 'Cruises', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ships index large-9 medium-8 columns content">
    <h3><?= __('Ships') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ship_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ships as $ship): ?>
            <tr>
                <td><?= $this->Number->format($ship->id) ?></td>
                <td><?= h($ship->ship_name) ?></td>
                <td><?= h($ship->other_details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ship->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ship->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ship->id)]) ?>
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
