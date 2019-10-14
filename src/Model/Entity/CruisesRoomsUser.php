<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CruisesRoomsUser Entity
 *
 * @property int $id
 * @property int $cruise_id
 * @property int $user_id
 * @property int $room_id
 *
 * @property \App\Model\Entity\Cruise $cruise
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Room $room
 */
class CruisesRoomsUser extends Entity
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
        'user_id' => true,
        'room_id' => true,
        'cruise' => true,
        'user' => true,
        'room' => true
    ];
}
