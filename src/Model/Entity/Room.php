<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Room Entity
 *
 * @property int $id
 * @property int $cruise_id
 * @property int $ref_room_category_id
 * @property string $room_name
 * @property string $other_details
 *
 * @property \App\Model\Entity\Cruise $cruise
 * @property \App\Model\Entity\RefRoomCategory $ref_room_category
 * @property \App\Model\Entity\CruisesRoomsUser[] $cruises_rooms_users
 */
class Room extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'cruise_id' => true,
        'ref_room_category_id' => true,
        'room_name' => true,
        'other_details' => true,
        'cruise' => true,
        'ref_room_category' => true,
        'cruises_rooms_users' => true
    ];
}
