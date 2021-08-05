<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BankAccounts Model
 *
 * @property \App\Model\Table\MerchantsTable&\Cake\ORM\Association\BelongsTo $Merchants
 * @property \App\Model\Table\MerchantTransactionsTable&\Cake\ORM\Association\HasMany $MerchantTransactions
 *
 * @method \App\Model\Entity\BankAccount get($primaryKey, $options = [])
 * @method \App\Model\Entity\BankAccount newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BankAccount[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BankAccount|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankAccount saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BankAccount patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BankAccount[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BankAccount findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BankAccountsTable extends Table
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

        $this->setTable('bank_accounts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Merchants', [
            'foreignKey' => 'merchant_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('MerchantTransactions', [
            'foreignKey' => 'bank_account_id',
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
            ->scalar('account_number')
            ->maxLength('account_number', 20)
            ->allowEmptyString('account_number');

        $validator
            ->scalar('account_type')
            ->maxLength('account_type', 20)
            ->allowEmptyString('account_type');

        $validator
            ->scalar('account_holder')
            ->maxLength('account_holder', 100)
            ->allowEmptyString('account_holder');

        $validator
            ->scalar('bank_name')
            ->maxLength('bank_name', 50)
            ->allowEmptyString('bank_name');

        $validator
            ->scalar('bank_branch')
            ->maxLength('bank_branch', 255)
            ->allowEmptyString('bank_branch');

        $validator
            ->scalar('ifsc_code')
            ->maxLength('ifsc_code', 20)
            ->allowEmptyString('ifsc_code');

        $validator
            ->scalar('micr_code')
            ->maxLength('micr_code', 50)
            ->allowEmptyString('micr_code');

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

        return $rules;
    }
}
