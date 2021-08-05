<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Purchase Entity
 *
 * @property int $id
 * @property int $supplier_id
 * @property int $merchant_id
 * @property float $amount
 * @property string $mode
 * @property string $bank_details
 * @property string $invoice_number
 * @property float $paid
 * @property float $unpaid
 * @property \Cake\I18n\FrozenTime|null $invoice_date
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $updated
 *
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\PurchaseItem[] $purchase_items
 */
class Purchase extends Entity
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
        'supplier_id' => true,
        'merchant_id' => true,
        'amount' => true,
        'mode' => true,
        'bank_details' => true,
        'invoice_number' => true,
        'paid' => true,
        'unpaid' => true,
        'invoice_date' => true,
        'created' => true,
        'updated' => true,
        'supplier' => true,
        'merchant' => true,
        'purchase_items' => true,
    ];
}
