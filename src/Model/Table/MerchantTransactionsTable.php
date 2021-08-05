<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MerchantTransactions Model
 *
 * @property \App\Model\Table\MerchantsTable&\Cake\ORM\Association\BelongsTo $Merchants
 * @property \App\Model\Table\BankAccountsTable&\Cake\ORM\Association\BelongsTo $BankAccounts
 * @property \App\Model\Table\TransactionStatusesTable&\Cake\ORM\Association\BelongsTo $TransactionStatuses
 * @property \App\Model\Table\MerchantPayoutsTable&\Cake\ORM\Association\HasMany $MerchantPayouts
 *
 * @method \App\Model\Entity\MerchantTransaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\MerchantTransaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MerchantTransaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MerchantTransaction|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MerchantTransaction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MerchantTransaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MerchantTransaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MerchantTransaction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MerchantTransactionsTable extends Table
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

        $this->setTable('merchant_transactions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Merchants', [
            'foreignKey' => 'merchant_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('BankAccounts', [
            'foreignKey' => 'bank_account_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('TransactionStatuses', [
            'foreignKey' => 'transaction_status_id',
        ]);
        $this->hasMany('MerchantPayouts', [
            'foreignKey' => 'merchant_transaction_id',
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
            ->numeric('total_orders_amount')
            ->requirePresence('total_orders_amount', 'create')
            ->notEmptyString('total_orders_amount');

        $validator
            ->numeric('admin_coupon_discount')
            ->greaterThanOrEqual('admin_coupon_discount', 0)
            ->allowEmptyString('admin_coupon_discount');

        $validator
            ->numeric('merchant_coupon_discount')
            ->greaterThanOrEqual('merchant_coupon_discount', 0)
            ->allowEmptyString('merchant_coupon_discount');

        $validator
            ->numeric('commission')
            ->allowEmptyString('commission');

        $validator
            ->numeric('amount_payable')
            ->greaterThanOrEqual('amount_payable', 0)
            ->allowEmptyString('amount_payable');

        $validator
            ->scalar('notes')
            ->maxLength('notes', 255)
            ->allowEmptyString('notes');

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
        $rules->add($rules->existsIn(['merchant_id'], 'Merchants'));
        $rules->add($rules->existsIn(['bank_account_id'], 'BankAccounts'));
        $rules->add($rules->existsIn(['transaction_status_id'], 'TransactionStatuses'));

        return $rules;
    }
}
