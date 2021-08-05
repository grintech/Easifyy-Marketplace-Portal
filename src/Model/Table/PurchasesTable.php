<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Purchases Model
 *
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\BelongsTo $Suppliers
 * @property \App\Model\Table\MerchantsTable&\Cake\ORM\Association\BelongsTo $Merchants
 * @property \App\Model\Table\PurchaseItemsTable&\Cake\ORM\Association\HasMany $PurchaseItems
 *
 * @method \App\Model\Entity\Purchase get($primaryKey, $options = [])
 * @method \App\Model\Entity\Purchase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Purchase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Purchase|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Purchase saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Purchase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Purchase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Purchase findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PurchasesTable extends Table
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

        $this->setTable('purchases');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Merchants', [
            'foreignKey' => 'merchant_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('PurchaseItems', [
            'foreignKey' => 'purchase_id',
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
            ->numeric('amount')
            ->greaterThanOrEqual('amount', 0)
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->scalar('mode')
            ->maxLength('mode', 10)
            ->requirePresence('mode', 'create')
            ->notEmptyString('mode');

        $validator
            ->scalar('bank_details')
            ->maxLength('bank_details', 255)
            ->requirePresence('bank_details', 'create')
            ->notEmptyString('bank_details');

        $validator
            ->scalar('invoice_number')
            ->maxLength('invoice_number', 20)
            ->requirePresence('invoice_number', 'create')
            ->notEmptyString('invoice_number');

        $validator
            ->numeric('paid')
            ->greaterThanOrEqual('paid', 0)
            ->requirePresence('paid', 'create')
            ->notEmptyString('paid');

        $validator
            ->numeric('unpaid')
            ->greaterThanOrEqual('unpaid', 0)
            ->requirePresence('unpaid', 'create')
            ->notEmptyString('unpaid');

        $validator
            ->dateTime('invoice_date')
            ->allowEmptyDateTime('invoice_date');

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
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));
        $rules->add($rules->existsIn(['merchant_id'], 'Merchants'));

        return $rules;
    }
}
