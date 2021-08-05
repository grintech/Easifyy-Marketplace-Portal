<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductBundledItem Entity
 *
 * @property int $id
 * @property int $bundled_parent
 * @property int $product_id
 * @property float|null $price
 * @property int|null $quantity
 * @property float|null $total_price
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Product $product
 */
class ProductBundledItem extends Entity
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
        'product_id' => true,
        'price' => true,
        'quantity' => true,
        'total_price' => true,
        'created' => true,
        'product' => true,
    ];
}
