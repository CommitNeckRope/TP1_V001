<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Roomtype $roomtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $roomtype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $roomtype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Roomtype'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="roomtype form large-9 medium-8 columns content">
    <?= $this->Form->create($roomtype) ?>
    <fieldset>
        <legend><?= __('Edit Roomtype') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
