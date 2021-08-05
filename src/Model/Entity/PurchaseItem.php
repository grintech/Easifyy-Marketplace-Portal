<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseItem Entity
 *
 * @property int $id
 * @property int $purchase_id
 * @property int $merchant_product_id
 * @property float $quantity
 * @property float|null $purchase_price
 * @property float $price
 * @property float|null $sale_price
 * @property \Cake\I18n\FrozenDate|null $expiry
 * @property float|null $margin
 * @property int $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $updated
 *
 * @property \App\Model\Entity\Purchase $purchase
 * @property \App\Model\Entity\MerchantProduct $merchant_product
 */
class PurchaseItem extends Entity
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
        'purchase_id' => true,
        'merchant_product_id' => true,
        'quantity' => true,
        'purchase_price' => true,
        'price' => true,
        'sale_price' => true,
        'expiry' => true,
        'margin' => true,
        'status' => true,
        'created' => true,
        'updated' => true,
        'purchase' => true,
        'merchant_product' => true,
    ];
}
