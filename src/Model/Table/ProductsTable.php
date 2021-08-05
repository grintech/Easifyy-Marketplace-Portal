<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\ProductTypesTable&\Cake\ORM\Association\BelongsTo $ProductTypes
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $ParentProducts
 * @property \App\Model\Table\MerchantProductsTable&\Cake\ORM\Association\HasMany $MerchantProducts
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\ProductBrandsTable&\Cake\ORM\Association\HasMany $ProductBrands
 * @property \App\Model\Table\ProductBundledItemsTable&\Cake\ORM\Association\HasMany $ProductBundledItems
 * @property \App\Model\Table\ProductCategoriesTable&\Cake\ORM\Association\HasMany $ProductCategories
 * @property \App\Model\Table\ProductFaqTable&\Cake\ORM\Association\HasMany $ProductFaq
 * @property \App\Model\Table\ProductGalleriesTable&\Cake\ORM\Association\HasMany $ProductGalleries
 * @property \App\Model\Table\ProductPlansTable&\Cake\ORM\Association\HasMany $ProductPlans
 * @property \App\Model\Table\ProductSellerPlansTable&\Cake\ORM\Association\HasMany $ProductSellerPlans
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $ChildProducts
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Muffin/Slug.Slug');
        $this->addBehavior('Sitemap.Sitemap', ['changefreq' => 'daily']);

        $this->belongsTo('ProductTypes', [
            'foreignKey' => 'product_type_id',
        ]);
        $this->belongsTo('ParentProducts', [
            'className' => 'Products',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('MerchantProducts', [
            'foreignKey' => 'product_id',
        ]);

        $this->hasMany('Orders', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductBrands', [
            'foreignKey' => 'product_id',
        ]);
        //$this->hasMany('Merchants', [
        //    'foreignKey' => 'author',
        //]);
        $this->hasMany('ProductBundledItems', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductCategories', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductFaq', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductReviews', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductGalleries', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductPlans', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductSellerPlans', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ChildProducts', [
            'className' => 'Products',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('Merchants', [
            'bindingKey' => ['author'],
            'foreignKey' => ['user_id']
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
            ->scalar('title')
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('_title_desc')
            ->maxLength('_title_desc', 200)
            ->allowEmptyString('_title_desc');

        $validator
            ->scalar('menu_title')
            ->maxLength('menu_title', 100)
            ->allowEmptyString('menu_title');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 100)
            ->allowEmptyString('slug');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->allowEmptyString('description');

        $validator
            ->scalar('service_coverd')
            ->maxLength('service_coverd', 4294967295)
            ->allowEmptyString('service_coverd');

        $validator
            ->scalar('service_target')
            ->maxLength('service_target', 4294967295)
            ->allowEmptyString('service_target');

        $validator
            ->scalar('service_process')
            ->maxLength('service_process', 4294967295)
            ->allowEmptyString('service_process');

        $validator
            ->scalar('service_guide')
            ->maxLength('service_guide', 4294967295)
            ->allowEmptyString('service_guide');

        $validator
            ->scalar('offer_box')
            ->maxLength('offer_box', 100)
            ->allowEmptyString('offer_box');

        $validator
            ->numeric('_cgst')
            ->allowEmptyString('_cgst');

        $validator
            ->numeric('_igst')
            ->allowEmptyString('_igst');

        $validator
            ->numeric('_sgst')
            ->allowEmptyString('_sgst');

        $validator
            ->boolean('_is_taxable')
            ->allowEmptyString('_is_taxable');

        $validator
            ->numeric('_commission')
            ->allowEmptyString('_commission');

        $validator
            ->numeric('_basic_price')
            ->allowEmptyString('_basic_price');

        $validator
            ->numeric('_standard_price')
            ->allowEmptyString('_standard_price');

        $validator
            ->numeric('_premium_price')
            ->allowEmptyString('_premium_price');

        $validator
            ->numeric('_basic_plan_price')
            ->allowEmptyString('_basic_plan_price');

        $validator
            ->numeric('_standard_plan_price')
            ->allowEmptyString('_standard_plan_price');

        $validator
            ->numeric('_premium_plan_price')
            ->allowEmptyString('_premium_plan_price');

        $validator
            ->numeric('_basic_booking_price')
            ->allowEmptyString('_basic_booking_price');

        $validator
            ->numeric('_standard_booking_price')
            ->allowEmptyString('_standard_booking_price');

        $validator
            ->numeric('_premium_booking_price')
            ->allowEmptyString('_premium_booking_price');

        $validator
            ->integer('_basic_commission')
            ->allowEmptyString('_basic_commission');

        $validator
            ->integer('_standard_commission')
            ->allowEmptyString('_standard_commission');

        $validator
            ->integer('_premium_commission')
            ->allowEmptyString('_premium_commission');

        $validator
            ->scalar('b_commssion_oprator')
            ->maxLength('b_commssion_oprator', 4)
            ->allowEmptyString('b_commssion_oprator');

        $validator
            ->integer('b_commssion_add')
            ->allowEmptyString('b_commssion_add');

        $validator
            ->scalar('s_commssion_oprator')
            ->maxLength('s_commssion_oprator', 4)
            ->allowEmptyString('s_commssion_oprator');

        $validator
            ->integer('s_commssion_add')
            ->allowEmptyString('s_commssion_add');

        $validator
            ->scalar('p_commssion_oprator')
            ->maxLength('p_commssion_oprator', 4)
            ->allowEmptyString('p_commssion_oprator');

        $validator
            ->integer('p_commssion_add')
            ->allowEmptyString('p_commssion_add');

        $validator
            ->integer('_basic_gst')
            ->allowEmptyString('_basic_gst');

        $validator
            ->integer('_standard_gst')
            ->allowEmptyString('_standard_gst');

        $validator
            ->integer('_premium_gst')
            ->allowEmptyString('_premium_gst');

        $validator
            ->boolean('_basic_gst_show')
            ->allowEmptyString('_basic_gst_show');

        $validator
            ->boolean('_standard_gst_show')
            ->allowEmptyString('_standard_gst_show');

        $validator
            ->boolean('_premium_gst_show')
            ->allowEmptyString('_premium_gst_show');

        $validator
            ->scalar('_basic_price_desc')
            ->maxLength('_basic_price_desc', 4294967295)
            ->allowEmptyString('_basic_price_desc');

        $validator
            ->scalar('_standard_price_desc')
            ->maxLength('_standard_price_desc', 4294967295)
            ->allowEmptyString('_standard_price_desc');

        $validator
            ->scalar('_premium_price_desc')
            ->maxLength('_premium_price_desc', 4294967295)
            ->allowEmptyString('_premium_price_desc');

        $validator
            ->integer('_basic_plan_time')
            ->allowEmptyString('_basic_plan_time');

        $validator
            ->integer('_standard_plan_time')
            ->allowEmptyString('_standard_plan_time');

        $validator
            ->integer('_premium_plan_time')
            ->allowEmptyString('_premium_plan_time');

        $validator
            ->notEmptyString('author');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->integer('is_addon')
            ->allowEmptyString('is_addon');

        $validator
            ->integer('delete_status')
            ->notEmptyString('delete_status');

        $validator
            ->dateTime('published_on')
            ->allowEmptyDateTime('published_on');

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
        $rules->add($rules->existsIn(['product_type_id'], 'ProductTypes'));
        $rules->add($rules->existsIn(['parent_id'], 'ParentProducts'));

        return $rules;
    }
}
