<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RewardPoint Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $coins
 * @property \Cake\I18n\FrozenTime $date_last_change
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_expire
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 */
class RewardPoint extends Entity
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
        'coins' => true,
        'date_last_change' => true,
        'date_added' => true,
        'date_expire' => true,
        'created' => true,
        'user' => true,
    ];
}
