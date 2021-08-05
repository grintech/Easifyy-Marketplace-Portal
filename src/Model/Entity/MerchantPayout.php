<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MerchantPayout Entity
 *
 * @property int $id
 * @property int $merchant_transaction_id
 * @property int $merchant_id
 * @property int $order_id
 * @property bool|null $is_admin_copoun
 * @property float|null $coupon_discount
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\MerchantTransaction $merchant_transaction
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\Order $order
 */
class MerchantPayout extends Entity
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
        'merchant_transaction_id' => true,
        'merchant_id' => true,
        'order_id' => true,
        'is_admin_copoun' => true,
        'coupon_discount' => true,
        'created' => true,
        'merchant_transaction' => true,
        'merchant' => true,
        'order' => true,
    ];
}
