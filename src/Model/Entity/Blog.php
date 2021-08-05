<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Blog Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $image
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string $slug
 * @property \Cake\I18n\FrozenTime|null $created
 */
class Blog extends Entity
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
        'blog_category_id' => true,
        'user_id' => true,
        'title' => true,
        'description' => true,
        'image' => true,
        'image_alt' => true,
        'meta_title' => true,
        'meta_description' => true,
        'meta_keywords' => true,
        'cornerstone_content' => true,
        'no_follow' => true,
        'slug' => true,
        'status' => true,
        'created' => true,
    ];
}
