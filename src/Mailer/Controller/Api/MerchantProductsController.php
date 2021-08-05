<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Routing\Router;
/**
 * MerchantProducts Controller
 *
 * @property \App\Model\Table\MerchantProductsTable $MerchantProducts
 *
 * @method \App\Model\Entity\MerchantProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function merchantallproducts()
    {
        $this->request->allowMethod(['post', 'put']);
        $this->loadModel('Merchants');
        $merchant_id  = $this->request->getData('merchant_id');

        $merchants = $this->Merchants->get($merchant_id, [
            'contain' => [],
        ]);

        // $merchantProducts = $this->MerchantProducts->find('all',[ 
        //                         'contain' => ['Merchants','ParentMerchantProducts', 'MerchantProductBrands', 'MerchantProductCategories', 'MerchantProductGalleries', 'ChildMerchantProducts'
        //                     ],
        //                         'conditions' => [
        //                             'MerchantProducts.merchant_id' => $merchant_id,
        //                             'product_type_id IN' => [1,2,4],
        //                             'delete_status' => 1
        //                         ] 
        //                     ]);

      
        if ($this->request->is('post')) {
          
            if($this->request->getData('categories') && $this->request->getData('brands') ){
                
                $cats = $this->request->getData('categories');
                $brnd = $this->request->getData('brands');
               
                $query = $this->MerchantProducts->find()
                ->contain(
                    [
                    'Merchants',
                    'ProductUnits',
                    'ParentMerchantProducts', 
                    'MerchantProductBrands', 
                    'MerchantProductCategories', 
                    'MerchantProductGalleries', 
                    'ChildMerchantProducts'
                ]);
                $query->innerJoinWith(
                    'Merchants', function ($q) use ($merchant_id) {
                        return $q->where(['Merchants.id' => $merchant_id]);
                    }
                );
                if(!empty($cats)){
                    $query->innerJoinWith(
                        'MerchantProductCategories.Categories', function ($q) use ($cats) {
                            return $q->where(['Categories.id' => $cats],['Categories.id' => 'integer[]']);
                        }
                    );
                }
                if(!empty($brnd)){
                
                    $query->innerJoinWith(
                        'MerchantProductBrands.Brands', function ($q) use ($brnd) {
                            return $q->where(['Brands.id' => $brnd],['Brands.id' => 'integer[]']);
                        }
                    ); 
                }

                //print_r($query->sql());   
                $merchantProducts = $query->all();
            } else {
                $merchantProducts = $this->MerchantProducts->find('all',
                    [ 
                        'contain' => [
                            'Merchants',
                            'ProductUnits',
                            'ParentMerchantProducts',
                            'MerchantProductBrands',
                            'MerchantProductCategories', 
                            'MerchantProductGalleries', 
                            'ChildMerchantProducts'
                        ],
                        'conditions' => [
                            'MerchantProducts.merchant_id' => $merchant_id,
                            'MerchantProducts.product_type_id IN' => [1,2,4],
                            'MerchantProducts.delete_status' => 1
                        ] 
                    ]
                ); 
            }

        }

       
        
        $categories = $this->Merchants->MerchantProducts->MerchantProductCategories->find()
        ->contain([
                'Categories' => function ($q) {
                    return $q->distinct(['Categories.id']);
                }
            ])
        ->innerJoinWith(
                'MerchantProducts.Merchants', function ($q) use ($merchant_id) {
                    return $q->where(['Merchants.id' => $merchant_id]);
                }
            )
        ->select( ['Categories.id', 'Categories.name' ])
        ->group(['Categories.id' ])
        //->where(['Merchants.id' => $merchant_id])
        ->all()
        ->toArray();

        $brands = $this->Merchants->MerchantProducts->MerchantProductBrands->find()
        ->contain([
                'Brands' => function ($q) {
                    return $q->distinct(['Brands.id']);
                }
            ])
        ->innerJoinWith(
                'MerchantProducts.Merchants', function ($q) use ($merchant_id) {
                    return $q->where(['Merchants.id' => $merchant_id]);
                }
            )
        ->select( ['Brands.id', 'Brands.name' ])
        ->group(['Brands.id' ])
        ->all()
        ->toArray();
        $base_urls =  Router::url('/', true) ;
        $url =  $base_urls. 'img/product-images/';
         $this->set([
                    'merchants' => $merchants,
                    'categories' =>$categories,
                    'brands' => $brands,
                    'merchantProducts' => $merchantProducts,  
                    'status' => 1,
                     'url' => $url,
                    '_serialize' => ['status','merchantProducts','merchants','categories','brands','url']
                ]);
    }


    

    public function singleproduct()
    {
         $base_urls =  Router::url('/', true) ;
         $url =  $base_urls. 'img/product-images/';
         $this->request->allowMethod(['post', 'put']);
         $id = $this->request->getData('id');
        $merchantProduct = $this->MerchantProducts->get($id, [
            'contain' => ['ParentMerchantProducts', 'MerchantProductBrands', 'MerchantProductCategories', 'MerchantProductGalleries', 'ChildMerchantProducts','ProductUnits'],
        ]);

        $this->set([
                    'merchantProduct' => $merchantProduct,  
                     'status' => 1,
                     'url' => $url,
                    '_serialize' => ['status','merchantProduct','url']
                ]);
    }



    public function allmerchantsCities()
    {
        $this->loadModel('Merchants');
         $query = $this->Merchants->find();
         $query ->contain([ 'Cities'])
         ->innerJoinWith('MerchantProducts')
        ->select( [ 'Cities.id', 'Cities.name' ])
        //->where(['Merchants'])
        ->group(['Cities.id' ]);
       // ->all()
        //->toArray();
        $cities = $query->toList();
         $this->set([
            'cities' => $cities,
             'status' => 1,
            '_serialize' => ['status','cities']
        ]);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Merchants', 'Products', 'ProductTypes', 'ParentMerchantProducts'],
        ];
        $merchantProducts = $this->paginate($this->MerchantProducts);

        $this->set(compact('merchantProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Merchant Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchantProduct = $this->MerchantProducts->get($id, [
            'contain' => ['Merchants', 'Products', 'ProductTypes', 'ParentMerchantProducts', 'MerchantProductBrands', 'MerchantProductCategories', 'ProductUnits','MerchantProductGalleries', 'ChildMerchantProducts', 'PurchaseItems'],
        ]);

        $this->set('merchantProduct', $merchantProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchantProduct = $this->MerchantProducts->newEntity();
        if ($this->request->is('post')) {
            $merchantProduct = $this->MerchantProducts->patchEntity($merchantProduct, $this->request->getData());
            if ($this->MerchantProducts->save($merchantProduct)) {
                $this->Flash->success(__('The merchant product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product could not be saved. Please, try again.'));
        }
        $merchants = $this->MerchantProducts->Merchants->find('list', ['limit' => 200]);
        $products = $this->MerchantProducts->Products->find('list', ['limit' => 200]);
        $productTypes = $this->MerchantProducts->ProductTypes->find('list', ['limit' => 200]);
        $parentMerchantProducts = $this->MerchantProducts->ParentMerchantProducts->find('list', ['limit' => 200]);
        $this->set(compact('merchantProduct', 'merchants', 'products', 'productTypes', 'parentMerchantProducts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchant Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchantProduct = $this->MerchantProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantProduct = $this->MerchantProducts->patchEntity($merchantProduct, $this->request->getData());
            if ($this->MerchantProducts->save($merchantProduct)) {
                $this->Flash->success(__('The merchant product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product could not be saved. Please, try again.'));
        }
        $merchants = $this->MerchantProducts->Merchants->find('list', ['limit' => 200]);
        $products = $this->MerchantProducts->Products->find('list', ['limit' => 200]);
        $productTypes = $this->MerchantProducts->ProductTypes->find('list', ['limit' => 200]);
        $parentMerchantProducts = $this->MerchantProducts->ParentMerchantProducts->find('list', ['limit' => 200]);
        $this->set(compact('merchantProduct', 'merchants', 'products', 'productTypes', 'parentMerchantProducts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchant Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchantProduct = $this->MerchantProducts->get($id);
        if ($this->MerchantProducts->delete($merchantProduct)) {
            $this->Flash->success(__('The merchant product has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
