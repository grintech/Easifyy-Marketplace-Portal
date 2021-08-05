<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Brand Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $slug
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\MerchantProductBrand[] $merchant_product_brands
 * @property \App\Model\Entity\ProductBrand[] $product_brands
 */
class Brand extends Entity
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
        'slug' => true,
        'created' => true,
        'merchant_product_brands' => true,
        'product_brands' => true,
    ];
}
