<?php
use Migrations\AbstractSeed;

/**
 * CruisesRoomsUsers seed.
 */
class CruisesRoomsUsersSeed extends AbstractSeed
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
        ];

        $table = $this->table('cruises_rooms_users');
        $table->insert($data)->save();
    }
}
