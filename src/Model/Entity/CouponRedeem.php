<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CouponRedeem Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $coupon_id
 * @property int|null $order_id
 * @property string $coupon_code
 * @property int $usage_count
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Coupon $coupon
 * @property \App\Model\Entity\Order $order
 */
class CouponRedeem extends Entity
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
        'coupon_id' => true,
        'order_id' => true,
        'coupon_code' => true,
        'usage_count' => true,
        'created' => true,
        'user' => true,
        'coupon' => true,
        'order' => true,
    ];
}
