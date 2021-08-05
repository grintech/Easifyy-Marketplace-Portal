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
    public function getMerchantId()
    {
        $this->loadModel('Users');
        $this->loadModel('Merchants');
        $user = $this->Users->get($this->Auth->user('id'));
        $id = $user->id;
        
        $merchant = $this->Merchants->find('all')
        ->where(['user_id' => $id])
        ->first();
        return $merchant;   
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
        $products_list ='';
        $this->loadModel('Categories');
        $this->loadModel('ProductCategories');
         if($id) {
            $products_list = $this->ProductCategories->find('all', 
                ['conditions' =>['category_id' =>$id]
            ])
            ->contain(['Products','Products.ProductGalleries']);
         } 
           
        $this->set(compact('products_list'));
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $product_id = $id;
        $merchantData = $this->getMerchantId();
        $merchant_id = $merchantData->id;

    	$this->paginate = [
     	       'contain' => ['Merchants'],
               'order' => ['MerchantProducts.created DESC'],
     	       'conditions' => [
     	       				'MerchantProducts.product_type_id IN' =>['1','2','4'],
     	   					'MerchantProducts.delete_status'=>1,
                            'MerchantProducts.merchant_id' => $merchant_id
     	   					],
     	   ];
    	$merchantProducts = $this->paginate($this->MerchantProducts);
        $this->set(compact('merchantProducts'));
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
    public function add($id =null)
    {
        
        $merchantData = $this->getMerchantId();
        $merchant_id = $merchantData->id;		    	
 		
		$this->loadModel('Products');
        if($id != null){
            $id =base64_decode($id);
            $product = $this->Products->get($id, [
                'contain' => ['ProductTypes', 'ParentProducts','ProductBrands', 'ProductCategories', 'ProductGalleries', 'ChildProducts'],
            ]);
        }else{
             $product = $this->Products->newEntity();
        }
            
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantProduct = $this->MerchantProducts->newEntity();
			$product_id ='';
            $parent_id  ='';
            $product_arr['title'] =$this->request->getData('title');
            $product_arr['description'] =$this->request->getData('description');
            $product_arr['product_type_id'] =$this->request->getData('product_type_id');
            $product_arr['status'] =$this->request->getData('status');
            $product_arr['_hsn_code'] =$this->request->getData('_hsn_code');
            $product_arr['_is_taxable'] =$this->request->getData('_is_taxable');
            $product_arr['_tax_inclusive'] =$this->request->getData('_tax_inclusive');
            $product_arr['_cgst'] =$this->request->getData('_cgst');
            $product_arr['_sgst'] =$this->request->getData('_sgst');
            $product_arr['_igst'] =$this->request->getData('_igst');
            $product_arr['slug'] = $this->slugify($this->request->getData('title'));
            $product_arr['merchant_id'] = $merchant_id;
            $product_arr['product_id'] = $id;
            $product_data =[];
            foreach($this->request->getData('_price') as $key => $val) {   
                $k=0;
                 if($val){
                    $k++;
                    $product_arr['_item_code'] =$this->request->getData('_item_code')[$key];
                    $product_arr['_bar_code'] =$this->request->getData('_bar_code')[$key];
                    $product_arr['product_unit_id'] =$this->request->getData('product_unit_id')[$key];
                    $product_arr['_weight'] =$this->request->getData('_weight')[$key];
                    $product_arr['_price'] =$this->request->getData('_price')[$key];
                    $product_arr['_sale_price'] =$this->request->getData('_sale_price')[$key];
                    $product_arr['_stock'] =$this->request->getData('_stock')[$key];
                    if($k== 1){
                        $product_data['parent'][] =$product_arr; 
                    }
                    if( ($this->request->getData('product_type_id') == 2) ){
                        $product_data['child'][] =$product_arr;
                    }
                 }
            }
            // echo '<pre>';
            //     print_r($product_data);
            // echo '</pre';
            if(!empty($product_data['parent'])){
               $product = $this->MerchantProducts->newEntity();
               $product = $this->MerchantProducts->patchEntity($product,$product_data['parent'][0]);
               
               //$product->merchant_id = 44;
               // $product->slug = $this->merchant_product_slugify($this->request->getData('title'));
                if ($this->MerchantProducts->save($product)) {
                    $product_id=$product->id;     
                } else {
                    print_r($product->getErrors());
                    die('here');
                }
                
            }
           
            if ($product_id) {
                if(!empty($product_data['child'])){
                    $this->saveProductChild($product_id,$product_data['child'],'MerchantProducts');
                }
               if( ($this->request->getData('product_type_id') == 4) ){
                    $this->saveProductBundledItems($product_id,$this->request->getData('bundled'),'ProductBundledItems','merchant_product_id');
                }
                if (!empty($product->product_categories)) {
                    // foreach($this->request->getData('category_id') as $key =>$category){
                    //      $productCategory_arr[] =  $category;     
                    // }
                    foreach ($product->product_categories as $productCategories){
                        $productCategory_arr[] =  array('category_id' => $productCategories->category_id );
                    }
                    $this->saveProductCategories($product_id,$productCategory_arr,'MerchantProductCategories','merchant_product_id');
                }

               if (!empty($product->product_brands)){
                    foreach ($product->product_brands as $productBrands){
                        $brand_id = $productBrands->brand_id;
                    }
                    $this->saveProductBrand($product_id,$brand_id,'MerchantProductBrands','merchant_product_id');
                }
                if($url = $this->request->getData('url')){
                    $this->saveProductFeatured($product_id,$url,'MerchantProductGalleries','merchant_product_id');
                }
                if($urls = $this->request->getData('urls')){
                    $this->saveProductGallery($product_id,$urls,'MerchantProductGalleries','merchant_product_id');
                }

            $this->Flash->success(__('The product has been saved.'));
            return $this->redirect(['action' => 'edit', base64_encode($product_id) ]);
            
            } else{
                $this->Flash->erro(__( implode(',', $product->getErrors()) ));
                
            }
            
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
            
        }
        $merchants = $this->MerchantProducts->Merchants->find('list', ['limit' => 200]);
        $products = $this->MerchantProducts->Products->find('list', ['limit' => 200]);
        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
        $parentProducts = $this->Products->ParentProducts->find('list', ['limit' => 200]);
       // $this->set(compact('product', 'productTypes', 'parentProducts'));
        //$productTypes = $this->MerchantProducts->ProductTypes->find('list', ['limit' => 200]);
        $parentMerchantProducts = $this->MerchantProducts->ParentMerchantProducts->find('list', ['limit' => 200]);
        $this->set('preset_flag', 1);
        $this->set(compact('merchantProduct', 'merchants','product', 'products', 'productTypes', 'parentMerchantProducts'));
        
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
        $id = base64_decode($id);
        $product_id = $id;
        $merchantData = $this->getMerchantId();
        $merchant_id = $merchantData->id;
        
        // $product = $merchantProduct = $this->MerchantProducts->get($id, [
        //     'contain' => ['Merchants', 'Products', 'ProductTypes', 'ParentMerchantProducts', 'MerchantProductBrands', 'MerchantProductCategories', 'MerchantProductGalleries', 'ChildMerchantProducts','MerchantProductBundledItems'],
        // ]);
        // $userId = $this->Auth->user('id');
        // $this->loadModel('Merchants');
        
 		// $tableRegObj = TableRegistry::get('Merchants');
 		// $getAllResults = $tableRegObj
			// 	    	->find()
			// 	    	->select(['id'])
			// 	    	->where(['user_id' => $userId])
			// 	    	->toArray();  
		

        $product = $merchantProduct = $this->MerchantProducts->find('all')
        ->where([ 'MerchantProducts.id' => $id, 'MerchantProducts.merchant_id' => $merchant_id ])
        ->contain(['ProductTypes', 'ParentMerchantProducts','MerchantProductBrands', 'MerchantProductCategories', 'MerchantProductGalleries', 'ChildMerchantProducts', 'MerchantProductBundledItems'])
        ->first();
        
        if( $product == null ) {
            $this->Flash->error(__($this->unauthMessage));
            return $this->redirect($this->referer());
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
	            $existingproducts = [];
                if (!empty($product->child_merchant_products)){
                    foreach ($product->child_merchant_products as $child_products){
                         $existingproducts[] =$child_products->id;
                    }
                }
            $product_id; //$product_id ='';
            $parent_id  ='';
            $product_arr['title'] =$this->request->getData('title');
            $product_arr['description'] =$this->request->getData('description');
            $product_arr['product_type_id'] =$this->request->getData('product_type_id');
            $product_arr['status'] =$this->request->getData('status');
            $product_arr['_hsn_code'] =$this->request->getData('_hsn_code');
            $product_arr['_is_taxable'] =$this->request->getData('_is_taxable');
            $product_arr['_tax_inclusive'] =$this->request->getData('_tax_inclusive');
            $product_arr['_cgst'] =$this->request->getData('_cgst');
            $product_arr['_sgst'] =$this->request->getData('_sgst');
            $product_arr['_igst'] =$this->request->getData('_igst');
            $product_arr['merchant_id'] = $merchant_id;
            $product_arr['product_id']=$product_id;
            $product_data =[];
            $new_product_to_insert =[];
            $product_data['child']=array();
            foreach($this->request->getData('_price') as $key => $val){   
                $k=0;
                if($val){
                    $k++;
                    $product_arr['_item_code'] =$this->request->getData('_item_code')[$key];
                    $product_arr['_bar_code'] =$this->request->getData('_bar_code')[$key];
                    $product_arr['product_unit_id'] =$this->request->getData('product_unit_id')[$key];
                    $product_arr['_weight'] =$this->request->getData('_weight')[$key];
                    $product_arr['_price'] =$this->request->getData('_price')[$key];
                    $product_arr['_sale_price'] =$this->request->getData('_sale_price')[$key];
                    $product_arr['_stock'] =$this->request->getData('_stock')[$key];
                    if($k == 1){
                        $product_data['parent'][] =$product_arr; 
                    }
                    if(($this->request->getData('product_type_id') == 2)){
                         $product_data['child'][] =$product_arr;
                    }
                }
            }
            // echo '<pre>';
            //     print_r($product_data['child']);
            // echo '</pre>';    
            // die();

    //         if($this->request->getData('product_type_id') == 2){
    //         	foreach($this->request->getData('_product') as $key => $val){
    //                  $product_arr['product_id'] = $this->request->getData('_product')[$key];
    //                  $new_product= $this->request->getData('_product')[$key];
    //                  $product_data['child'][] =$product_arr;
    //                  if( in_array( $new_product, $existingproducts ) ){
    //                     $key = array_search( $new_product, $existingproducts); 
    //                     if( $key >= 0 ) {
    //                         unset($existingproducts[$key]) ; 
    //                     }
    //                 }
				// }

    //         }
			if(!empty($product_data['parent'])){
               $product = $this->MerchantProducts->patchEntity($product,$product_data['parent'][0]);
               if ($this->MerchantProducts->save($product)) {
                    $product_id=$product->id;     
                }
            } 
           	$product_id=$id;
            if ($product_id) {
	              if(!empty($product_data['child'])){
	                 $this->saveProductChild($product_id,$product_data['child'],'MerchantProducts');
	                if(!empty($existingproducts)){
	                     foreach($existingproducts as $product ){
	                        $orderItem = $this->MerchantProducts->find('all', [
	                                            'contain' => [],
	                                            'conditions' =>['parent_id' => $product_id,'id' =>$product]
	                                      ])->first();
	                        if ($this->MerchantProducts->delete($orderItem)) {
	                            
	                        }
	                    }
	                }
	              }
	              if( ($this->request->getData('product_type_id') == 4) ){
	                    $this->saveProductBundledItems($product_id,$this->request->getData('bundled'),'ProductBundledItems','merchant_product_id');
	                }
	             if($this->request->getData('category_id')){
	                foreach($this->request->getData('category_id') as $key =>$category){
	                     $productCategory_arr[] =  $category;     
	                }
	                $this->saveProductCategories($product_id,$productCategory_arr,'MerchantProductCategories','merchant_product_id');
	             }
	             if($brand_id=$this->request->getData('brand_id')){
	                 $this->saveProductBrand($product_id,$brand_id,'MerchantProductBrands','merchant_product_id');
	             }
	            if($url = $this->request->getData('url')){
	                 $this->saveProductFeatured($product_id,$url,'MerchantProductGalleries','merchant_product_id');
	            }
	            if($urls = $this->request->getData('urls')){
	                 $this->saveProductGallery($product_id,$urls,'MerchantProductGalleries','merchant_product_id');
	            }

	            $this->Flash->success(__('The product has been saved.'));
	            return $this->redirect(['action' => 'index']);
            
            } else {
                 // print_r($product->getErrors());
                $this->Flash->success(__(implode(',', $product->getErrors())));
                 // die('1here');
            }
            
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $merchants = $this->MerchantProducts->Merchants->find('list', ['limit' => 200]);
        $products = $this->MerchantProducts->Products->find('list', ['limit' => 200]);
        $productTypes = $this->MerchantProducts->ProductTypes->find('list', ['limit' => 200]);
        $parentMerchantProducts = $this->MerchantProducts->ParentMerchantProducts->find('list', ['limit' => 200]);
        // echo '<pre>';
        // print_r($product);
        // echo'</pre>';
        $this->set(compact('product','merchantProduct', 'merchants', 'products', 'productTypes', 'parentMerchantProducts'));
        $this->render('add');
    }

    public function addCustomProduct()
    {
        
        $merchantData = $this->getMerchantId();
        $merchant_id = $merchantData->id;               
        
        $this->loadModel('Products');
        // if($id != null){
        //     $id =base64_decode($id);
        //     $product = $this->Products->get($id, [
        //         'contain' => ['ProductTypes', 'ParentProducts','ProductBrands', 'ProductCategories', 'ProductGalleries', 'ChildProducts'],
        //     ]);
        // }else{
        //      $product = $this->Products->newEntity();
        // }
            
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantProduct = $this->MerchantProducts->newEntity();
            $product_id ='';
            $parent_id  ='';
            $product_arr['title'] =$this->request->getData('title');
            $product_arr['description'] =$this->request->getData('description');
            $product_arr['product_type_id'] =$this->request->getData('product_type_id');
            $product_arr['status'] =$this->request->getData('status');
            $product_arr['_hsn_code'] =$this->request->getData('_hsn_code');
            $product_arr['_is_taxable'] =$this->request->getData('_is_taxable');
            $product_arr['_tax_inclusive'] =$this->request->getData('_tax_inclusive');
            $product_arr['_cgst'] =$this->request->getData('_cgst');
            $product_arr['_sgst'] =$this->request->getData('_sgst');
            $product_arr['_igst'] =$this->request->getData('_igst');
            $product_arr['slug'] = $this->slugify($this->request->getData('title'));
            $product_arr['merchant_id'] = $merchant_id;
            $product_arr['product_id'] = $id;
            $product_data =[];
            foreach($this->request->getData('_price') as $key => $val) {   
                $k=0;
                 if($val){
                    $k++;
                    $product_arr['_item_code'] =$this->request->getData('_item_code')[$key];
                    $product_arr['_bar_code'] =$this->request->getData('_bar_code')[$key];
                    $product_arr['product_unit_id'] =$this->request->getData('product_unit_id')[$key];
                    $product_arr['_weight'] =$this->request->getData('_weight')[$key];
                    $product_arr['_price'] =$this->request->getData('_price')[$key];
                    $product_arr['_sale_price'] =$this->request->getData('_sale_price')[$key];
                    $product_arr['_stock'] =$this->request->getData('_stock')[$key];
                    if($k== 1){
                        $product_data['parent'][] =$product_arr; 
                    }
                    if( ($this->request->getData('product_type_id') == 2) ){
                        $product_data['child'][] =$product_arr;
                    }
                 }
            }
            // echo '<pre>';
            //     print_r($product_data);
            // echo '</pre';
            if(!empty($product_data['parent'])){
               $product = $this->MerchantProducts->newEntity();
               $product = $this->MerchantProducts->patchEntity($product,$product_data['parent'][0]);
               
               //$product->merchant_id = 44;
               // $product->slug = $this->merchant_product_slugify($this->request->getData('title'));
                if ($this->MerchantProducts->save($product)) {
                    $product_id=$product->id;     
                } else {
                    print_r($product->getErrors());
                    die('here');
                }
                
            }
           
            if ($product_id) {
                if(!empty($product_data['child'])){
                    $this->saveProductChild($product_id,$product_data['child'],'MerchantProducts');
                }
               if( ($this->request->getData('product_type_id') == 4) ){
                    $this->saveProductBundledItems($product_id,$this->request->getData('bundled'),'ProductBundledItems','merchant_product_id');
                }
                if (!empty($product->product_categories)) {
                    // foreach($this->request->getData('category_id') as $key =>$category){
                    //      $productCategory_arr[] =  $category;     
                    // }
                    foreach ($product->product_categories as $productCategories){
                        $productCategory_arr[] =  array('category_id' => $productCategories->category_id );
                    }
                    $this->saveProductCategories($product_id,$productCategory_arr,'MerchantProductCategories','merchant_product_id');
                }

               if (!empty($product->product_brands)){
                    foreach ($product->product_brands as $productBrands){
                        $brand_id = $productBrands->brand_id;
                    }
                    $this->saveProductBrand($product_id,$brand_id,'MerchantProductBrands','merchant_product_id');
                }
                if($url = $this->request->getData('url')){
                    $this->saveProductFeatured($product_id,$url,'MerchantProductGalleries','merchant_product_id');
                }
                if($urls = $this->request->getData('urls')){
                    $this->saveProductGallery($product_id,$urls,'MerchantProductGalleries','merchant_product_id');
                }

            $this->Flash->success(__('The product has been saved.'));
            return $this->redirect(['action' => 'edit', base64_encode($product_id) ]);
            
            } else{
                $this->Flash->erro(__( implode(',', $product->getErrors()) ));
                
            }
            
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
            
        }
       //  $merchants = $this->MerchantProducts->Merchants->find('list', ['limit' => 200]);
       //  $products = $this->MerchantProducts->Products->find('list', ['limit' => 200]);
       //  $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
       //  $parentProducts = $this->Products->ParentProducts->find('list', ['limit' => 200]);
       // // $this->set(compact('product', 'productTypes', 'parentProducts'));
       //  //$productTypes = $this->MerchantProducts->ProductTypes->find('list', ['limit' => 200]);
       //  $parentMerchantProducts = $this->MerchantProducts->ParentMerchantProducts->find('list', ['limit' => 200]);
       //  $this->set('preset_flag', 1);
       //  $this->set(compact('merchantProduct', 'merchants','product', 'products', 'productTypes', 'parentMerchantProducts'));
        
    }

    public function add_custom_product()
    {
        $this->loadModel('Products');
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $merchantProduct = $this->MerchantProducts->patchEntity($merchantProduct, $this->request->getData());
            if ($this->MerchantProducts->save($merchantProduct)) {
                $this->Flash->success(__('The merchant product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product could not be saved. Please, try again.'));
        }
        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
        $parentProducts = $this->Products->ParentProducts->find('list', ['limit' => 200]);
        $this->set(compact('product', 'productTypes', 'parentProducts'));
    }

    public function edit_bachup($id = null)
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
