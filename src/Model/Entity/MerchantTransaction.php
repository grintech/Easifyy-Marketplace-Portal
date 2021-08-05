<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MerchantTransaction Entity
 *
 * @property int $id
 * @property int $merchant_id
 * @property int $bank_account_id
 * @property float $total_orders_amount
 * @property float|null $admin_coupon_discount
 * @property float|null $merchant_coupon_discount
 * @property float|null $commission
 * @property float|null $amount_payable
 * @property string|null $notes
 * @property int|null $transaction_status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\BankAccount $bank_account
 * @property \App\Model\Entity\TransactionStatus $transaction_status
 * @property \App\Model\Entity\MerchantPayout[] $merchant_payouts
 */
class MerchantTransaction extends Entity
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
        'bank_account_id' => true,
        'total_orders_amount' => true,
        'admin_coupon_discount' => true,
        'merchant_coupon_discount' => true,
        'commission' => true,
        'amount_payable' => true,
        'notes' => true,
        'transaction_status_id' => true,
        'created' => true,
        'modified' => true,
        'merchant' => true,
        'bank_account' => true,
        'transaction_status' => true,
        'merchant_payouts' => true,
    ];
}
