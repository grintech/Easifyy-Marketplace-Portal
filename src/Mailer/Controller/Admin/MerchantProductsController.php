<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\BaseController;
use Cake\ORM\Query;
use Cake\ORM\Table;
use App\Model\Entity\Role;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
/**
 * MerchantProducts Controller
 *
 * @property \App\Model\Table\MerchantProductsTable $MerchantProducts
 *
 * @method \App\Model\Entity\MerchantProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantProductsController extends BaseController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadComponent('Auth');
        // $this->Auth->allow( ['login','forgotPassword','resetPassword']);
    }

    public function selectProduct() {
        $product_categories = '';
        $this->loadModel('Categories');
        $this->loadModel('ProductCategories');
       
            $product_categories = $this->ProductCategories->find()
            ->select([
                'Categories.id',
                'Categories.name',
                'Categories.image',
                'count' => $this->ProductCategories->find()->func()->count('Categories.id')
            ])
            ->contain('Categories') ->group(['Categories.id'])
            ->all();
       
        $this->set(compact('product_categories'));
    }


    public function selectProductByCategory($id=null) {
        $this->autoRender = false;
        if ($this->RequestHandler->accepts('html')) {
            return 's';
        }
        $products_list ='';
        $this->loadModel('Categories');
        $this->loadModel('ProductCategories');
         if($id) {
            $products_list = $this->ProductCategories->find('all', 
                ['conditions' =>['category_id' =>$id]
            ])->select([
                'Products.id',
                'Products.title',
                'Products.description'
            ])
            ->contain(['Products']);
         } 
           
         return $this->response
         ->withType('application/json')
         ->withStringBody(json_encode([
            $products_list
         ]));
     }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->loadModel('Products');
        $user_id = $this->Auth->user('id');
        $this->paginate = [
            'contain' => ['ProductTypes', 'ParentProducts', 'ProductGalleries'],
            'conditions' => [
                    'Products.delete_status'=>1,
                    'Products.author'=> $user_id
                ],
            'order' => ['Products.created DESC']
        ];
        $products = $this->paginate($this->Products);
        $this->set(compact('products'));
    }

    /*
     * Listing all the categories on a page
     */

    

    /**
     * View method
     *
     * @param string|null $id Merchant Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
    	//$merchantProduct = $this->MerchantProducts->get($id, [
            // 'contain' => ['Merchants', 'Products', 'ProductTypes', 'ParentMerchantProducts', 'MerchantProductBrands', 'MerchantProductCategories', 'MerchantProductGalleries', 'ChildMerchantProducts','MerchantProductBundledItems', 'PurchaseItems'],
        //]);

        $merchantProduct = $this->MerchantProducts->get($id, [
            'contain' => ['Merchants'],
        
        ]);
		$this->set('merchantProduct', $merchantProduct);
    }

    public function slugify($text){
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);
	  	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  	$text = preg_replace('~[^-\w]+~', '', $text);
	  	$text = trim($text, '-');
	  	$text = preg_replace('~-+~', '-', $text);
	  	$text = strtolower($text);
	  	return $text;
	}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */    
    /**
     * Edit method
     *
     * @param string|null $id Merchant Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Brands');
        $this->loadModel('Categories');
        $this->loadModel('Products');

        $id = base64_decode($id);
        $product = $this->Products->get($id, [
            'contain' => ['ParentProducts', 'ProductBrands', 'ProductCategories', 'ProductGalleries', 'ChildProducts'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

             if (!empty($product->child_products)){
                foreach ($product->child_products as $childProducts){
                    $entity = $this->Products->get($childProducts->id);
                    $result = $this->Products->delete($entity);
                }
             }       
            $product_id ='';
            $parent_id  ='';
            $product_arr['id'] =$id;
            $product_arr['title'] =$this->request->getData('title');
            $product_arr['description'] =$this->request->getData('description');
            $product_arr['status'] =$this->request->getData('status');
			$product_arr['_basic_price'] =$this->request->getData('_basic_price');
			$product_arr['_standard_price'] =$this->request->getData('_standard_price');
			$product_arr['_premium_price'] =$this->request->getData('_premium_price');
			$product_arr['_basic_price_desc'] =$this->request->getData('_basic_price_desc');
			$product_arr['_standard_price_desc'] =$this->request->getData('_standard_price_desc');
			$product_arr['_premium_price_desc'] =$this->request->getData('_premium_price_desc');
            $product_arr['_basic_plan_time'] =$this->request->getData('_basic_plan_time');
			$product_arr['_standard_plan_time'] =$this->request->getData('_standard_plan_time');
            $product_arr['_premium_plan_time'] =$this->request->getData('_premium_plan_time');
            $product_arr['is_addon'] =$this->request->getData('is_addon');

            $product_data =[];
            $product_data['parent'][] =$product_arr;

            //echo '<pre>'; print_r($product_data['parent']); echo '</pre>'; 
            if(!empty($product_data['parent'])){
               //$product = $this->Products->newEntity();
               $product = $this->Products->get($id);       
               $product = $this->Products->patchEntity($product,$product_data['parent'][0]);
               if ($this->Products->save($product)) {
                     $product_id=$product->id; 
                }
            }
     
            if ($product_id) {
              if(!empty($product_data['child'])){
                 $this->saveProductChild($product_id,$product_data['child'],'Products');
              }
              if( ($this->request->getData('product_type_id') == 4) ){
               if (!empty($product->product_bundled_items)){
                    foreach ($product->product_bundled_items as $productBundledItems){
                        $entity = $this->Products->ProductBundledItems->get($productBundledItems->id);
                        $result = $this->Products->ProductBundledItems->delete($entity);
                    }
                 }
                    $this->saveProductBundledItems($product_id,$this->request->getData('bundled'),'ProductBundledItems');
                }
                if($this->request->getData('category_id')){
                    foreach($this->request->getData('category_id') as $key =>$category){
                         $productCategory_arr[] =  $category;     
                    }
                    // echo '<pre>';
                    //     print_r($productCategory_arr);
                    // echo '</pre>';
                    // die;
                    $this->saveProductCategories($product_id,$productCategory_arr,'ProductCategories');
                }

                if($brand_id=$this->request->getData('brand_id')){
                     $this->saveProductBrand($product_id,$brand_id,'ProductBrands');
                }
                if($url = $this->request->getData('url')){
                    $this->saveProductFeatured($product_id,$url,'ProductGalleries');
                }
                if($urls = $this->request->getData('urls')){
                     $this->saveProductGallery($product_id,$urls,'ProductGalleries');

                }
               $this->Flash->success(__('The product has been saved.'));

               return $this->redirect(['action' => 'edit', base64_encode($id) ]);  
            }else{
                //print_r($product->getErrors());
                //die('he4re');
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $brands =  $this->Brands->find('list', ['limit' => 200]);
        $categories =  $this->Categories->ParentCategories->find('all', [ 
            'select' => ['id','name'],
            'contain' => [ 'ChildCategories'],'limit' => 200]);
        
        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
        $parentProducts = $this->Products->ParentProducts->find('list', ['limit' => 200]);
        $this->set(compact('product', 'productTypes', 'parentProducts','brands','categories'));
        $this->render('add');
    }

    public function addCustomProduct()
    {        
        $this->loadModel('Products');
        $this->loadModel('Categories');
        $product = $this->Products->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product_id ='';
            $user_id = $this->Auth->user('id');
            $query =$this->Products->
            find('all', ['select' => ['id','title']])->where(['id' => $this->request->getData('title')])->limit(1);
            $results = $query->toArray();
            $title=$results[0]['title'];
            $product_arr['title'] =$title;
            $product_arr['parent_id'] =$this->request->getData('title');
            $product_arr['description'] =$this->request->getData('description');
            $product_arr['status'] =$this->request->getData('status');
			$product_arr['_basic_price'] =$this->request->getData('_basic_price');
			$product_arr['_standard_price'] =$this->request->getData('_standard_price');
			$product_arr['_premium_price'] =$this->request->getData('_premium_price');
			$product_arr['_basic_price_desc'] =$this->request->getData('_basic_price_desc');
			$product_arr['_standard_price_desc'] =$this->request->getData('_standard_price_desc');
			$product_arr['_premium_price_desc'] =$this->request->getData('_premium_price_desc');
            $product_arr['_basic_plan_time'] =$this->request->getData('_basic_plan_time');
			$product_arr['_standard_plan_time'] =$this->request->getData('_standard_plan_time');
            $product_arr['_premium_plan_time'] =$this->request->getData('_premium_plan_time');
            $product_arr['is_addon'] =$this->request->getData('is_addon');
            $product_arr['author'] =$user_id;
			$product_data =[];
            $product_data['parent'][] =$product_arr;
            if(!empty($product_data['parent'])){
               	$product = $this->Products->newEntity();
               	$product = $this->Products->patchEntity($product,$product_data['parent'][0]);
               	if ($this->Products->save($product)) {
                    $product_id=$product->id;   
                }
            }
			if ($product_id) {   
                if($this->request->getData('category_id')){
                    $this->loadModel('ProductCategories');
                    $pCategories = $this->ProductCategories->newEntity();
                    $pCategories->product_id = $product_id;
                    $pCategories->category_id = $this->request->getData('category_id');
                    
                    $this->ProductCategories->save($pCategories);
                }
	            if($url = $this->request->getData('url')){
	                $this->saveProductFeatured($product_id,$url,'ProductGalleries');
	            }
	            if($urls = $this->request->getData('urls')){
	                $this->saveProductGallery($product_id,$urls,'ProductGalleries');
	            }
				$this->Flash->success(__('The product has been saved.'));
				return $this->redirect(['action' => 'index']);
	        }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }  
        $this->loadModel('Categories');
        $categories =  $this->Categories->find('list')->select(['id','name'])->where(['parent_id IS' => null ]);  
        //$subCategories =  $this->Categories->find()->select(['id','parent_id','name'])->where(['parent_id IS NOT' => null ]);  
        $subCategories='';
        //$this->set('categories', $categories);               
        $this->set(compact('product','categories','subCategories'));
 
    }        
    public function customProduct()
    {  
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $product = $this->Products->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            //dd( $this->request->getData());
            $category = $this->Categories->newEntity();
            $cate_arr['name'] = $this->request->getData('_category_name');
            $cate_arr['description'] =$this->request->getData('_category_name');
            $cate_arr['user_id'] =$this->Auth->user('id');
            $cate_arr['image'] ='';
            $category = $this->Categories->patchEntity($category,$cate_arr);
            if ( $this->Categories->save($category) ) {
                $category_id=$category->id;
                $category = $this->Categories->newEntity();
                $sub_cate_arr['name'] = $this->request->getData('_sub_category_name');
                $sub_cate_arr['description'] =$this->request->getData('_sub_category_name');
                $sub_cate_arr['user_id'] =$this->Auth->user('id');
                $sub_cate_arr['parent_id'] =$category_id;
                $sub_cate_arr['image'] ='';
                $category = $this->Categories->patchEntity($category,$sub_cate_arr);
                if ( $this->Categories->save($category) ) {
                    $product_id ='';
                    $category_id=$category->id;
                    $product_arr['title'] =$this->request->getData('_title');
                    $product_arr['description'] =$this->request->getData('_description');
                    $product_arr['status'] =$this->request->getData('status');
                    $product_arr['_basic_price'] =$this->request->getData('_basic_price');
                    $product_arr['_standard_price'] =$this->request->getData('_standard_price');
                    $product_arr['_premium_price'] =$this->request->getData('_premium_price');
                    $product_arr['_basic_price_desc'] =$this->request->getData('_basic_price_desc');
                    $product_arr['_standard_price_desc'] =$this->request->getData('_standard_price_desc');
                    $product_arr['_premium_price_desc'] =$this->request->getData('_premium_price_desc');
                    $product_arr['_basic_plan_time'] =$this->request->getData('_basic_plan_time');
                    $product_arr['_standard_plan_time'] =$this->request->getData('_standard_plan_time');
                    $product_arr['_premium_plan_time'] =$this->request->getData('_premium_plan_time');
                    $product_arr['is_addon'] =$this->request->getData('is_addon');
                    $product_arr['author'] =$this->Auth->user('id');
                    $product_data =[];
                    $product_data['parent'][] =$product_arr;
                    if(!empty($product_data['parent'])){
                           $product = $this->Products->newEntity();
                           $product = $this->Products->patchEntity($product,$product_data['parent'][0]);
                           if ($this->Products->save($product)) {
                            $product_id=$product->id;   
                        }
                    }
                    if ($product_id) {   
                        if($this->request->getData('_sub_category_name')){
                            $this->loadModel('ProductCategories');
                            $pCategories = $this->ProductCategories->newEntity();
                            $pCategories->product_id = $product_id;
                            $pCategories->category_id = $category_id;
                            
                            $this->ProductCategories->save($pCategories);
                        }
                        if($url = $this->request->getData('url')){
                            $this->saveProductFeatured($product_id,$url,'ProductGalleries');
                        }
                        if($urls = $this->request->getData('urls')){
                            $this->saveProductGallery($product_id,$urls,'ProductGalleries');
                        }
                        $this->Flash->success(__('The product has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                }
            }
            print_r($product->errors());
        }
        $this->set(compact('product'));
    }
    public function edit_backup($id = null)
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
        //$this->request->allowMethod(['post', 'delete']);
        $id = base64_decode($id);
        $merchantData = $this->getMerchantId();
        $merchant_id = $merchantData->id;               

        $merchantProduct = $this->MerchantProducts->find('all')
        ->where(['MerchantProducts.id' => $id, 'MerchantProducts.merchant_id' => $merchant_id ])
        ->first();

        if( !$merchantProduct ) {
            $this->Flash->error(__($this->unauthMessage));
            return $this->redirect($this->referer());
        }

        $merchantProduct->delete_status = 0;
        if ($this->MerchantProducts->save($merchantProduct)) {

            if( $merchantProduct->product_type_id == 2 ) {
                $merchantChildProduct = $this->MerchantProducts->find('all')
                ->where(['MerchantProducts.parent_id' => $id, 'MerchantProducts.merchant_id' => $merchant_id ]);
                if( $merchantChildProduct ) {
                    foreach ($merchantChildProduct as $key => $child) {
                        $child->delete_status = 0;
                        $this->MerchantProducts->save($child);

                    }
                }
            }

            $this->Flash->success(__('The merchant product has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
