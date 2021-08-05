<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Merchants Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\StatesTable&\Cake\ORM\Association\BelongsTo $States
 * @property \App\Model\Table\CitiesTable&\Cake\ORM\Association\BelongsTo $Cities
 * @property \App\Model\Table\BankAccountsTable&\Cake\ORM\Association\HasMany $BankAccounts
 * @property \App\Model\Table\CartItemsTable&\Cake\ORM\Association\HasMany $CartItems
 * @property \App\Model\Table\CouponsTable&\Cake\ORM\Association\HasMany $Coupons
 * @property \App\Model\Table\MerchantGalleriesTable&\Cake\ORM\Association\HasMany $MerchantGalleries
 * @property \App\Model\Table\MerchantPayoutsTable&\Cake\ORM\Association\HasMany $MerchantPayouts
 * @property \App\Model\Table\MerchantProductsTable&\Cake\ORM\Association\HasMany $MerchantProducts
 * @property \App\Model\Table\MerchantTransactionsTable&\Cake\ORM\Association\HasMany $MerchantTransactions
 * @property \App\Model\Table\OrderNotificationsTable&\Cake\ORM\Association\HasMany $OrderNotifications
 * @property \App\Model\Table\OrderPaymentsTable&\Cake\ORM\Association\HasMany $OrderPayments
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\PurchasesTable&\Cake\ORM\Association\HasMany $Purchases
 * @property \App\Model\Table\ReviewsTable&\Cake\ORM\Association\HasMany $Reviews
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\HasMany $Suppliers
 * @property \App\Model\Table\WishlistsTable&\Cake\ORM\Association\HasMany $Wishlists
 *
 * @method \App\Model\Entity\Merchant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Merchant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Merchant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Merchant|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Merchant saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Merchant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Merchant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Merchant findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MerchantsTable extends Table
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

        $this->setTable('merchants');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('States', [
            'foreignKey' => 'state_id',
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
        ]);
        $this->hasMany('BankAccounts', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('CartItems', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('Coupons', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('MerchantGalleries', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('MerchantPayouts', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('MerchantProducts', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('MerchantTransactions', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('OrderNotifications', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('OrderPayments', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('Purchases', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('Reviews', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('Suppliers', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('Wishlists', [
            'foreignKey' => 'merchant_id',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'author',
        ]);
        $this->hasMany('MerchantKycs', [
            'foreignKey' => 'merchant_id',
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
            ->scalar('store_name')
            ->maxLength('store_name', 200)
            ->requirePresence('store_name', 'create')
            ->notEmptyString('store_name');

        $validator
            ->scalar('username')
            ->maxLength('username', 100)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('billing_name')
            ->maxLength('billing_name', 150)
            ->allowEmptyString('billing_name');
            
        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->allowEmptyString('slug');

        $validator
            ->scalar('gst_number')
            ->maxLength('gst_number', 10)
            ->allowEmptyString('gst_number');

        $validator
            ->scalar('pan_number')
            ->maxLength('pan_number', 10)
            ->allowEmptyString('pan_number');

        $validator
            ->scalar('license_number')
            ->maxLength('license_number', 50)
            ->allowEmptyString('license_number');

        $validator
            ->scalar('cin_number')
            ->maxLength('cin_number', 30)
            ->allowEmptyString('cin_number');

        $validator
            ->scalar('institute_name')
            ->maxLength('institute_name', 255)
            ->allowEmptyString('institute_name');

        $validator
            ->scalar('address_line_1')
            ->maxLength('address_line_1', 255)
            ->allowEmptyString('address_line_1');

        $validator
            ->scalar('address_line_2')
            ->maxLength('address_line_2', 255)
            ->allowEmptyString('address_line_2');

        $validator
            ->scalar('locality')
            ->maxLength('locality', 200)
            ->allowEmptyString('locality');

        $validator
            ->scalar('zip_code')
            ->maxLength('zip_code', 6)
            ->allowEmptyString('zip_code');

        $validator
            ->scalar('latitude')
            ->maxLength('latitude', 50)
            ->allowEmptyString('latitude');

        $validator
            ->scalar('longitude')
            ->maxLength('longitude', 50)
            ->allowEmptyString('longitude');

        $validator
            ->scalar('store_pic')
            ->maxLength('store_pic', 200)
            ->allowEmptyString('store_pic');

        $validator
            ->scalar('phone_1')
            ->maxLength('phone_1', 15)
            ->allowEmptyString('phone_1');

        $validator
            ->scalar('phone_2')
            ->maxLength('phone_2', 15)
            ->allowEmptyString('phone_2');

        $validator
            ->scalar('phone_3')
            ->maxLength('phone_3', 15)
            ->allowEmptyString('phone_3');

        $validator
            ->scalar('fax')
            ->maxLength('fax', 12)
            ->allowEmptyString('fax');

        $validator
            ->numeric('minimum_order')
            ->allowEmptyString('minimum_order');

        $validator
            ->numeric('delivery_charges')
            ->allowEmptyString('delivery_charges');

        $validator
            ->scalar('deliver_time')
            ->maxLength('deliver_time', 50)
            ->allowEmptyString('deliver_time');

        $validator
            ->scalar('payment_method')
            ->maxLength('payment_method', 100)
            ->allowEmptyString('payment_method');

        $validator
            ->scalar('delivery_slot')
            ->maxLength('delivery_slot', 100)
            ->allowEmptyString('delivery_slot');

        $validator
            ->scalar('delivery_type')
            ->maxLength('delivery_type', 100)
            ->allowEmptyString('delivery_type');

        $validator
            ->numeric('commission')
            ->greaterThanOrEqual('commission', 0)
            ->allowEmptyString('commission');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['city_id'], 'Cities'));

        return $rules;
    }
}
