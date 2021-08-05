<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MerchantProducts Model
 *
 * @property \App\Model\Table\MerchantsTable&\Cake\ORM\Association\BelongsTo $Merchants
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\ProductTypesTable&\Cake\ORM\Association\BelongsTo $ProductTypes
 * @property \App\Model\Table\MerchantProductsTable&\Cake\ORM\Association\BelongsTo $ParentMerchantProducts
 * @property \App\Model\Table\ProductUnitsTable&\Cake\ORM\Association\BelongsTo $ProductUnits
 * @property \App\Model\Table\CartItemsTable&\Cake\ORM\Association\HasMany $CartItems
 * @property \App\Model\Table\MerchantProductBrandsTable&\Cake\ORM\Association\HasMany $MerchantProductBrands
 * @property \App\Model\Table\MerchantProductBundledItemsTable&\Cake\ORM\Association\HasMany $MerchantProductBundledItems
 * @property \App\Model\Table\MerchantProductCategoriesTable&\Cake\ORM\Association\HasMany $MerchantProductCategories
 * @property \App\Model\Table\MerchantProductGalleriesTable&\Cake\ORM\Association\HasMany $MerchantProductGalleries
 * @property \App\Model\Table\MerchantProductsTable&\Cake\ORM\Association\HasMany $ChildMerchantProducts
 * @property \App\Model\Table\OrderItemsTable&\Cake\ORM\Association\HasMany $OrderItems
 * @property \App\Model\Table\PurchaseItemsTable&\Cake\ORM\Association\HasMany $PurchaseItems
 * @property \App\Model\Table\WishlistsTable&\Cake\ORM\Association\HasMany $Wishlists
 *
 * @method \App\Model\Entity\MerchantProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\MerchantProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MerchantProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MerchantProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MerchantProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MerchantProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MerchantProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MerchantProduct findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MerchantProductsTable extends Table
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

        $this->setTable('merchant_products');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Merchants', [
            'foreignKey' => 'merchant_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ProductTypes', [
            'foreignKey' => 'product_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ParentMerchantProducts', [
            'className' => 'MerchantProducts',
            'foreignKey' => 'parent_id',
        ]);
        $this->belongsTo('ProductUnits', [
            'foreignKey' => 'product_unit_id',
        ]);
        $this->hasMany('CartItems', [
            'foreignKey' => 'merchant_product_id',
        ]);
        $this->hasMany('MerchantProductBrands', [
            'foreignKey' => 'merchant_product_id',
        ]);
        $this->hasMany('MerchantProductBundledItems', [
            'foreignKey' => 'merchant_product_id',
        ]);
        $this->hasMany('MerchantProductCategories', [
            'foreignKey' => 'merchant_product_id',
        ]);
        $this->hasMany('MerchantProductGalleries', [
            'foreignKey' => 'merchant_product_id',
        ]);
        $this->hasMany('ChildMerchantProducts', [
            'className' => 'MerchantProducts',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('OrderItems', [
            'foreignKey' => 'merchant_product_id',
        ]);
        $this->hasMany('PurchaseItems', [
            'foreignKey' => 'merchant_product_id',
        ]);
        $this->hasMany('Wishlists', [
            'foreignKey' => 'merchant_product_id',
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
            ->scalar('slug')
            ->maxLength('slug', 100)
            ->allowEmptyString('slug');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->allowEmptyString('description');

        $validator
            ->numeric('_price')
            ->allowEmptyString('_price');

        $validator
            ->numeric('_sale_price')
            ->allowEmptyString('_sale_price');

        $validator
            ->numeric('_weight')
            ->allowEmptyString('_weight');

        $validator
            ->integer('_stock')
            ->allowEmptyString('_stock');

        $validator
            ->scalar('_bar_code')
            ->maxLength('_bar_code', 100)
            ->allowEmptyString('_bar_code');

        $validator
            ->scalar('_hsn_code')
            ->maxLength('_hsn_code', 100)
            ->allowEmptyString('_hsn_code');

        $validator
            ->scalar('_item_code')
            ->maxLength('_item_code', 100)
            ->allowEmptyString('_item_code');

        $validator
            ->scalar('_sku')
            ->maxLength('_sku', 100)
            ->allowEmptyString('_sku');

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
            ->boolean('_tax_inclusive')
            ->allowEmptyString('_tax_inclusive');

        $validator
            ->boolean('_is_taxable')
            ->allowEmptyString('_is_taxable');

        $validator
            ->dateTime('published_on')
            ->allowEmptyDateTime('published_on');

        $validator
            ->integer('status')
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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['product_type_id'], 'ProductTypes'));
        $rules->add($rules->existsIn(['parent_id'], 'ParentMerchantProducts'));
        $rules->add($rules->existsIn(['product_unit_id'], 'ProductUnits'));

        return $rules;
    }
}
