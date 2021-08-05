<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Coupon Entity
 *
 * @property int $id
 * @property int|null $merchant_id
 * @property string $coupon_code
 * @property string $discount
 * @property string $discount_type
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime|null $expire
 * @property int|null $user_usage_limit
 * @property int $usage_limit
 * @property int $minimum_spend
 * @property int $maximum_spend
 * @property int|null $max_amount
 * @property int|null $usage_count
 * @property int|null $coupon_applicable
 * @property bool $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\CouponRedeem[] $coupon_redeems
 * @property \App\Model\Entity\Order[] $orders
 */
class Coupon extends Entity
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
        'coupon_code' => true,
        'discount' => true,
        'discount_type' => true,
        'description' => true,
        'expire' => true,
        'user_usage_limit' => true,
        'usage_limit' => true,
        'minimum_spend' => true,
        'maximum_spend' => true,
        'max_amount' => true,
        'usage_count' => true,
        'coupon_applicable' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'merchant' => true,
        'coupon_redeems' => true,
        'orders' => true,
    ];
}
