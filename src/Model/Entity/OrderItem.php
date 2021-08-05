<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderItem Entity
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $product_id
 * @property int|null $merchant_product_id
 * @property int|null $quantity
 * @property float|null $price
 * @property float|null $igst
 * @property float|null $cgst
 * @property float|null $sgst
 * @property float|null $subtotal
 * @property float|null $total
 * @property string|null $notes
 * @property bool|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Product $product
 */
class OrderItem extends Entity
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
        'product_id' => true,
        'merchant_product_id' => true,
        'quantity' => true,
        'price' => true,
        'igst' => true,
        'cgst' => true,
        'sgst' => true,
        'subtotal' => true,
        'total' => true,
        'notes' => true,
        'status' => true,
        'created' => true,
        'order' => true,
        'product' => true,
    ];
}
