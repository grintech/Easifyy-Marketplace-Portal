<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Runner Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $gender
 * @property \Cake\I18n\FrozenDate|null $dob
 * @property string|null $address
 * @property int|null $phone_no
 * @property string|null $vehicle_no
 * @property string|null $current_locatioin
 * @property string|null $loc_lat
 * @property string|null $loc_long
 * @property string|null $profile_pic
 * @property \Cake\I18n\FrozenTime|null $last_login
 * @property bool|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\RunnerDeliveryRequest[] $runner_delivery_requests
 */
class Runner extends Entity
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
        'gender' => true,
        'dob' => true,
        'address' => true,
        'phone_no' => true,
        'vehicle_no' => true,
        'current_locatioin' => true,
        'loc_lat' => true,
        'loc_long' => true,
        'profile_pic' => true,
        'last_login' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'orders' => true,
        'runner_delivery_requests' => true,
    ];
}
