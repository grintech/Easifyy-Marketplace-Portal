<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderNotification Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $merchant_id
 * @property int|null $order_id
 * @property string|null $type
 * @property string|null $message
 * @property string|null $user_type
 * @property string|null $link
 * @property bool|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\Order $order
 */
class OrderNotification extends Entity
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
        'merchant_id' => true,
        'order_id' => true,
        'type' => true,
        'message' => true,
        'user_type' => true,
        'link' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'payment_status' => true,
        'payment_reply' => true,
        'merchant' => true,
        'order' => true,
        'delete_status' =>true,
    ];
}
