<?php
use Migrations\AbstractSeed;

/**
 * Cruises seed.
 */
class CruisesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'ship_id' => '1',
                'start_date' => '2019-10-03',
                'end_date' => '2019-10-10',
                'other_details' => ':)',
            ],
            [
                'id' => '2',
                'ship_id' => '1',
                'start_date' => '2019-10-12',
                'end_date' => '2019-10-23',
                'other_details' => 'tg',
            ],
            [
                'id' => '3',
                'ship_id' => '1',
                'start_date' => '2019-10-07',
                'end_date' => '2019-10-12',
                'other_details' => 'zdfhzdfh',
            ],
        ];

        $table = $this->table('cruises');
        $table->insert($data)->save();
    }
}
