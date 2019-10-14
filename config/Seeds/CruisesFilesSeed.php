<?php
use Migrations\AbstractSeed;

/**
 * CruisesFiles seed.
 */
class CruisesFilesSeed extends AbstractSeed
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
                'cruise_id' => '3',
                'file_id' => '13',
            ],
            [
                'id' => '2',
                'cruise_id' => '2',
                'file_id' => '14',
            ],
            [
                'id' => '3',
                'cruise_id' => '3',
                'file_id' => '15',
            ],
            [
                'id' => '4',
                'cruise_id' => '2',
                'file_id' => '16',
            ],
        ];

        $table = $this->table('cruises_files');
        $table->insert($data)->save();
    }
}
