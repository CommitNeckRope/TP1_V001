<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CruisesRoomsUsersFixture
 */
class CruisesRoomsUsersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'cruise_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'room_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_cruise' => ['type' => 'index', 'columns' => ['cruise_id'], 'length' => []],
            'id_passenger' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'id_room' => ['type' => 'index', 'columns' => ['room_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'cruises_rooms_users_ibfk_1' => ['type' => 'foreign', 'columns' => ['cruise_id'], 'references' => ['cruises', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'cruises_rooms_users_ibfk_3' => ['type' => 'foreign', 'columns' => ['room_id'], 'references' => ['rooms', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'cruises_rooms_users_ibfk_4' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'cruise_id' => 1,
                'user_id' => 1,
                'room_id' => 1
            ],
        ];
        parent::init();
    }
}
