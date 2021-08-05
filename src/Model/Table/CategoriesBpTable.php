<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CategoriesBp Model
 *
 * @property \App\Model\Table\CategoriesBpTable&\Cake\ORM\Association\BelongsTo $ParentCategoriesBp
 * @property \App\Model\Table\CategoriesBpTable&\Cake\ORM\Association\HasMany $ChildCategoriesBp
 *
 * @method \App\Model\Entity\CategoriesBp get($primaryKey, $options = [])
 * @method \App\Model\Entity\CategoriesBp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CategoriesBp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CategoriesBp|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CategoriesBp saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CategoriesBp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CategoriesBp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CategoriesBp findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CategoriesBpTable extends Table
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

        $this->setTable('categories_bp');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ParentCategoriesBp', [
            'className' => 'CategoriesBp',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildCategoriesBp', [
            'className' => 'CategoriesBp',
            'foreignKey' => 'parent_id',
        ]);
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 50)
            ->allowEmptyString('slug');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->allowEmptyString('description');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmptyFile('image');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['parent_id'], 'ParentCategoriesBp'));

        return $rules;
    }
}
