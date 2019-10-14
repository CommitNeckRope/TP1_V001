<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('cruises')
            ->addColumn('ship_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('start_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('end_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('other_details', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addIndex(
                [
                    'ship_id',
                ]
            )
            ->create();

        $this->table('cruises_files')
            ->addColumn('cruise_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('file_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('cruises_rooms_users')
            ->addColumn('cruise_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('room_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'cruise_id',
                ]
            )
            ->addIndex(
                [
                    'room_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('files')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('path', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('status', 'boolean', [
                'comment' => '1 = Active, 0 = Inactive',
                'default' => true,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('ref_room_categories')
            ->addColumn('cruise_charge', 'float', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('daily_gratuity_rate', 'float', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('room_category_description', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('rooms')
            ->addColumn('cruise_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('ref_room_category_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('room_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('other_details', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addIndex(
                [
                    'cruise_id',
                ]
            )
            ->addIndex(
                [
                    'ref_room_category_id',
                ]
            )
            ->create();

        $this->table('ships')
            ->addColumn('ship_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('other_details', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('users')
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('cruises')
            ->addForeignKey(
                'ship_id',
                'ships',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('cruises_rooms_users')
            ->addForeignKey(
                'cruise_id',
                'cruises',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'room_id',
                'rooms',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('rooms')
            ->addForeignKey(
                'cruise_id',
                'cruises',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'ref_room_category_id',
                'ref_room_categories',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('cruises')
            ->dropForeignKey(
                'ship_id'
            )->save();

        $this->table('cruises_rooms_users')
            ->dropForeignKey(
                'cruise_id'
            )
            ->dropForeignKey(
                'room_id'
            )
            ->dropForeignKey(
                'user_id'
            )->save();

        $this->table('rooms')
            ->dropForeignKey(
                'cruise_id'
            )
            ->dropForeignKey(
                'ref_room_category_id'
            )->save();

        $this->table('cruises')->drop()->save();
        $this->table('cruises_files')->drop()->save();
        $this->table('cruises_rooms_users')->drop()->save();
        $this->table('files')->drop()->save();
        $this->table('ref_room_categories')->drop()->save();
        $this->table('rooms')->drop()->save();
        $this->table('ships')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
