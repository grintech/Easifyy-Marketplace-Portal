<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MerchantProductBundledItems Model
 *
 * @property \App\Model\Table\MerchantProductsTable&\Cake\ORM\Association\BelongsTo $MerchantProducts
 *
 * @method \App\Model\Entity\MerchantProductBundledItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\MerchantProductBundledItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MerchantProductBundledItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MerchantProductBundledItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MerchantProductBundledItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MerchantProductBundledItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MerchantProductBundledItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MerchantProductBundledItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MerchantProductBundledItemsTable extends Table
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

        $this->setTable('merchant_product_bundled_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MerchantProducts', [
            'foreignKey' => 'merchant_product_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->requirePresence('bundled_parent', 'create')
            ->notEmptyString('bundled_parent');

        $validator
            ->numeric('mrp')
            ->greaterThanOrEqual('mrp', 0)
            ->allowEmptyString('mrp');

        $validator
            ->numeric('price')
            ->greaterThanOrEqual('price', 0)
            ->allowEmptyString('price');

        $validator
            ->nonNegativeInteger('quantity')
            ->allowEmptyString('quantity');

        $validator
            ->numeric('total_price')
            ->greaterThanOrEqual('total_price', 0)
            ->allowEmptyString('total_price');

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
        $rules->add($rules->existsIn(['merchant_product_id'], 'MerchantProducts'));

        return $rules;
    }
}
