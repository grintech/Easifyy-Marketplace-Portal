<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Review Entity
 *
 * @property int $id
 * @property int|null $merchant_id
 * @property int $user_id
 * @property int|null $rating
 * @property string|null $review
 * @property string|null $reviewer_name
 * @property string|null $reviewer_email
 * @property int $approved
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Merchant $merchant
 * @property \App\Model\Entity\User $user
 */
class Review extends Entity
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
        'order_id' => true,
        'rating' => true,
        'merchant_review' => true,
        'project_files'=>true,
        'user_review' => true,
        'user_rating' => true,
        'superadmin_view' => true,
        'delete_status' => true,
        'approved' => true,
        'created' => true,
        'updated' => true,
    ];
}
