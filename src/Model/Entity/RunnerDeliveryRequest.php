<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RunnerDeliveryRequest Entity
 *
 * @property int $id
 * @property int $runner_id
 * @property int $order_id
 * @property string $request_status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Runner $runner
 * @property \App\Model\Entity\Order $order
 */
class RunnerDeliveryRequest extends Entity
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
        'runner_id' => true,
        'order_id' => true,
        'request_status' => true,
        'created' => true,
        'modified' => true,
        'runner' => true,
        'order' => true,
    ];
}
