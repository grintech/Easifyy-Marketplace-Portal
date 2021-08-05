<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $username
 * @property string|null $password
 * @property int|null $phone
 * @property string $role
 * @property string|null $user_profile_image
 * @property string|null $reset_password_token
 * @property \Cake\I18n\FrozenTime|null $token_created_at
 * @property string|null $email_verification_token
 * @property \Cake\I18n\FrozenTime|null $email_token_created_at
 * @property int|null $email_verify_status
 * @property int|null $status
 * @property string|null $device_token
 * @property string|null $fcm_token
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\CartItem[] $cart_items
 * @property \App\Model\Entity\CouponRedeem[] $coupon_redeems
 * @property \App\Model\Entity\Merchant[] $merchants
 * @property \App\Model\Entity\OrderNotification[] $order_notifications
 * @property \App\Model\Entity\OrderPayment[] $order_payments
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Review[] $reviews
 * @property \App\Model\Entity\RewardPoint[] $reward_points
 * @property \App\Model\Entity\Runner[] $runners
 * @property \App\Model\Entity\Support[] $supports
 * @property \App\Model\Entity\UserLog[] $user_logs
 * @property \App\Model\Entity\UserSocialProfile[] $user_social_profiles
 */
class User extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'username' => true,
        'password' => true,
        'phone' => true,
        'role' => true,
        'user_profile_image' => true,
        'reset_password_token' => true,
        'token_created_at' => true,
        'email_verification_token' => true,
        'email_token_created_at' => true,
        'email_verify_status' => true,
        'status' => true,
        'device_token' => true,
        'fcm_token' => true,
        'created' => true,
        'modified' => true,
        'addresses' => true,
        'cart_items' => true,
        'coupon_redeems' => true,
        'merchants' => true,
        'order_notifications' => true,
        'order_payments' => true,
        'orders' => true,
        'reviews' => true,
        'reward_points' => true,
        'runners' => true,
        'supports' => true,
        'user_logs' => true,
        'user_social_profiles' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
