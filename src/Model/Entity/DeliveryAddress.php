<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DeliveryAddress Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $city_id
 * @property int|null $state_id
 * @property string|null $first_name
 * @property string|null $address_line_1
 * @property string|null $address_line_2
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $zip_code
 * @property string|null $phone_1
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Order[] $orders
 */
class DeliveryAddress extends Entity
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
        'user_id' => true,
        'city_id' => true,
        'state_id' => true,
        'first_name' => true,
        'address_line_1' => true,
        'address_line_2' => true,
        'latitude' => true,
        'longitude' => true,
        'zip_code' => true,
        'phone_1' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'city' => true,
        'state' => true,
        'orders' => true,
    ];
}
