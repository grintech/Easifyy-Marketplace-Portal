<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PurchaseItems Model
 *
 * @property \App\Model\Table\PurchasesTable&\Cake\ORM\Association\BelongsTo $Purchases
 * @property \App\Model\Table\MerchantProductsTable&\Cake\ORM\Association\BelongsTo $MerchantProducts
 *
 * @method \App\Model\Entity\PurchaseItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PurchaseItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PurchaseItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchaseItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchaseItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PurchaseItemsTable extends Table
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

        $this->setTable('purchase_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Purchases', [
            'foreignKey' => 'purchase_id',
            'joinType' => 'INNER',
        ]);
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
            ->numeric('quantity')
            ->greaterThanOrEqual('quantity', 0)
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->numeric('purchase_price')
            ->greaterThanOrEqual('purchase_price', 0)
            ->allowEmptyString('purchase_price');

        $validator
            ->numeric('price')
            ->greaterThanOrEqual('price', 0)
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->numeric('sale_price')
            ->greaterThanOrEqual('sale_price', 0)
            ->allowEmptyString('sale_price');

        $validator
            ->date('expiry')
            ->allowEmptyDate('expiry');

        $validator
            ->numeric('margin')
            ->greaterThanOrEqual('margin', 0)
            ->allowEmptyString('margin');

        $validator
            ->notEmptyString('status');

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
        $rules->add($rules->existsIn(['purchase_id'], 'Purchases'));
        $rules->add($rules->existsIn(['merchant_product_id'], 'MerchantProducts'));

        return $rules;
    }
}
