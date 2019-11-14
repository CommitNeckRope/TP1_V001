<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Ville",
    "action" => "getByPays",
    "_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Cruises/add', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cruise $cruise
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cruise->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cruise->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cruises'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ships'), ['controller' => 'Ships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ship'), ['controller' => 'Ships', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cruises Rooms Users'), ['controller' => 'CruisesRoomsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cruises Rooms User'), ['controller' => 'CruisesRoomsUsers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cruises form large-9 medium-8 columns content">
    <?= $this->Form->create($cruise) ?>
    <fieldset>
        <legend><?= __('Edit Cruise') ?></legend>
        <?php
                echo $this->Form->control('Pays_id', ['options' => $pays]);
                echo $this->Form->control('Ville_id', ['options' => $ville]);
            echo $this->Form->control('ship_id', ['options' => $ships]);
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('other_details');
            echo $this->Form->control('files._ids', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
