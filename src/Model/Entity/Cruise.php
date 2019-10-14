<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cruise Entity
 *
 * @property int $id
 * @property int $ship_id
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenDate $end_date
 * @property string $other_details
 *
 * @property \App\Model\Entity\Ship $ship
 * @property \App\Model\Entity\CruisesRoomsUser[] $cruises_rooms_users
 * @property \App\Model\Entity\Room[] $rooms
 */
class Cruise extends Entity
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
        'ship_id' => true,
        'start_date' => true,
        'end_date' => true,
        'other_details' => true,
        'ship' => true,
        'cruises_rooms_users' => true,
        'rooms' => true
    ];
}
