<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity
 *
 * @property int $id
 * @property string $name
 * @property int $statecode
 * @property string $state
 *
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\Merchant[] $merchants
 * @property \App\Model\Entity\Supplier[] $suppliers
 */
class City extends Entity
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
        'name' => true,
        'statecode' => true,
        'state' => true,
        'addresses' => true,
        'merchants' => true,
        'suppliers' => true,
    ];
}
