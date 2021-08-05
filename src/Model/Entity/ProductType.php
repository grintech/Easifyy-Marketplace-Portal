<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductType Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\MerchantProduct[] $merchant_products
 * @property \App\Model\Entity\Product[] $products
 */
class ProductType extends Entity
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
        'created' => true,
        'merchant_products' => true,
        'products' => true,
    ];
}
