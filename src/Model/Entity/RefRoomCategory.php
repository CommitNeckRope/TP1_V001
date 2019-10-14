<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RefRoomCategory Entity
 *
 * @property int $id
 * @property float $cruise_charge
 * @property float $daily_gratuity_rate
 * @property string $room_category_description
 *
 * @property \App\Model\Entity\Room[] $rooms
 */
class RefRoomCategory extends Entity
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
        'cruise_charge' => true,
        'daily_gratuity_rate' => true,
        'room_category_description' => true,
        'rooms' => true
    ];
}
