<?php
namespace App\Model\Behavior;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Utility\Text;

/**
 * Sluggable behavior
 */
class SluggableBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'field' => 'title',
        'slug' => 'slug',
        'replacement' => '-',
        'implementedFinders' => [
            'slugged' => 'findSlug',
        ]
    ];

    public function slug(EntityInterface $entity)
    {
        $config = $this->getConfig();
        $value = $entity->get($config['field']);
        $entity->set($config['slug'], strtolower(Text::slug($value, $config['replacement'])));
    }

    public function beforeSave(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        $this->slug($entity);
    }

    public function findSlug(Query $query, array $options)
    {
        return $query->where(['slug' => $options['slug']]);
    }

    public function slugify(EntityInterface $entity, $inc = null) {
        $config = $this->getConfig();
        $text = $entity->get($config['field']);
        $org_text = $text;
        $text = ($inc == null) ? $text : $text . ' ' . $inc;

        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        $exists = $this->Product->findBySlug($text);

        if (!empty($exists)) {
            return $this->slugify($entity, ++$inc);
        } else {
            return $text;
        }
    }
}
