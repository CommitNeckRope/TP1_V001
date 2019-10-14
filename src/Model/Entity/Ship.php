<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ship Entity
 *
 * @property int $id
 * @property string $ship_name
 * @property string $other_details
 *
 * @property \App\Model\Entity\Cruise[] $cruises
 */
class Ship extends Entity
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
        'ship_name' => true,
        'other_details' => true,
        'cruises' => true
    ];
}
