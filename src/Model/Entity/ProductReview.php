<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductReview Entity
 *
 * @property int $id
 * @property int $product_id
 * @property string $reviewer_name
 * @property string $review_text
 * @property int $rating
 * @property \Cake\I18n\FrozenTime $created_at
 *
 * @property \App\Model\Entity\Product $product
 */
class ProductReview extends Entity
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
        'product_id' => true,
        'reviewer_name' => true,
        'review_text' => true,
        'rating' => true,
        'created_at' => true,
        'product' => true,
    ];
}
