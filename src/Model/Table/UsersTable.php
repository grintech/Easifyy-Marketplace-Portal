<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\HasMany $Addresses
 * @property \App\Model\Table\CartItemsTable&\Cake\ORM\Association\HasMany $CartItems
 * @property \App\Model\Table\CouponRedeemsTable&\Cake\ORM\Association\HasMany $CouponRedeems
 * @property \App\Model\Table\MerchantsTable&\Cake\ORM\Association\HasMany $Merchants
 * @property \App\Model\Table\OrderNotificationsTable&\Cake\ORM\Association\HasMany $OrderNotifications
 * @property \App\Model\Table\OrderPaymentsTable&\Cake\ORM\Association\HasMany $OrderPayments
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\ReviewsTable&\Cake\ORM\Association\HasMany $Reviews
 * @property \App\Model\Table\RewardPointsTable&\Cake\ORM\Association\HasMany $RewardPoints
 * @property \App\Model\Table\RunnersTable&\Cake\ORM\Association\HasMany $Runners
 * @property \App\Model\Table\SupportsTable&\Cake\ORM\Association\HasMany $Supports
 * @property \App\Model\Table\UserLogsTable&\Cake\ORM\Association\HasMany $UserLogs
 * @property \App\Model\Table\UserSocialProfilesTable&\Cake\ORM\Association\HasMany $UserSocialProfiles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Addresses', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('CartItems', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('CouponRedeems', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Merchants', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('OrderNotifications', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('OrderPayments', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Reviews', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('RewardPoints', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Runners', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Supports', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserLogs', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('UserSocialProfiles', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('BankAccounts', [
            'foreignKey' => 'user_id',
        ]);
        
        $this->hasMany('Products')
            ->setForeignKey('author')
            ->setDependent(true);

        $this->hasMany('Kyc', [
            'foreignKey' => 'user_id',
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
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->allowEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('username')
            ->maxLength('username', 100)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 100)
            ->allowEmptyString('password');

        $validator
            ->allowEmptyString('phone');

        $validator
            ->scalar('role')
            ->maxLength('role', 20)
            ->requirePresence('role', 'create')
            ->notEmptyString('role');

        $validator
            ->scalar('user_profile_image')
            ->maxLength('user_profile_image', 255)
            ->allowEmptyFile('user_profile_image');

        $validator
            ->scalar('reset_password_token')
            ->maxLength('reset_password_token', 255)
            ->allowEmptyString('reset_password_token');

        $validator
            ->dateTime('token_created_at')
            ->allowEmptyDateTime('token_created_at');

        $validator
            ->scalar('email_verification_token')
            ->maxLength('email_verification_token', 225)
            ->allowEmptyString('email_verification_token');

        $validator
            ->dateTime('email_token_created_at')
            ->allowEmptyDateTime('email_token_created_at');

        $validator
            ->allowEmptyString('email_verify_status');

        $validator
            ->allowEmptyString('status');

        $validator
            ->scalar('device_token')
            ->maxLength('device_token', 255)
            ->allowEmptyString('device_token');

        $validator
            ->scalar('fcm_token')
            ->maxLength('fcm_token', 255)
            ->allowEmptyString('fcm_token');

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

        return $rules;
    }

    public function validationPassword($validator)
    {
        $validator->add('confirm_password', 'no-misspelling', [
            'rule' => ['compareWith', 'password'],
            'message' => 'Passwords are not equal',
        ]);

        // ...

        return $validator;
    }
}
