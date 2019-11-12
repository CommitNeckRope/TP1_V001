<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ville $ville
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ville'), ['action' => 'edit', $ville->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ville'), ['action' => 'delete', $ville->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ville->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ville'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ville'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pays'), ['controller' => 'Pays', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay'), ['controller' => 'Pays', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ville view large-9 medium-8 columns content">
    <h3><?= h($ville->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Pay') ?></th>
            <td><?= $ville->has('pay') ? $this->Html->link($ville->pay->name, ['controller' => 'Pays', 'action' => 'view', $ville->pay->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($ville->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ville->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cruises') ?></h4>
        <?php if (!empty($ville->cruises)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Ship Id') ?></th>
                    <th scope="col"><?= __('Start Date') ?></th>
                    <th scope="col"><?= __('End Date') ?></th>
                    <th scope="col"><?= __('Other Details') ?></th>
                    <th scope="col"><?= __('Ville Id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($ville->cruises as $cruises): ?>
                    <tr>
                        <td><?= h($cruises->id) ?></td>
                        <td><?= h($cruises->user_id) ?></td>
                        <td><?= h($cruises->title) ?></td>
                        <td><?= h($cruises->slug) ?></td>
                        <td><?= h($cruises->body) ?></td>
                        <td><?= h($cruises->published) ?></td>
                        <td><?= h($cruises->created) ?></td>
                        <td><?= h($cruises->modified) ?></td>
                        <td><?= h($cruises->ville_id) ?></td>
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
