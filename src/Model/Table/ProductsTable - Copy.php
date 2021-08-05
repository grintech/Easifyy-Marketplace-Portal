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
 * @property \App\Model\Table\CartItemsTable&\Cake\ORM\Association\HasMany $CartItems
 * @property \App\Model\Table\MerchantProductsTable&\Cake\ORM\Association\HasMany $MerchantProducts
 * @property \App\Model\Table\OrderItemsTable&\Cake\ORM\Association\HasMany $OrderItems
 * @property \App\Model\Table\ProductBrandsTable&\Cake\ORM\Association\HasMany $ProductBrands
 * @property \App\Model\Table\ProductBundledItemsTable&\Cake\ORM\Association\HasMany $ProductBundledItems
 * @property \App\Model\Table\ProductCategoriesTable&\Cake\ORM\Association\HasMany $ProductCategories
 * @property \App\Model\Table\ProductGalleriesTable&\Cake\ORM\Association\HasMany $ProductGalleries
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

        $this->belongsTo('ProductTypes', [
            'foreignKey' => 'product_type_id',
        ]);
        $this->belongsTo('ParentProducts', [
            'className' => 'Products',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('CartItems', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('MerchantProducts', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('OrderItems', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductBrands', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductBundledItems', [
            'foreignKey' => 'bundled_parent',
        ]);
        $this->hasMany('ProductCategories', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductGalleries', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ChildProducts', [
            'className' => 'Products',
            'foreignKey' => 'parent_id',
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
            ->scalar('_unit')
            ->maxLength('_unit', 100)
            ->allowEmptyString('_unit');

        $validator
            ->integer('_stock')
            ->allowEmptyString('_stock');

        $validator
            ->scalar('_bar_code')
            ->maxLength('_bar_code', 100)
            ->allowEmptyString('_bar_code');

        $validator
            ->scalar('_item_code')
            ->maxLength('_item_code', 100)
            ->allowEmptyString('_item_code');

        $validator
            ->scalar('_hsn_code')
            ->maxLength('_hsn_code', 100)
            ->allowEmptyString('_hsn_code');

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
            ->notEmptyString('author');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

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
