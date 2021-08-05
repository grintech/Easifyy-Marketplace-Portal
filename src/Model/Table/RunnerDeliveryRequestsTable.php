<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RunnerDeliveryRequests Model
 *
 * @property \App\Model\Table\RunnersTable&\Cake\ORM\Association\BelongsTo $Runners
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \App\Model\Entity\RunnerDeliveryRequest get($primaryKey, $options = [])
 * @method \App\Model\Entity\RunnerDeliveryRequest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RunnerDeliveryRequest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RunnerDeliveryRequest|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RunnerDeliveryRequest saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RunnerDeliveryRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RunnerDeliveryRequest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RunnerDeliveryRequest findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RunnerDeliveryRequestsTable extends Table
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

        $this->setTable('runner_delivery_requests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Runners', [
            'foreignKey' => 'runner_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('request_status')
            ->maxLength('request_status', 100)
            ->requirePresence('request_status', 'create')
            ->notEmptyString('request_status');

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
        $rules->add($rules->existsIn(['runner_id'], 'Runners'));
        $rules->add($rules->existsIn(['order_id'], 'Orders'));

        return $rules;
    }
}
