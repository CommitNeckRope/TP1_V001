<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<?php
$urlToRoomtypeAutocompleteJson = $this->Url->build([
    "controller" => "Roomtype",
    "action" => "findType",
    "_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToRoomtypeAutocompleteJson . '";', ['block' => true]);
echo $this->Html->script('Roomtype/autocomplete', ['block' => 'scriptBottom']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cruises'), ['controller' => 'Cruises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cruise'), ['controller' => 'Cruises', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ref Room Categories'), ['controller' => 'RefRoomCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Room Category'), ['controller' => 'RefRoomCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cruises Rooms Users'), ['controller' => 'CruisesRoomsUsers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cruises Rooms User'), ['controller' => 'CruisesRoomsUsers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rooms form large-9 medium-8 columns content">
    <?= $this->Form->create($room) ?>
    <fieldset>
        <legend><?= __('Add Room') ?></legend>
        <?php
            echo $this->Form->control('cruise_id', ['options' => $cruises]);
            echo $this->Form->control('ref_room_category_id', ['options' => $refRoomCategories]);
            echo $this->Form->control('room_name');
            echo $this->Form->input('Roomtype', ['id' => 'autocomplete']);
            echo $this->Form->control('other_details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
