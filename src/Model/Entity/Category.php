<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 * @property string $description
 * @property string $slug
 * @property string $image
 * @property bool|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Category $parent_category
 * @property \App\Model\Entity\Category[] $child_categories
 * @property \App\Model\Entity\MerchantProductCategory[] $merchant_product_categories
 * @property \App\Model\Entity\ProductCategory[] $product_categories
 */
class Category extends Entity
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
        'user_id'=>true,
        'parent_id' => true,
        'description' => true,
        'slug' => true,
        'menuOrder'=>true,
        'image' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'parent_category' => true,
        'child_categories' => true,
        'merchant_product_categories' => true,
        'product_categories' => true,
        'show_in_our_service' => true,
        'show_in_footer'    => true,
    ];
}
