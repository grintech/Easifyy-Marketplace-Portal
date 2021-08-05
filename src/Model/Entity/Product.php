<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int|null $product_type_id
 * @property int|null $parent_id
 * @property string $title
 * @property string|null $_title_desc
 * @property string|null $menu_title
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $service_coverd
 * @property string|null $service_target
 * @property string|null $service_process
 * @property string|null $service_guide
 * @property string|null $offer_box
 * @property float|null $_cgst
 * @property float|null $_igst
 * @property float|null $_sgst
 * @property bool|null $_is_taxable
 * @property float|null $_commission
 * @property float|null $_basic_price
 * @property float|null $_standard_price
 * @property float|null $_premium_price
 * @property float|null $_basic_plan_price
 * @property float|null $_standard_plan_price
 * @property float|null $_premium_plan_price
 * @property float|null $_basic_booking_price
 * @property float|null $_standard_booking_price
 * @property float|null $_premium_booking_price
 * @property int|null $_basic_commission
 * @property int|null $_standard_commission
 * @property int|null $_premium_commission
 * @property string|null $b_commssion_oprator
 * @property int $b_commssion_add
 * @property string|null $s_commssion_oprator
 * @property int $s_commssion_add
 * @property string|null $p_commssion_oprator
 * @property int $p_commssion_add
 * @property int|null $_basic_gst
 * @property int|null $_standard_gst
 * @property int|null $_premium_gst
 * @property bool|null $_basic_gst_show
 * @property bool|null $_standard_gst_show
 * @property bool|null $_premium_gst_show
 * @property string|null $_basic_price_desc
 * @property string|null $_standard_price_desc
 * @property string|null $_premium_price_desc
 * @property int|null $_basic_plan_time
 * @property int|null $_standard_plan_time
 * @property int|null $_premium_plan_time
 * @property int $author
 * @property int|null $status
 * @property int|null $is_addon
 * @property int $delete_status
 * @property \Cake\I18n\FrozenTime|null $published_on
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ProductType $product_type
 * @property \App\Model\Entity\Product $parent_product
 * @property \App\Model\Entity\MerchantProduct[] $merchant_products
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\ProductBrand[] $product_brands
 * @property \App\Model\Entity\ProductBundledItem[] $product_bundled_items
 * @property \App\Model\Entity\ProductCategory[] $product_categories
 * @property \App\Model\Entity\ProductFaq[] $product_faq
 * @property \App\Model\Entity\ProductGallery[] $product_galleries
 * @property \App\Model\Entity\ProductPlan[] $product_plans
 * @property \App\Model\Entity\ProductSellerPlan[] $product_seller_plans
 * @property \App\Model\Entity\Product[] $child_products
 */
class Product extends Entity
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
        'product_type_id' => true,
        'parent_id' => true,
        'sac_code' => true,
        'meta_title' => true,
        'meta_description' => true,
        'focus_keywords' => true,
        'title' => true,
        '_title_desc' => true,
        'menu_title' => true,
        'slug' => true,
        'description' => true,
        'service_coverd' => true,
        'service_target' => true,
        'service_process' => true,
        'service_guide' => true,
        'offer_box' => true,
        '_cgst' => true,
        '_igst' => true,
        '_sgst' => true,
        '_is_taxable' => true,
        '_commission' => true,
        '_basic_price' => true,
        '_standard_price' => true,
        '_premium_price' => true,
        '_basic_plan_price' => true,
        '_standard_plan_price' => true,
        '_premium_plan_price' => true,
        '_basic_booking_price' => true,
        '_standard_booking_price' => true,
        '_premium_booking_price' => true,
        '_basic_commission' => true,
        '_standard_commission' => true,
        '_premium_commission' => true,
        'b_commssion_oprator' => true,
        'b_commssion_add' => true,
        's_commssion_oprator' => true,
        's_commssion_add' => true,
        'p_commssion_oprator' => true,
        'p_commssion_add' => true,
        '_basic_gst' => true,
        '_standard_gst' => true,
        '_premium_gst' => true,
        '_basic_gst_show' => true,
        '_standard_gst_show' => true,
        '_premium_gst_show' => true,
        '_basic_price_desc' => true,
        '_standard_price_desc' => true,
        '_premium_price_desc' => true,
        '_basic_plan_time' => true,
        '_standard_plan_time' => true,
        '_premium_plan_time' => true,
        'author' => true,
        'status' => true,
        'is_addon' => true,
        'is_active' => true,
        'delete_status' => true,
        'published_on' => true,
        'created' => true,
        'modified' => true,
        'product_type' => true,
        'parent_product' => true,
        'merchant_products' => true,
        'orders' => true,
        'product_brands' => true,
        'product_bundled_items' => true,
        'product_categories' => true,
        'product_faq' => true,
        'product_galleries' => true,
        'product_plans' => true,
        'product_seller_plans' => true,
        'child_products' => true,
        'show_popular_professional_services' => true,
        'show_in_featured' => true,
        'gst_show' => true,
    ];
}
