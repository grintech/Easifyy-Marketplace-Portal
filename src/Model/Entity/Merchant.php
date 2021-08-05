<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Merchant Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $store_name
 * @property string $username
 * @property string|null $slug
 * @property int|null $state_id
 * @property int|null $city_id
 * @property int|null $category_id
 * @property string|null $gst_number
 * @property string|null $pan_number
 * @property string|null $license_number
 * @property string|null $institute_name
 * @property string|null $address_line_1
 * @property string|null $address_line_2
 * @property string|null $locality
 * @property string|null $zip_code
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $store_pic
 * @property string|null $phone_1
 * @property string|null $phone_2
 * @property string|null $phone_3
 * @property string|null $fax
 * @property float|null $minimum_order
 * @property float|null $delivery_charges
 * @property string|null $deliver_time
 * @property string|null $payment_method
 * @property string|null $delivery_slot
 * @property string|null $delivery_type
 * @property float|null $commission
 * @property bool|null $status
 * @property int $delete_status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\BankAccount[] $bank_accounts
 * @property \App\Model\Entity\CartItem[] $cart_items
 * @property \App\Model\Entity\Coupon[] $coupons
 * @property \App\Model\Entity\Kyc[] $kyc
 * @property \App\Model\Entity\MerchantGallery[] $merchant_galleries
 * @property \App\Model\Entity\MerchantPayout[] $merchant_payouts
 * @property \App\Model\Entity\MerchantProduct[] $merchant_products
 * @property \App\Model\Entity\MerchantTransaction[] $merchant_transactions
 * @property \App\Model\Entity\OrderNotification[] $order_notifications
 * @property \App\Model\Entity\OrderPayment[] $order_payments
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Purchase[] $purchases
 * @property \App\Model\Entity\Review[] $reviews
 * @property \App\Model\Entity\Supplier[] $suppliers
 * @property \App\Model\Entity\Wishlist[] $wishlists
 */
class Merchant extends Entity
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
        'user_id' => true,
        'name_prefix'=>true,
        'store_name' => true,
        'username' => true,
        'last_name'=>true,
        'billing_name'=>true,
        'slug' => true,
        'state_id' => true,
        'city_id' => true,
        'category_id' => true,
        'service-profession'=>true,
        'gst_number' => true,
        'pan_number' => true,
        'cin_number' => true,
        'license_number' => true,
        'institute_name' => true,
        'address_line_1' => true,
        'address_line_2' => true,
        'locality' => true,
        'zip_code' => true,
        'latitude' => true,
        'longitude' => true,
        'store_pic' => true,
        'phone_1' => true,
        'phone_2' => true,
        'phone_3' => true,
        'fax' => true,
        'minimum_order' => true,
        'delivery_charges' => true,
        'deliver_time' => true,
        'payment_method' => true,
        'delivery_slot' => true,
        'delivery_type' => true,
        'commission' => true,
        'status' => true,
        'delete_status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'state' => true,
        'city' => true,
        'category' => true,
        'bank_accounts' => true,
        'cart_items' => true,
        'coupons' => true,
        'kyc' => true,
        'merchant_galleries' => true,
        'merchant_payouts' => true,
        'merchant_products' => true,
        'merchant_transactions' => true,
        'order_notifications' => true,
        'order_payments' => true,
        'orders' => true,
        'purchases' => true,
        'reviews' => true,
        'suppliers' => true,
        'wishlists' => true,
        'sop'=>true,
    ];
}
