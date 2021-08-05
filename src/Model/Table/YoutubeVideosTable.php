<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YoutubeVideos Model
 *
 * @method \App\Model\Entity\YoutubeVideo get($primaryKey, $options = [])
 * @method \App\Model\Entity\YoutubeVideo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\YoutubeVideo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\YoutubeVideo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YoutubeVideo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YoutubeVideo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\YoutubeVideo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\YoutubeVideo findOrCreate($search, callable $callback = null, $options = [])
 */
class YoutubeVideosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('youtube_videos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('youtubeLink')
            ->maxLength('youtubeLink', 255)
            ->requirePresence('youtubeLink', 'create')
            ->notEmptyString('youtubeLink');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        return $validator;
    }
}
