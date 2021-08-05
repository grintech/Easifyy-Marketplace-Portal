<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderPayment Entity
 *
 * @property int $id
 * @property int $order_id
 * @property int $user_id
 * @property int $merchant_id
 * @property string|null $transactionId
 * @property float $amount
 * @property \Cake\I18n\FrozenTime|null $transaction_date
 * @property int|null $transaction_status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Merchant $merchant
 */
class OrderPayment extends Entity
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
        'order_id' => true,
        'user_id' => true,
        'merchant_id' => true,
        'transactionId' => true,
        'amount' => true,
        'razorpay_order_id' => true,
        'razorpay_payment_id' => true,
        'razorpay_signature' => true,
        'transaction_date' => true,
        'transaction_status' => true,
        'created' => true,
        'modified' => true,
        'order' => true,
        'user' => true,
        'merchant' => true,
    ];
}
