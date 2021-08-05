<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\BaseController;
use Cake\ORM\Query;
use Cake\ORM\Table;
use App\Model\Entity\Role;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Mailer\Email;

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
            'contain' => ['ProductTypes','ProductCategories',
                'ProductCategories.Categories'=> [
                'fields' => [
                    'Categories.id',
                    'Categories.name',
                ]], 
                'ParentProducts', 'ProductGalleries'],
            'conditions' => [
                    'Products.delete_status'=>1,
                    'Products.author'=> $user_id
                ],
            'order' => ['Products.created DESC']
        ];
        $products = $this->paginate($this->Products);
        //dd($products);
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
        $this->loadModel('Brands');
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('ProductFaq');
        $this->loadModel('ProductPlans');

        $parentProductPlans=null;
        $ptitleDesc='';$pTitle='';$ptitleHeader='';$activatedFaq2='';
        $id = base64_decode($id);
        $product = $this->Products->get($id, [
            'contain' => ['ParentProducts','ProductCategories', 'ProductGalleries', 'ChildProducts','ProductSellerPlans','ProductFaq'],
        ]);
        $categories =  $this->Categories->find('list')->select(['id','name'])->where(['parent_id IS' => null ]);

        $CateId=$product['product_categories'][0]['category_id'];
        $subCateId=$product['product_categories'][1]['category_id'];
        //dd( $product);
        //$Subcategory =  $this->Categories->find('list')->select(['id','name'])->where(['parent_id IS' => null,'id'=>$subCateId ]);
        $Category =  $this->Categories->get($CateId);
        $Categoryname=$Category['name'];
        //dd($subCategoryname);
        if (!is_null($product->parent_product)){
            //dd($product->parent_product->id);
            $pTitle='View Activate Existing Professional Service';
            $ptitleHeader='Select Service Category & Choose service you can provide to clients';
            $ptitleDesc='Apni service banaye ek click me, sirf price or portfolio save karein';
            $parentProductPlans =$this->ProductPlans->find('all')->where(['product_id' => $product->parent_product->id])->all();
            $activatedFaq =$this->ProductFaq->find('all', ['select' => ['question','answer']])->where(['product_id' => $product->parent_product->id])->limit(12);
            //dd($parentProductPlans);
        }else{
            $pTitle='View Custom Professional Service';
            $ptitleHeader='Select Service Category & Create service you can provide to clients';
            $ptitleDesc='Add your Own New/Unique Services';
        }
        if (!is_null($subCateId) ){
            $Subcategory =  $this->Categories->get($subCateId);
            $subCategoryname=$Subcategory['name'];
        }
        //dd( $subCategoryname.'---'.$Categoryname);
        //dd($product->product_seller_plans);
        $parent_prdouct_id=$product->parent_id;
        if($parent_prdouct_id !='') {
            $parent_product_data = $this->Products->get($parent_prdouct_id, [
                'contain' => ['ParentProducts','ProductCategories',
                    'ProductCategories.Categories'=> [
                        'fields' => [
                            'Categories.id',
                            'Categories.name',
                        ]
                    ],'ProductGalleries', 'ChildProducts','ProductSellerPlans','ProductFaq'
                ],
            ]);
        }
        // dd($product);
        $this->set(compact('parent_product_data','parentProductPlans','product','categories','subCategoryname','Categoryname','pTitle','ptitleHeader','ptitleDesc','activatedFaq'));
        $this->render('view');
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
        $activatedFaq='';
        $this->loadModel('Brands');
        $this->loadModel('Categories');
        $this->loadModel('Products');
        $this->loadModel('ProductFaq');
        $this->loadModel('ProductPlans');
        
        $parentProductPlans=null;
        $productid=$id;
        $id = base64_decode($id);
        $product = $this->Products->get($id, [
            'contain' => ['ParentProducts','ProductCategories',
                'ProductCategories.Categories'=> [
                    'fields' => [
                        'Categories.id',
                        'Categories.name',
                    ]
                ],'ProductGalleries', 'ChildProducts','ProductSellerPlans','ProductFaq'
            ],
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {

            if(!empty($this->request->getData())){
               $product = $this->Products->get($id);       
               $product = $this->Products->patchEntity($product,$this->request->getData());
               if ($this->Products->save($product)) {
                     $product_id=$product->id; 
                }
            }
     
            if ($product_id) {
              if(!empty($product_data['child'])){
                 $this->saveProductChild($product_id,$product_data['child'],'Products');
              }
                if($this->request->getData('heading')){
                    foreach($this->request->getData('heading') as $key =>$heading){
                        $heading_arr[] =  $heading;     
                    }
                    foreach($this->request->getData('basic_price') as $key =>$basic_price){
                        if(is_numeric($basic_price)==false or $basic_price=="NA"){
                            $basic_price=0;
                        }
                        $basic_price_arr[] =  $basic_price;     
                    }
                    foreach($this->request->getData('std_price') as $key =>$std_price){
                        if(is_numeric($std_price)==false or $std_price=="NA"){
                            $std_price=0;
                        }
                        $std_price_arr[] =  $std_price;     
                    }
                    foreach($this->request->getData('pre_price') as $key =>$pre_price){
                        if(is_numeric($pre_price)==false or $pre_price=="NA"){
                            $pre_price=0;
                        }
                        $pre_price_arr[] =  $pre_price;     
                    }
                    foreach($this->request->getData('taxable') as $key =>$taxable){
                        $taxable_arr[] =  $taxable;     
                    }
                    //dd('2');
                    $this->saveSellerProductPlans($product_id,$heading_arr,$basic_price_arr,$std_price_arr,$pre_price_arr,$taxable_arr,'ProductSellerPlans');
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
                    $this->saveProductCategories($product_id,$productCategory_arr,'ProductCategories');
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
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories =  $this->Categories->ParentCategories->find('all', [ 
            'select' => ['id','name'],
            'contain' => [ 'ChildCategories'],'limit' => 200]);
        //dd($product);
        if (!is_null($product->parent_product)){
            $serviceType="activated";
            $activatedFaq =$this->ProductFaq->find('all', ['select' => ['question','answer']])->where(['product_id' => $product->parent_product->id])->limit(12);
            $parentProductPlans =$this->ProductPlans->find('all')->where(['product_id' => $product->parent_product->id])->all();
           
        }else{
            $serviceType="custom";
        }
        $mainCategory=$product->product_categories[0]['category']->name;
        $subCategory=$product->product_categories[1]['category']->name;
        $parent_prdouct_id=$product->parent_id;
        if($parent_prdouct_id !='') {
            $parent_product_data = $this->Products->get($parent_prdouct_id, [
                'contain' => ['ParentProducts','ProductCategories',
                    'ProductCategories.Categories'=> [
                        'fields' => [
                            'Categories.id',
                            'Categories.name',
                        ]
                    ],'ProductGalleries', 'ChildProducts','ProductSellerPlans','ProductFaq'
                ],
            ]);
        }
        $this->set(compact('productid','parent_product_data','product','mainCategory','subCategory','serviceType','activatedFaq','parentProductPlans'));
        //$this->render('add');
    }

    public function activateService()
    {        
        $this->loadModel('Products');
        $this->loadModel('Categories');
        $product = $this->Products->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
           
            $product_id ='';
            $user_id = $this->Auth->user('id');
            $query =$this->Products->find('all', ['select' => ['id','title']])->where(['id' => $this->request->getData('title')])->limit(1);
            // $query = $this->Products
            //     ->find()
            //     ->select(['id', 'title'])
            //     ->where(['title' => $this->request->getData('title')]);
            $results = $query->toArray();
            $title=$results[0]['title'];
            
            
            if(!empty($this->request->getData())){
               	$product = $this->Products->newEntity();
                $product = $this->Products->patchEntity($product,$this->request->getData());//$product_data['parent'][0]);
                //dd( $product_data['parent'][0]);
                $product->title=$title;
                $product->_title_desc=$results[0]['_title_desc'];
                $product->menu_title=$results[0]['menu_title'];
                $product->service_coverd=$results[0]['service_coverd'];
                $product->service_target=$results[0]['service_target'];
                $product->service_process=$results[0]['service_process'];
                $product->service_guide=$results[0]['service_guide'];
                $product->offer_box=$results[0]['offer_box'];
                $product->_basic_price=$this->request->getData('_basic_plan_price');
                $product->_standard_price=$this->request->getData('_standard_plan_price');
                $product->_premium_price=$this->request->getData('_premium_plan_price');
                $product->_basic_price_desc=$results[0]['_basic_price_desc'];
                $product->_standard_price_desc=$results[0]['_standard_price_desc'];
                $product->_premium_price_desc=$results[0]['_premium_price_desc'];
                $product->author=$user_id;
                $product->status=3; // user creates Service with Pending Status 
                $product->parent_id=$this->request->getData('title');

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

                if($this->request->getData('subCategory_id')){
                    $this->loadModel('ProductCategories');
                    $pCategories = $this->ProductCategories->newEntity();
                    $pCategories->product_id = $product_id;
                    $pCategories->category_id = $this->request->getData('subCategory_id');
                    
                    $this->ProductCategories->save($pCategories);
                }

                if($this->request->getData('heading')){
                    foreach($this->request->getData('heading') as $key =>$heading){
                         $heading_arr[] =  $heading;     
                    }
                    foreach($this->request->getData('basic_price') as $key =>$basic_price){
                        if(is_numeric($basic_price)==false or $basic_price=="NA"){
                            $basic_price=0;
                        }
                        $basic_price_arr[] =  $basic_price;     
                    }
                    foreach($this->request->getData('std_price') as $key =>$std_price){
                        if(is_numeric($std_price)==false or $std_price=="NA"){
                            $std_price=0;
                        }
                        $std_price_arr[] =  $std_price;     
                    }
                    foreach($this->request->getData('pre_price') as $key =>$pre_price){
                        if(is_numeric($pre_price)==false or $pre_price=="NA"){
                            $pre_price=0;
                        }
                        $pre_price_arr[] =  $pre_price;     
                    }
                    foreach($this->request->getData('taxable') as $key =>$taxable){
                        $taxable_arr[] =  $taxable;     
                    }
                    $this->saveSellerProductPlans($product_id,$heading_arr,$basic_price_arr,$std_price_arr,$pre_price_arr,$taxable_arr,'ProductSellerPlans');
                }
                
	            if($url = $this->request->getData('url')){
	                $this->saveProductFeatured($product_id,$url,'ProductGalleries');
	            }
	            if($urls = $this->request->getData('urls')){
	                $this->saveProductGallery($product_id,$urls,'ProductGalleries');
                }
                $email=$this->Auth->user('username');
                $msg="Service Name :".$title;
                $this->sendmail($email,$msg,$results);
                $this->sendmail('easifyy@gmail.com',$msg,$results);
                //$this->sendmail('easifyy@gmail.com',$msg.'<br/> UserMail:'.$email);

				//$this->Flash->success(__('The product has been saved.'));
                //return $this->redirect(['action' => 'index']);
                $data = array(base64_encode($product_id),$product_id);
                //$this->response->body(json_encode(base64_encode($product_id)));
                $this->response->body(json_encode($data));
                return $this->response;
	        }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }  
        $this->loadModel('Categories');
        $categories =  $this->Categories->find('list')->select(['id','name'])->where(['parent_id IS' => null,'id !=' => '8266' ]);  
        //$subCategories =  $this->Categories->find()->select(['id','parent_id','name'])->where(['parent_id IS NOT' => null ]);  
        $subCategories='';

        //$this->set('categories', $categories);               
        $this->set(compact('product','categories','subCategories'));
 
    }
       
    public function sendmail($UserEmail,$msg,$orderData){
        $this->viewBuilder()->setLayout(false);
        $email = new Email();
        $email
        ->template('easifyy_service_created_successfully','easify') 
        ->setViewVars(
            [
                'vendor' => 'PSP',
                'job_title' => $orderData[0]['_title_desc'],
                'job_slug' => $orderData[0]['menu_title'],
                'job_coverd' => $orderData[0]['service_coverd'],
                'job_target' => $orderData[0]['service_target'],
                'job_process' => $orderData[0]['service_process'],
                'job_guide' => $orderData[0]['service_guide'],
                'job_link' => BASE_URL.'/service-details/'.$orderData[0]['slug'],
            ]
        )
        ->from(['connect@easifyy.com' => 'Easifyy'])
        ->emailFormat('html')
        ->to($UserEmail)
        ->subject('Service Created Successfully')
        ->send($msg);
    }
    public function customService()
    {  
        $this->loadModel('Categories');
        $this->loadModel('Products');

        $categories =  $this->Categories->find('list')->select(['id','name'])->where(['parent_id IS' => null, 'user_id IS'=> null ]);  

        $product = $this->Products->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            //dd( $this->request->getData());
           // $category = $this->Categories->newEntity();
            //$cate_arr['name'] = $this->request->getData('_category_name');
            //$cate_arr['description'] =$this->request->getData('_category_name');
           // $cate_arr['user_id'] =$this->Auth->user('id');
            //$cate_arr['image'] ='';
           // $category = $this->Categories->patchEntity($category,$cate_arr);
            //if ( $this->Categories->save($category) ) {
                //$category_id=$this->request->getData('_sub_category_name');
                $customCate=$this->request->getData('category_name');
                $mainCate=$this->request->getData('category_id');
                if ($customCate!=''){
                    $category = $this->Categories->newEntity();
                    $cate_arr['name'] = $customCate;
                    $cate_arr['description'] =$customCate;
                    $cate_arr['user_id'] =$this->Auth->user('id');
                    $cate_arr['image'] ='';
                    $category = $this->Categories->patchEntity($category,$cate_arr);
                    if ( $this->Categories->save($category) ) {
                        $mainCate=$category->id;
                    }
                }
                $category = $this->Categories->newEntity();
                $sub_cate_arr['name'] = $this->request->getData('subCategory-name');
                $sub_cate_arr['description'] =$this->request->getData('subCategory-name');
                $sub_cate_arr['user_id'] =$this->Auth->user('id');
                $sub_cate_arr['parent_id'] =$mainCate;
                $sub_cate_arr['image'] ='';
                $category = $this->Categories->patchEntity($category,$sub_cate_arr);
                if ( $this->Categories->save($category) ) {
                    $product_id ='';
                    $category_id=$category->id;
                    $product_arr['title'] =$this->request->getData('title');
                    $product_arr['menu_title'] =$this->request->getData('title');
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
                           $product = $this->Products->patchEntity($product,$this->request->getData());
                           $product->service_guide=$this->request->getData('service_process');
                           $product->menu_title=$this->request->getData('title');
                           $product->_basic_price=$this->request->getData('_basic_plan_price');
                           $product->_standard_price=$this->request->getData('_standard_plan_price');
                           $product->_premium_price=$this->request->getData('_premium_plan_price');
                           $product->author=$this->Auth->user('id');
                           $product->status=3; // user creates Service with Pending Status 
                           if ($this->Products->save($product)) {
                            $product_id=$product->id;   
                        }
                    }
                    if ($product_id) {   
                        if($mainCate){
                            $this->loadModel('ProductCategories');
                            $pCategories = $this->ProductCategories->newEntity();
                            $pCategories->product_id = $product_id;
                            $pCategories->category_id = $mainCate;
                            
                            $this->ProductCategories->save($pCategories);
                        }
                        if($this->request->getData('subCategory-name')){
                            $this->loadModel('ProductCategories');
                            $pCategories = $this->ProductCategories->newEntity();
                            $pCategories->product_id = $product_id;
                            $pCategories->category_id = $category_id;
                            
                            $this->ProductCategories->save($pCategories);
                        }

                        if($url = $this->request->getData('url')){
                            $this->saveProductFeatured($product_id,$url,'ProductGalleries');
                        }

                        if($this->request->getData('heading')){
                            foreach($this->request->getData('heading') as $key =>$heading){
                                 $heading_arr[] =  $heading;     
                            }
                            foreach($this->request->getData('basic_price') as $key =>$basic_price){
                                $basic_price_arr[] =  $basic_price;     
                            }
                            foreach($this->request->getData('std_price') as $key =>$std_price){
                                $std_price_arr[] =  $std_price;     
                            }
                            foreach($this->request->getData('pre_price') as $key =>$pre_price){
                                $pre_price_arr[] =  $pre_price;     
                            }
                            foreach($this->request->getData('taxable') as $key =>$taxable){
                                $taxable_arr[] =  $taxable;     
                            }
                            $this->saveSellerProductPlans($product_id,$heading_arr,$basic_price_arr,$std_price_arr,$pre_price_arr,$taxable_arr,'ProductSellerPlans');
                        }
                        if($this->request->getData('questions')){
                            foreach($this->request->getData('questions') as $key =>$questions){
                                $questions_arr[] =  $questions;     
                            }
                            foreach($this->request->getData('answers') as $key =>$answers){
                                $answers_arr[] =  $answers;     
                            }
        
                            $this->saveProductFaq($product_id,$questions_arr,$answers_arr,'ProductFaq');
                        }
                        if($urls = $this->request->getData('urls')){
                            $this->saveProductGallery($product_id,$urls,'ProductGalleries');
                        }
                        //$this->Flash->success(__('The product has been saved.'));
                        //echo base64_encode($product_id);
                        $data = array(base64_encode($product_id),$product_id);
                        echo base64_encode($product_id);
                        die();
                        //$this->response->body(json_encode(base64_encode($product_id)));
                        $this->response->body(json_encode($data));
                        return $this->response;
                    }
                }
            //}
            //print_r($product->errors());
        }
        $this->set(compact('product','categories'));
    }

    public function assignServiceValues($product,$results){
        $product->title=$results[0]['title'];
        $product->_title_desc=$results[0]['_title_desc'];
        $product->description=$results[0]['description'];
        $product->menu_title=$results[0]['menu_title'];
        $product->service_coverd=$results[0]['service_coverd'];
        $product->service_target=$results[0]['service_target'];
        $product->service_process=$results[0]['service_process'];
        $product->service_guide=$results[0]['service_guide'];
        $product->offer_box=$results[0]['offer_box'];

        $product->_basic_price=$results[0]['_basic_price'];
        $product->_standard_price=$results[0]['_standard_price'];
        $product->_premium_price=$results[0]['_premium_price'];

        $product->_basic_price_desc=$results[0]['_basic_price_desc'];
        $product->_standard_price_desc=$results[0]['_standard_price_desc'];
        $product->_premium_price_desc=$results[0]['_premium_price_desc'];

        $product->_basic_plan_price= $results[0]['_basic_plan_price'];
        $product->_standard_plan_price = $results[0]['_standard_plan_price'];
        $product->_premium_plan_price = $results[0]['_premium_plan_price'];
        $product->_basic_booking_price  = $results[0]['_basic_booking_price'];
        $product->_standard_booking_price  = $results[0]['_standard_booking_price'];
        $product->_premium_booking_price  = $results[0]['_premium_booking_price'];

        $product->_basic_plan_time=$results[0]['_basic_plan_time'];
        $product->_standard_plan_time=$results[0]['_standard_plan_time'];
        $product->_premium_plan_time=$results[0]['_premium_plan_time'];

        $product->author=$this->Auth->user('id');;
        $product->status=2; // user creates Service with Pending Status 

        return $product;
    }
    public function selectService()
    {  
        $alreadyActivated = NULL;
        $selectedServices="";
        $this->loadModel('Products');
        $this->loadModel('Categories');
        //$this->loadModel('ProductCategories');
        //$this->loadModel('Products');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $selectedProducts = $this->request->getData('products');   
            if(count($selectedProducts)>0){
                foreach($selectedProducts as $x => $val) {
                    $author_id = $this->Auth->user('id');
                    $serviceTitle="";
                    //die($author_id);
                    $alreadyActivated = $this->Products->find()->
                        where(['parent_id' => $val ,'author' => $author_id,'delete_status'=>1])->first();
                    if(is_null($alreadyActivated)){ //Checking if the product is already Activated or not 
                        $query =$this->Products->find('all')->where(['id' => $val ])->limit(1);
                        $results = $query->toArray();
                        $product = $this->Products->newEntity($results, ['validate' => false]);
                        //$product = $this->Products->patchEntity($product,$results);
                        $product = $this->assignServiceValues($product,$results);
                        $product->parent_id= $val;

                        if ($this->Products->save($product)) {
                            //dd("Product Saved Successfully");
                            $product_id=$product->id;   
                            $serviceTitle=$product->title;
                            $this->loadModel('ProductCategories');

                            $categoriesQuery =  $this->ProductCategories->find('all')->select(['product_id','category_id'])->where(['product_id' => $val ])->order(['id' => 'ASC']);;
                            $categories = $categoriesQuery->toArray();

                            $CateId=$categories[0]->category_id;
                            $subCateId=$categories[1]->category_id;

                            //dd("Product Saved Successfully");
                            /* Product category Save */
                            $pCategories = $this->ProductCategories->newEntity();
                            $pCategories->product_id = $product_id;
                            $pCategories->category_id = $CateId;
                            $this->ProductCategories->save($pCategories);

                            /* Product Sub-Category Save */
                            $pCategories = $this->ProductCategories->newEntity();
                            $pCategories->product_id = $product_id;
                            $pCategories->category_id = $subCateId;
                            $this->ProductCategories->save($pCategories);   
                        //dd("Product Saved Successfully");
                        }else{
                            print_r($results);
                            print_r($product->errors());
                            dd("Product Saved  error!!!!!!!!");
                        }  
                        if($serviceTitle!=""){
                            $selectedServices=$selectedServices ." <br></br> ".$serviceTitle;
                        }
                    }
                }
                $email=$this->Auth->user('username');
                $msg="";
                $this->serviceActivatedmail($email,$msg,$selectedServices);
            }
        }
        $categories =  $this->Categories->ParentCategories->find('all', [ 
            'contain' => [ 'ChildCategories',
                'ChildCategories.ProductCategories.Products'=> [
                    'fields' => [
                        'Products.id',
                        'Products.title',
                        'Products.menu_title',
                        'Products.slug',
                        'Products._basic_plan_price',
                        'Products._basic_plan_time',
                        'Products.service_coverd',
                        'Products.delete_status',
                        'Products.status',
                        'Products.author',
                    ]
                ],
            ],'limit' => $limit])
            ->where(['delete_status !=' =>0,'user_id is' => NULL,])
            ->order(['menuOrder' => 'ASC'])
            ->enableAutoFields(false);  

        $user_id = $this->Auth->user('id');
        $activatedServices = $this->Products->find()->select(['id', 'parent_id','author'])
            ->where(['Products.delete_status'=>1,'Products.author'=>$user_id])->toArray(); 
        
        $selectedServices=array();
        //dd($activatedServices);
        foreach($activatedServices as $key1 => $services ){
            array_push($selectedServices,$services->parent_id);
        }
        //dd($selectedServices);
        //dd($categories); 
        //$allCategories = $this->Categories->find()->where(['delete_status' => 1 ,'parent_id is '=> NULL])->all();
        //dd($allCategories);
        $this->set(compact('categories','selectedServices'));
    }
    public function serviceActivatedmail($UserEmail,$msg,$selectedServices){
        $this->viewBuilder()->setLayout(false);
        $email = new Email();
        $email
        ->template('easifyy_service_activated_successfully','easify') 
        ->setViewVars(
            [
                'vendor' => 'PSP',
                'selectedServices' => $selectedServices,
            ]
        )
        ->from(['connect@easifyy.com' => 'Easifyy'])
        ->emailFormat('html')
        ->to($UserEmail)
        ->bcc("connect@easifyy.com")
        ->cc("sdgrintech@gmail.com")
        ->subject('Service Activated Successfully')
        ->send($msg);
    }

        /**
     * Delete method
     *
     * @param string|null $id Merchant Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function submitProduct($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $id = base64_decode($this->request->getData('id'));
        $this->loadModel('Products');
        //dd('delete Id  --->'.$id);
        $product = $this->Products->get($id);
        $product->status = 2;
        if ($this->Products->save($product)) {
            $this->Flash->success(__('The product has been Submitted for live Successfully.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        $data = array(base64_encode($id),$id);
        //$this->response->body(json_encode(base64_encode($product_id)));
        //$this->response->body(json_encode($data));
        //return $this->response;
        return $this->redirect(['action' => 'index']);
    }

    /**
     * 
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
        $this->loadModel('Products');
        //dd('delete Id  --->'.$id);
        $product = $this->Products->get($id);
        $product->delete_status = 0;
        if ($this->Products->save($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }

    public function invoiceSettlements() {
        $user_id = $this->Auth->user('id');
        $merchant_id= $this->getMerchantIdByUserId($user_id);
        $this->loadModel('Orders');
        $order = $this->Orders->find('all')
            ->where([ 'Orders.merchant_id' => $merchant_id,'order_status_id' => 3,'Orders.delete_status' => 1 ])
            ->contain([
                'Products' => [],
                'OrderModes' => [],
                'Users' => [],
                'OrderItems' => [],
                'OrderStatuses' => [],
                'Coupons' => [],
            ])
            ->order(['Orders.created' => 'DESC'])
            ->all();
        $this->set('order', $order);
    }


}
