<div class="cruises view large-9 medium-8 columns content">
    <h3><?= h($cruise->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id:') ?></th>
            <td><?= h($cruise->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start date:') ?></th>
            <td><?= h($cruise->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End date:') ?></th>
            <td><?= h($cruise->end_date) ?></td>
        </tr>
    </table>

    <div class="related">
        <h4><?= __('Related rooms') ?></h4>
        <?php if (!empty($cruise->rooms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Room name') ?></th>
                <th scope="col"><?= __('Other details') ?></th>
            </tr>
            <?php foreach ($cruise->rooms as $rooms): ?>
            <tr>
                <td><?= h($rooms->room_name) ?></td>

                <td><?= h($rooms->other_details) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
