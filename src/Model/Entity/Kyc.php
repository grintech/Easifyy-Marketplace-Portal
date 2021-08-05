<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Kyc Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $govt_Id
 * @property string|null $address_Id
 * @property string|null $qualification_Id
 * @property string|null $gst_declarartion
 * @property bool $status
 *
 * @property \App\Model\Entity\User $user
 */
class Kyc extends Entity
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
        'govt_Id' => true,
        'address_Id' => true,
        'qualification_Id' => true,
        'gst_declarartion' => true,
        'status' => true,
        'user' => true,
    ];
}
