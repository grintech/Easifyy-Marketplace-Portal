<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MerchantProductCategory Entity
 *
 * @property int $id
 * @property int $merchant_product_id
 * @property int $category_id
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\MerchantProduct $merchant_product
 * @property \App\Model\Entity\Category $category
 */
class MerchantProductCategory extends Entity
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
        'merchant_product_id' => true,
        'category_id' => true,
        'created' => true,
        'merchant_product' => true,
        'category' => true,
    ];
}
