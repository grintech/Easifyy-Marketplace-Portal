<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MerchantProductBundledItem Entity
 *
 * @property int $id
 * @property int $bundled_parent
 * @property int $merchant_product_id
 * @property float|null $mrp
 * @property float|null $price
 * @property int|null $quantity
 * @property float|null $total_price
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\MerchantProduct $merchant_product
 */
class MerchantProductBundledItem extends Entity
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
        'bundled_parent' => true,
        'merchant_product_id' => true,
        'mrp' => true,
        'price' => true,
        'quantity' => true,
        'total_price' => true,
        'created' => true,
        'merchant_product' => true,
    ];
}
