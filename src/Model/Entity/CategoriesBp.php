<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CategoriesBp Entity
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $name
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $image
 * @property bool|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ParentCategoriesBp $parent_categories_bp
 * @property \App\Model\Entity\ChildCategoriesBp[] $child_categories_bp
 */
class CategoriesBp extends Entity
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
        'parent_id' => true,
        'name' => true,
        'slug' => true,
        'description' => true,
        'image' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'parent_categories_bp' => true,
        'child_categories_bp' => true,
    ];
}
