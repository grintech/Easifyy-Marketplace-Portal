<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coupons Model
 *
 * @property \App\Model\Table\MerchantsTable&\Cake\ORM\Association\BelongsTo $Merchants
 * @property \App\Model\Table\CouponRedeemsTable&\Cake\ORM\Association\HasMany $CouponRedeems
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 *
 * @method \App\Model\Entity\Coupon get($primaryKey, $options = [])
 * @method \App\Model\Entity\Coupon newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Coupon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coupon|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coupon saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coupon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Coupon[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coupon findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CouponsTable extends Table
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

        $this->setTable('coupons');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Merchants', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('CouponRedeems', [
            'foreignKey' => 'coupon_id',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'coupon_id',
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('coupon_code')
            ->maxLength('coupon_code', 100)
            ->requirePresence('coupon_code', 'create')
            ->notEmptyString('coupon_code');

        $validator
            ->scalar('discount')
            ->maxLength('discount', 100)
            ->requirePresence('discount', 'create')
            ->notEmptyString('discount');

        $validator
            ->scalar('discount_type')
            ->maxLength('discount_type', 100)
            ->requirePresence('discount_type', 'create')
            ->notEmptyString('discount_type');

        $validator
            ->scalar('description')
            ->maxLength('description', 500)
            ->allowEmptyString('description');

        $validator
            ->dateTime('expire')
            ->allowEmptyDateTime('expire');

        $validator
            ->integer('user_usage_limit')
            ->allowEmptyString('user_usage_limit');

        $validator
            ->integer('usage_limit')
            ->notEmptyString('usage_limit');

        $validator
            ->integer('minimum_spend')
            ->requirePresence('minimum_spend', 'create')
            ->notEmptyString('minimum_spend');

        $validator
            ->integer('maximum_spend')
            ->requirePresence('maximum_spend', 'create')
            ->notEmptyString('maximum_spend');

        $validator
            ->nonNegativeInteger('max_amount')
            ->allowEmptyString('max_amount');

        $validator
            ->integer('usage_count')
            ->allowEmptyString('usage_count');

        $validator
            ->integer('coupon_applicable')
            ->allowEmptyString('coupon_applicable');

        $validator
            ->boolean('status')
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
        $rules->add($rules->existsIn(['merchant_id'], 'Merchants'));

        return $rules;
    }
}
