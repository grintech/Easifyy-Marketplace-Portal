<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MerchantKycs Model
 *
 * @property \App\Model\Table\MerchantsTable&\Cake\ORM\Association\BelongsTo $Merchants
 *
 * @method \App\Model\Entity\MerchantKyc get($primaryKey, $options = [])
 * @method \App\Model\Entity\MerchantKyc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MerchantKyc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MerchantKyc|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MerchantKyc saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MerchantKyc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MerchantKyc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MerchantKyc findOrCreate($search, callable $callback = null, $options = [])
 */
class MerchantKycsTable extends Table
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

        $this->setTable('merchant_kycs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Merchants', [
            'foreignKey' => 'merchant_id',
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
            ->scalar('govt_Id')
            ->maxLength('govt_Id', 255)
            ->allowEmptyString('govt_Id');

        $validator
            ->scalar('address_Id')
            ->maxLength('address_Id', 255)
            ->allowEmptyString('address_Id');

        $validator
            ->scalar('qualification_Id')
            ->maxLength('qualification_Id', 255)
            ->allowEmptyString('qualification_Id');

        $validator
            ->scalar('gst_declarartion')
            ->maxLength('gst_declarartion', 255)
            ->allowEmptyString('gst_declarartion');

        $validator
            ->scalar('signature')
            ->maxLength('signature', 255)
            ->allowEmptyString('signature');

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
        $rules->add($rules->existsIn(['merchant_id'], 'Merchants'));

        return $rules;
    }
}
