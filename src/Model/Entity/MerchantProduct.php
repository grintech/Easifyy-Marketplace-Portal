<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MerchantProduct Entity
 *
 * @property int $id
 * @property int $merchant_id
 * @property int $product_id
 * @property int $product_type_id
 * @property int|null $parent_id
 * @property string $title
 * @property string|null $slug
 * @property string|null $description
 * @property float|null $_price
 * @property float|null $_sale_price
 * @property float|null $_weight
 * @property string|null $product_unit_id
 * @property int|null $_stock
 * @property string|null $_bar_code
 * @property string|null $_hsn_code
 * @property string|null $_item_code
 * @property string|null $_sku
 * @property float|null $_cgst
 * @property float|null $_igst
 * @property float|null $_sgst
 * @property bool|null $_tax_inclusive
 * @property bool|null $_is_taxable
 * @property \Cake\I18n\FrozenTime|null $published_on
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\ProductType $product_type
 * @property \App\Model\Entity\MerchantProduct $parent_merchant_product
 * @property \App\Model\Entity\ProductUnit $product_unit
 * @property \App\Model\Entity\CartItem[] $cart_items
 * @property \App\Model\Entity\MerchantProductBrand[] $merchant_product_brands
 * @property \App\Model\Entity\MerchantProductBundledItem[] $merchant_product_bundled_items
 * @property \App\Model\Entity\MerchantProductCategory[] $merchant_product_categories
 * @property \App\Model\Entity\MerchantProductGallery[] $merchant_product_galleries
 * @property \App\Model\Entity\MerchantProduct[] $child_merchant_products
 * @property \App\Model\Entity\OrderItem[] $order_items
 * @property \App\Model\Entity\PurchaseItem[] $purchase_items
 * @property \App\Model\Entity\Wishlist[] $wishlists
 */
class MerchantProduct extends Entity
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
        'product_id' => true,
        'product_type_id' => true,
        'parent_id' => true,
        'title' => true,
        'slug' => true,
        'description' => true,
        '_price' => true,
        '_sale_price' => true,
        '_weight' => true,
        'product_unit_id' => true,
        '_stock' => true,
        '_bar_code' => true,
        '_hsn_code' => true,
        '_item_code' => true,
        '_sku' => true,
        '_cgst' => true,
        '_igst' => true,
        '_sgst' => true,
        '_tax_inclusive' => true,
        '_is_taxable' => true,
        'published_on' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'merchant' => true,
        'product' => true,
        'product_type' => true,
        'parent_merchant_product' => true,
        'product_unit' => true,
        'cart_items' => true,
        'merchant_product_brands' => true,
        'merchant_product_bundled_items' => true,
        'merchant_product_categories' => true,
        'merchant_product_galleries' => true,
        'child_merchant_products' => true,
        'order_items' => true,
        'purchase_items' => true,
        'wishlists' => true,
    ];
}
