<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CartItem Entity
 *
 * @property int $id
 * @property int|null $merchant_id
 * @property int|null $user_id
 * @property int $merchant_product_id
 * @property string|null $sessionID
 * @property float $price
 * @property int $quantity
 * @property string|null $tax_details
 * @property float|null $subtotal
 * @property float|null $total
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\MerchantProduct $merchant_product
 */
class CartItem extends Entity
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
        'user_id' => true,
        'merchant_product_id' => true,
        'sessionID' => true,
        'price' => true,
        'quantity' => true,
        'tax_details' => true,
        'subtotal' => true,
        'total' => true,
        'created' => true,
        'modified' => true,
        'merchant' => true,
        'user' => true,
        'merchant_product' => true,
    ];
}
