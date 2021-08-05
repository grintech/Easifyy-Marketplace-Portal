<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Support Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $order_id
 * @property string $ticket_type
 * @property string $subject
 * @property string|null $reason
 * @property string $comments
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Order $order
 */
class Support extends Entity
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
        'order_id' => true,
        'ticket_type' => true,
        'subject' => true,
        'reason' => true,
        'comments' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'order' => true,
    ];
}
