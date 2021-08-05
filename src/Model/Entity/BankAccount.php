<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BankAccount Entity
 *
 * @property int $id
 * @property int $merchant_id
 * @property string|null $account_number
 * @property string|null $account_type
 * @property string|null $bank_name
 * @property string|null $bank_branch
 * @property string|null $ifsc_code
 * @property string|null $micr_code
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\MerchantTransaction[] $merchant_transactions
 */
class BankAccount extends Entity
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
        'account_number' => true,
        'account_holder' => true,
        'account_type' => true,
        'bank_name' => true,
        'bank_branch' => true,
        'ifsc_code' => true,
        'micr_code' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'merchant' => true,
        'merchant_transactions' => true,
    ];
}
