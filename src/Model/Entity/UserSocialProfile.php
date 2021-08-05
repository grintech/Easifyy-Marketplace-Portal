<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserSocialProfile Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $social_network_name
 * @property string|null $social_networkID
 * @property string|null $email
 * @property string $display_name
 * @property string $first_name
 * @property string $last_name
 * @property string $link
 * @property string $picture
 * @property bool $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class UserSocialProfile extends Entity
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
        'social_network_name' => true,
        'social_networkID' => true,
        'email' => true,
        'display_name' => true,
        'first_name' => true,
        'last_name' => true,
        'link' => true,
        'picture' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
