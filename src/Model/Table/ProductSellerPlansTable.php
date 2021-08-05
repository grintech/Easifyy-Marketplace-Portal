<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductSellerPlans Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \App\Model\Entity\ProductSellerPlan get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductSellerPlan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductSellerPlan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductSellerPlan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductSellerPlan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductSellerPlan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductSellerPlan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductSellerPlan findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductSellerPlansTable extends Table
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

        $this->setTable('product_seller_plans');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('heading')
            ->maxLength('heading', 100)
            ->requirePresence('heading', 'create')
            ->notEmptyString('heading');

        $validator
            ->numeric('basic_price')
            ->requirePresence('basic_price', 'create')
            ->notEmptyString('basic_price');

        $validator
            ->numeric('std_price')
            ->requirePresence('std_price', 'create')
            ->notEmptyString('std_price');

        $validator
            ->numeric('pre_price')
            ->requirePresence('pre_price', 'create')
            ->notEmptyString('pre_price');

        $validator
            ->requirePresence('taxable', 'create')
            ->notEmptyString('taxable');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }
}
