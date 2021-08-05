<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;

/**
 * Merchants Controller
 *
 * @property \App\Model\Table\MerchantsTable $Merchants
 *
 * @method \App\Model\Entity\Merchant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    
    public function getMerchantById()
    {
        $base_urls =  Router::url('/', true) ;
        $url =  $base_urls. 'images/store_pics/';
        $id = $this->request->getData('id');

        $merchants =$this->Merchants->find('all', [
                    //'contain' => ['Users', 'States', 'Cities'],
                    'conditions' => [ 'Merchants.id' => base64_decode($id) ]
                ])->first();

        $this->set([
            'status' => 1,
            'url' => $url,
            'merchants' => $merchants, 
            '_serialize' => ['status','merchants','url']
        ]);
    }

    public function allmerchants()
    {
        $base_urls =  Router::url('/', true) ;
        $url =  $base_urls. 'images/store_pics/';
        $merchants =$this->Merchants->find('all', [
                    'contain' => ['Users', 'States', 'Cities'],

                ]);

        $this->set([
                     
                     'status' => 1,
                      'url' => $url,
                      'merchants' => $merchants, 
                    '_serialize' => ['status','merchants','url']
                ]);
    }


    public function allmerchantsByCity()
    {
        $base_urls =  Router::url('/', true) ;
        $url =  $base_urls. 'images/store_pics/';
        $this->request->allowMethod(['post', 'put']);
        if($city = $this->request->getData('city') ){
             $merchants =$this->Merchants->find('all', [
                        'contain' => ['Users', 'States', 'Cities'],
                         'conditions' => ['city_id' => $city ],
                        'order' => 'rand()',
                    ]);

            $this->set([
                        'merchants' => $merchants,  
                         'status' => 1,
                          'url' => $url,
                        '_serialize' => ['status','merchants','url']
                    ]);
        }
    }


    public function merchantRandomProducts()
    {
         $base_urls =  Router::url('/', true) ;
         $url =  $base_urls. 'img/product-images/';
        $this->request->allowMethod(['post', 'put']);
        $this->loadModel('MerchantProducts');
        $city = $this->request->getData('city');
        if ($this->request->is('post')) {
            if( $city != 0 ){
                $merchant = $this->MerchantProducts->Merchants->find('all', [
                   // 'contain' => ['Cities'],
                    'conditions' => ['city_id' => $city ],
                    'order' => 'rand()',
                    
                ])->first();

                if( $merchant ){
                    $merchant_id = $merchant->id;
                    $merchantProducts = $this->MerchantProducts->find('all',[ 
                                        'contain' => ['Merchants','ParentMerchantProducts', 'MerchantProductBrands', 'MerchantProductCategories',
                                            'MerchantProductCategories.Categories','ProductUnits', 'MerchantProductGalleries', 'ChildMerchantProducts'
                                    ],
                                        'conditions' => [
                                            'MerchantProducts.merchant_id' => $merchant_id,
                                            'product_type_id' => [1,2,4],
                                            'delete_status' => 1
                                        ] 
                                    ]); 
                    $this->set([
                        'merchant' => $merchant,
                        'url' => $url,
                        'merchantProducts' => $merchantProducts,  
                        'status' => 1,
                        '_serialize' => ['status','merchantProducts','merchant','url']
                    ]);
                } else {
                    $this->set([
                        'status' => 0,
                        '_serialize' => ['status']
                    ]);
                }


             }
         }
    }

    public function searchMerchantProducts()
    {
         $base_urls =  Router::url('/', true) ;
         $url =  $base_urls. 'img/product-images/';
        $this->request->allowMethod(['post', 'put']);
        $this->loadModel('MerchantProducts');
        if ($this->request->is(['post', 'put'])) {
        	$city = (int) $this->request->getData('city');
        	$search = $this->request->getData('search');
            if( $city != '' ){
                // $merchant = $this->MerchantProducts->Merchants->find('all', [
                //    // 'contain' => ['Cities'],
                //     'conditions' => ['city_id' => $city ],
                // ])->first();
                // $merchant_id = $merchant->id;
                // $merchantProducts = $this->MerchantProducts->find('all',[ 
                //                     'contain' => ['Merchants','ParentMerchantProducts', 'MerchantProductBrands', 'MerchantProductCategories', 'MerchantProductGalleries', 'ChildMerchantProducts'
                //                 ],
                //                     'conditions' => [
                //                     	'Merchants.city_id' => $city,
                //                     	// 'or' => [
                //                     	// 	'MerchantProducts.title LIKE' => "%$search%" ,
                //                     	// 	'Merchants.store_name LIKE' => "%$search%"  
                //                     	// ]
                //                     ] 
                //                 ]); 
                 $query = $this->MerchantProducts->find();
                 					$query->innerJoinWith(
					                    'Merchants', function ($q) use ($city) {
					                        return $q->where(['Merchants.city_id' => $city]);
					                    }
					                )
					                ->contain(['Merchants','MerchantProductCategories','ProductUnits','MerchantProductGalleries','MerchantProductCategories.Categories'])
					                ->where([
                                        'MerchantProducts.title LIKE' => "%$search%",
                                        'product_type_id' => [1,2,4],
                                        'delete_status' => 1
                                    ])
					                ;
			     $merchantProducts = $query->all();
                //print_r($merchantProducts->sql());
                 $this->set([
                            'url' => $url,
                            'merchantProducts' => $merchantProducts,  
                            'status' => 1,
                            '_serialize' => ['status','merchantProducts','url']
                        ]);
             }
         }
    }
	
	 public function ProductUnitsList()
    {
		 $this->loadModel('MerchantProducts');
         $productUnits = $this->MerchantProducts->ProductUnits->find('all', ['limit' => 200]);
         $this->set([
                    'productUnits' => $productUnits,
                     'status' => 1,
                    '_serialize' => ['status','productUnits']
                ]);
    }

    

    public function findmerchants()
    {
        $merchants =[];
        $base_urls =  Router::url('/', true) ;
        $url =  $base_urls. 'images/store_pics/';
        $this->request->allowMethod(['patch', 'post', 'put']);
        if ($this->request->is('post')) {
            $query = $this->Merchants->find();

            // print_r($this->request->getData());
            $category = $this->request->getData('category');
            $city = (int)$this->request->getData('city');
            $search = $this->request->getData('search');
             if( $city > 0){
            //  $query->contain([ 'Cities'])
            // ->where( ['Cities.id' => $city] );
                $query->innerJoinWith(
                    'Cities', function ($q) use ($city) {
                        return $q->where(['Cities.id' => $city]);
                    }
                );
             }

             if($search != ''){
                //echo $search;
                $query->Where( ['or' => ['Merchants.store_name LIKE' => "%$search%"  ] ]);
               
            }
            if($category !='' ){
                 $query->innerJoinWith(
                'MerchantProducts.MerchantProductCategories.Categories', function ($q) use ($category) {
                    return $q->where(['Categories.id' => $category]);
                }
            );

             }
            // print_r($query->sql());
             $merchants = $query->group([ 'Merchants.id' ]);

             if($merchants){
                $this->set([
                        'merchants' => $merchants,
                        'url' => $url,  
                         'status' => 1,
                        '_serialize' => ['status','merchants','url']
                    ]);
              }else{
                $this->set([
                        'merchants' => $merchants,  
                         'status' =>0,
                        '_serialize' => ['status','merchants']
                    ]);
              }
              
            
        }
    }

    public function getmerchantdata()
    {
        $this->loadModel('MerchantProductCategories');
        $merchants = $this->Merchants->get(44, [
            'contain' => [
                                'MerchantProducts',
                                'MerchantProducts.MerchantProductBrands.Brands', 
                                'MerchantProducts.MerchantProductCategories.Categories'
                            ],
                        ]);

        $categories = $this->Merchants->MerchantProducts->MerchantProductCategories->find('all', [

                        'contain' => ['Categories'],
                        //'conditions' => ['MerchantProducts.id' => 44],
                        // 'keyField' => 'Categories.id',
                         //'valueField' => 'categories.name',
                       //'select' => ['Categories.id', 'Categories.name'],
                       //'group' => 'Categories.id'
                    
                    ]);

        $brands = $this->Merchants->MerchantProducts->MerchantProductBrands->find('all', [

                        'contain' => ['Brands'],
                        //'conditions' => ['MerchantProducts.id' => 44],
                        // 'keyField' => 'Categories.id',
                        //'valueField' => 'categories.name',
                        //'select' => ['Brands.id', 'Brands.name'],
                       //'group' => 'brand_id'
                    
                    ]);

        $this->set([
                    'merchants' => $merchants,
                    'categories' =>$categories,
                    'brands' => $brands,
                     'status' => 1,
                    '_serialize' => ['status','merchants','categories','brands']
                ]); 
    }

    public function allmerchantsCities()
    {

         $cities = $this->Merchants->Cities->find('list', ['limit' => 200]);

         $this->set([
                    'cities' => $cities,
                     'status' => 1,
                    '_serialize' => ['status','cities']
                ]);
    }

    public function allStates()
    {
        $this->loadModel('States');
        $this->request->allowMethod(['post', 'get']);
        $states = $this->States->find()->select(['id','name'])->all();

         $this->set([
                    'states' => $states,
                     'status' => 1,
                    '_serialize' => ['status','states']
                ]);
    }

    public function stateAllCities()
    {

        $this->request->allowMethod(['patch', 'post', 'put']);
        $this->loadModel('Cities');
         $cities = $this->Cities->find('list', ['limit' => 200]);
         if($statecode = $this->request->getData('statecode')){
            if($statecode =='all'){
                $cities= $this->Cities->find()->select(['id','name'])->all(); 
            }else{
                $cities= $this->Cities->find()->where([ 'statecode' => $statecode])->select(['id','name'])->all(); 
            }
            
         }
        
         $this->set([
                    'cities' => $cities,
                     'status' => 1,
                    '_serialize' => ['status','cities']
                ]);
    }


    public function popularCities($limit =10)
    {
         $query = $this->Merchants->find();
         $query->contain([ 'Cities'])
         ->innerJoinWith('MerchantProducts')
         ->select( [ 'Cities.id', 'Cities.name' ])
        //->where(['Merchants'])
         ->limit($limit)
         ->group(['Cities.id' ]);
        $cities = $query->all();
         $this->set([
            'cities' => $cities,
             'status' => 1,
            '_serialize' => ['status','cities']
        ]);
    }

    public function popularCategories($limit =10)
    {
        $this->loadModel('MerchantProductCategories');
         $categories = $this->MerchantProductCategories->find();
        $categories->contain([
                'Categories' => function ($q) {
                    return $q->distinct(['Categories.id']);
                }
            ])
        //->innerJoinWith( 'MerchantProducts')
        ->select( [ 'product_counts' =>$categories->func()->count('MerchantProductCategories.category_id'),'Categories.id', 'Categories.name', 'Categories.image' ])
        ->group(['Categories.id' ])
        ->limit($limit)
        //->where(['Merchants.id' => $merchant_id])
        ->all();
        //->toList();
         $this->set([
            'categories' => $categories,
             'status' => 1,
            '_serialize' => ['status','categories']
        ]);
    }

    public function popularBrands($limit =10)
    {
        $brands = $this->Merchants->MerchantProducts->MerchantProductBrands->find()
        ->contain([
                'Brands' => function ($q) {
                    return $q->distinct(['Brands.id']);
                }
            ])
         ->innerJoinWith( 'MerchantProducts')
        ->select( ['Brands.id', 'Brands.name' ])
        ->group(['Brands.id' ])
         ->limit($limit)
        ->all();
       
         $this->set([
            'brands' => $brands,
             'status' => 1,
            '_serialize' => ['status','brands']
        ]);
    }

    public function getStoreStatus() {
        
        $this->request->allowMethod(['post', 'put']);
        if( $this->request->is('post') ){
          $merchant =$this->Merchants->find('all')
          ->where([ 'Merchants.id' => base64_decode($this->request->getData('merchant_id')) ])
          ->select(['status'])
          ->first();

          if( $merchant ){
            $this->set([
              'status' => 1,
              'merchant' => $merchant->status,
              '_serialize' => ['status','merchant']
            ]);
          } else {
            $this->set([
                'status' => 0,
                '_serialize' => ['status']
            ]);
          }

        }
    }

    public function setStoreStatus() {
        
        $this->request->allowMethod(['post', 'put']);
        if( $this->request->is('post') ){
          $merchant =$this->Merchants->find('all')
          ->where([ 'Merchants.id' => base64_decode($this->request->getData('merchant_id')) ])
          ->select(['status'])
          ->first();

          if( $merchant ){
            
            $merchantsTable = TableRegistry::getTableLocator()->get('Merchants');
            $merchant = $merchantsTable->newEntity();

            $merchant->id = base64_decode($this->request->getData('merchant_id'));
            $merchant->status = $this->request->getData('status');

            if ($merchantsTable->save($merchant)) {
              $this->set([
                  'status' => 1,
                  '_serialize' => ['status']
              ]);  
            } else {
              $this->set([
                  'status' => 0,
                  '_serialize' => ['status']
              ]);  
            }
            
          } else {
            $this->set([
                'status' => 0,
                '_serialize' => ['status']
            ]);
          }

        }
    }
    

}
