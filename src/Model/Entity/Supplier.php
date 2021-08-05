<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Supplier Entity
 *
 * @property int $id
 * @property int $merchant_id
 * @property int|null $state_id
 * @property int|null $city_id
 * @property string $_name
 * @property string|null $email
 * @property string|null $gst_no
 * @property string|null $license_number
 * @property string|null $address
 * @property string|null $pan
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Purchase[] $purchases
 */
class Supplier extends Entity
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
        'merchant_id' => true,
        'state_id' => true,
        'city_id' => true,
        '_name' => true,
        'email' => true,
        'gst_no' => true,
        'license_number' => true,
        'address' => true,
        'pan' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'merchant' => true,
        'state' => true,
        'city' => true,
        'purchases' => true,
    ];
}
