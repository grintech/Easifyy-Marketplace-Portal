<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Runners Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\RunnerDeliveryRequestsTable&\Cake\ORM\Association\HasMany $RunnerDeliveryRequests
 *
 * @method \App\Model\Entity\Runner get($primaryKey, $options = [])
 * @method \App\Model\Entity\Runner newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Runner[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Runner|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Runner saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Runner patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Runner[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Runner findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RunnersTable extends Table
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

        $this->setTable('runners');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'runner_id',
        ]);
        $this->hasMany('RunnerDeliveryRequests', [
            'foreignKey' => 'runner_id',
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
            ->scalar('gender')
            ->maxLength('gender', 50)
            ->allowEmptyString('gender');

        $validator
            ->date('dob')
            ->allowEmptyDate('dob');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address');

        $validator
            ->allowEmptyString('phone_no');

        $validator
            ->scalar('vehicle_no')
            ->maxLength('vehicle_no', 100)
            ->allowEmptyString('vehicle_no');

        $validator
            ->scalar('current_locatioin')
            ->maxLength('current_locatioin', 100)
            ->allowEmptyString('current_locatioin');

        $validator
            ->scalar('loc_lat')
            ->maxLength('loc_lat', 100)
            ->allowEmptyString('loc_lat');

        $validator
            ->scalar('loc_long')
            ->maxLength('loc_long', 100)
            ->allowEmptyString('loc_long');

        $validator
            ->scalar('profile_pic')
            ->maxLength('profile_pic', 100)
            ->allowEmptyFile('profile_pic');

        $validator
            ->dateTime('last_login')
            ->allowEmptyDateTime('last_login');

        $validator
            ->boolean('status')
            ->allowEmptyString('status');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
