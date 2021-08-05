<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \App\Model\Table\MerchantsTable&\Cake\ORM\Association\BelongsTo $Merchants
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property &\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\CouponsTable&\Cake\ORM\Association\BelongsTo $Coupons
 * @property \App\Model\Table\RunnersTable&\Cake\ORM\Association\BelongsTo $Runners
 * @property \App\Model\Table\OrderModesTable&\Cake\ORM\Association\BelongsTo $OrderModes
 * @property \App\Model\Table\PaymentMethodsTable&\Cake\ORM\Association\BelongsTo $PaymentMethods
 * @property \App\Model\Table\OrderStatusesTable&\Cake\ORM\Association\BelongsTo $OrderStatuses
 * @property \App\Model\Table\CouponRedeemsTable&\Cake\ORM\Association\HasMany $CouponRedeems
 * @property \App\Model\Table\MerchantPayoutsTable&\Cake\ORM\Association\HasMany $MerchantPayouts
 * @property \App\Model\Table\OrderItemsTable&\Cake\ORM\Association\HasMany $OrderItems
 * @property \App\Model\Table\OrderNotificationsTable&\Cake\ORM\Association\HasMany $OrderNotifications
 * @property \App\Model\Table\OrderPaymentsTable&\Cake\ORM\Association\HasMany $OrderPayments
 * @property \App\Model\Table\RunnerDeliveryRequestsTable&\Cake\ORM\Association\HasMany $RunnerDeliveryRequests
 * @property \App\Model\Table\SupportsTable&\Cake\ORM\Association\HasMany $Supports
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Merchants', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Coupons', [
            'foreignKey' => 'coupon_id',
        ]);
        $this->belongsTo('Runners', [
            'foreignKey' => 'runner_id',
        ]);
        $this->belongsTo('OrderModes', [
            'foreignKey' => 'order_mode_id',
        ]);
        $this->belongsTo('PaymentMethods', [
            'foreignKey' => 'payment_method_id',
        ]);
        $this->belongsTo('OrderStatuses', [
            'foreignKey' => 'order_status_id',
        ]);
        $this->hasMany('CouponRedeems', [
            'foreignKey' => 'order_id',
        ]);
        $this->hasMany('MerchantPayouts', [
            'foreignKey' => 'order_id',
        ]);
        $this->hasMany('OrderItems', [
            'foreignKey' => 'order_id',
        ]);
        $this->hasMany('OrderNotifications', [
            'foreignKey' => 'order_id',
        ]);
        $this->hasMany('Notifications', [
            'foreignKey' => 'order_id',
        ]);
        $this->hasMany('OrderPayments', [
            'foreignKey' => 'order_id',
        ]);
        $this->hasMany('RunnerDeliveryRequests', [
            'foreignKey' => 'order_id',
        ]);
        $this->hasMany('Supports', [
            'foreignKey' => 'order_id',
        ]);
        $this->hasMany('Reviews', [
            'foreignKey' => 'order_id',
        ]);
        $this->hasMany('OrderInvitation', [
            'foreignKey' => 'order_id',
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
            ->numeric('coupon_discount')
            ->greaterThanOrEqual('coupon_discount', 0)
            ->allowEmptyString('coupon_discount');

        // $validator
        //     ->numeric('igst')
        //     ->greaterThanOrEqual('igst', 0)
        //     ->allowEmptyString('igst');

        // $validator
        //     ->numeric('cgst')
        //     ->greaterThanOrEqual('cgst', 0)
        //     ->allowEmptyString('cgst');

        // $validator
        //     ->numeric('sgst')
        //     ->greaterThanOrEqual('sgst', 0)
        //     ->allowEmptyString('sgst');

        $validator
            ->numeric('shipping')
            ->greaterThanOrEqual('shipping', 0)
            ->allowEmptyString('shipping');

        $validator
            ->scalar('delivery_time')
            ->maxLength('delivery_time', 100)
            ->allowEmptyString('delivery_time');

        $validator
            ->numeric('total')
            ->greaterThanOrEqual('total', 0)
            ->allowEmptyString('total');

        $validator
            ->numeric('gross_total')
            ->greaterThanOrEqual('gross_total', 0)
            ->allowEmptyString('gross_total');

        $validator
            ->scalar('order_notes')
            ->maxLength('order_notes', 255)
            ->allowEmptyString('order_notes');

        $validator
            ->numeric('refund')
            ->greaterThanOrEqual('refund', 0)
            ->allowEmptyString('refund');

        $validator
            ->integer('delete_status')
            ->notEmptyString('delete_status');

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
        //$rules->add($rules->existsIn(['merchant_id'], 'Merchants'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['coupon_id'], 'Coupons'));
        $rules->add($rules->existsIn(['runner_id'], 'Runners'));
        $rules->add($rules->existsIn(['order_status_id'], 'OrderStatuses'));

        return $rules;
    }
}
