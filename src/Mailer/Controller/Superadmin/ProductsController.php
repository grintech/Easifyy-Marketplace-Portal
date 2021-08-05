<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;
use App\Controller\BaseController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends BaseController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $uploadCSV = "";

        // AppController
        // $this->uploadImageFromUrl('http://dev.rndexperts.in/lojistaIT/wp-content/uploads/2020/08/bitmap-1.png');
        // die();

        $this->paginate = [
            'contain' => ['ProductTypes', 'ParentProducts', 'ProductGalleries'],
            'conditions' => [
                    'Products.delete_status'=>1,
                    'Products.parent_id IS'=>NULL
                ],
            'order' => ['Products.created DESC']
        ];

        if ( $this->request->is('post') && !empty($this->request->getData('file')) ) {
            
            $file = $this->request->getData('file');
            $name = $file['name'];
            $ext = strtolower(end(explode('.', $file['name']) ) );
            $type = $file['type'];
            $tmpName = $file['tmp_name'];
            
            $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200])->toArray();
            $this->loadModel('ProductUnits');
            $productUnits = $this->ProductUnits->find('list', ['limit' => 200])->toArray();
            
            // check the file is a csv
            if($ext === 'csv'){
                if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                    // necessary if a large csv file
                    set_time_limit(0);

                    $row = 0;
                    
                    while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                        // number of fields in the csv
                        $col_count = count($data);

                        // get the values from the csv
                        $csv[$row]['sno']           = $data[0];

                        $product_type = array_search('simple', $productTypes);

                        if( false !== $type_key = array_search(strtolower(trim($data[1])), $productTypes) ) {
                            $product_type = $type_key;
                        }

                        $product_unit = array_search('kg', $productUnits);

                        if( false !== $unit_key = array_search(strtolower(trim($data[1])), $productUnits) ) {
                            $product_unit = $unit_key;
                        }

                        $csv[$row]['sno']           = $data[0];
                        $csv[$row]['product_type_id']  = $product_type;
                        $csv[$row]['parent']        = $data[2];
                        $csv[$row]['title']         = $data[3];
                        $csv[$row]['description']   = $data[4];
                        $csv[$row]['_price']         = $data[5];
                        $csv[$row]['_sale_price']    = $data[6];
                        $csv[$row]['_weight']        = $data[7];
                        $csv[$row]['product_unit_id']  = $product_unit;
                        $csv[$row]['_stock']         = $data[9];
                        $csv[$row]['_bar_code']      = $data[10];
                        $csv[$row]['_item_code']     = $data[11];
                        $csv[$row]['_hsn_code']      = $data[12];
                        $csv[$row]['_cgst']          = $data[13];
                        $csv[$row]['_igst']          = $data[14];
                        $csv[$row]['_sgst']          = $data[15];
                        $csv[$row]['_is_taxable']    = strtolower(trim($data[16])) == 'yes' ? 1 : 0;
                        $csv[$row]['_tax_inclusvie'] = strtolower(trim($data[17])) == 'yes' ? 1 : 0;
                        $csv[$row]['status']        = strtolower(trim($data[18])) == 'publish' ? 1 : 0;
                        $csv[$row]['delete_status'] = 1;
                        if( $data[19] != "" && !empty($data[19]) ) {
                            $csv[$row]['images']        = explode(',', $data[19]);    
                        }
                        
                        if( $csv[$row]['parent'] > 0 ) {
                            $csv[ $csv[$row]['parent'] ]['children'][] = $csv[$row];
                            unset($csv[$row]);
                        }
                        
                        $row++;
                    }
                    fclose($handle);
                }
                
                /*Remove the header row*/
                unset($csv[0]);
                foreach ($csv as $prod_key => $prod_value) {
                    
                    $product = $this->Products->newEntity();
                    $product = $this->Products->patchEntity( $product, $prod_value );
                    if ( $this->Products->save($product) ) {
                        $product_id = $product->id;  

                        /*upload images*/
                        if( isset( $prod_value['images'] ) && !empty($prod_value['images']) ){

                            $image_urls = [];
                            foreach ($prod_value['images'] as $image_key => $image_value) {
                                
                                $image_name = $this->uploadImageFromUrl($image_value);
                                if( $image_key == 0 ) {
                                    $this->saveProductFeatured($product_id,$image_name,'ProductGalleries');
                                } else {
                                    $image_urls[] = $image_name; 
                                }

                            }
                            if( !empty($image_urls) ){
                                $this->saveProductGallery($product_id, implode(',', $image_urls),'ProductGalleries');
                            }
                            
                        } 

                        if( isset( $prod_value['children'] ) ){
                            $this->saveProductChild($product_id,$prod_value['children'],'Products');
                        }
                    }

                }

            }
            
        }

        $products = $this->paginate($this->Products);

        $this->set(compact('products', 'uploadCSV'));
    }

    public function search(){
        $conditions[]= array('Products.delete_status'=>1,
                            'Products.parent_id IS'=>NULL);
        if ($this->request->is('post')){
            if(!empty($this->request->data) && isset($this->request->data) ){
                $search_key = trim($this->request->getData('search_key'));
                $conditions[] = array(
                    'Products.parent_id IS'=>NULL,
                    "OR" => array(
                    "Products.title LIKE" => "%".$search_key."%",
                    "Products.description LIKE" => "%".$search_key."%"
                    )
                );
            }
        }

        $this->paginate = [
            'contain' => ['ProductTypes', 'ParentProducts', 'ProductGalleries'],
            'conditions' =>$conditions,
            'order' => ['Products.created DESC'],
            'limit' => 25
        ];

        $products = $this->paginate($this->Products);
        $this->set(compact('products'));

        $this->render('/Superadmin/Products/index');
    }

    public function csvSaveProductImage( $data = [], $product_id )
    {
        $image_urls = [];
        foreach ($data as $image_key => $image_value) {
            
            $image_name = $this->uploadImageFromUrl($image_value);
            if( $image_key == 0 ) {
                $this->saveProductFeatured($product_id,$url,'ProductGalleries');
            } else {
                $image_urls[] = $image_name; 
            }

        }
        if( !empty($image_urls) ){
            $this->saveProductGallery($product_id,$image_urls,'ProductGalleries');
        }
    }



    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['ProductTypes', 'ParentProducts', 'CartItems', 'MerchantProducts', 'OrderItems', 'ProductBrands', 'ProductCategories', 'ProductGalleries', 'ChildProducts'],
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Categories');
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product_id ='';
            
            $product_arr['title'] =$this->request->getData('title');
            $product_arr['description'] =$this->request->getData('description');
            $product_arr['service_coverd'] =$this->request->getData('service_coverd');
            $product_arr['service_target'] =$this->request->getData('service_target');
            $product_arr['service_process'] =$this->request->getData('service_process');
            $product_arr['service_guide'] =$this->request->getData('service_guide');
            $product_arr['status'] =$this->request->getData('status');
            $product_arr['_cgst'] =$this->request->getData('_cgst');
            $product_arr['_commission'] =$this->request->getData('_commission');
            $product_arr['_basic_price'] =$this->request->getData('_basic_price');
			$product_arr['_standard_price'] =$this->request->getData('_standard_price');
            $product_arr['_premium_price'] =$this->request->getData('_premium_price');
            $product_arr['_basic_plan_price'] =$this->request->getData('_basic_plan_price');
			$product_arr['_standard_plan_price'] =$this->request->getData('_standard_plan_price');
			$product_arr['_premium_plan_price'] =$this->request->getData('_premium_plan_price');
			$product_arr['_basic_price_desc'] =$this->request->getData('_basic_price_desc');
			$product_arr['_standard_price_desc'] =$this->request->getData('_standard_price_desc');
			$product_arr['_premium_price_desc'] =$this->request->getData('_premium_price_desc');
            $product_arr['_basic_plan_time'] =$this->request->getData('_basic_plan_time');
			$product_arr['_standard_plan_time'] =$this->request->getData('_standard_plan_time');
            $product_arr['_premium_plan_time'] =$this->request->getData('_premium_plan_time');
            $product_arr['is_addon'] =$this->request->getData('is_addon');

		
			$product_data =[];
            $product_data['parent'][] =$product_arr;

            if(!empty($product_data['parent'])){
               	$product = $this->Products->newEntity();
               	$product = $this->Products->patchEntity($product, $this->request->getData());//$product_data['parent'][0]);
               	if ($this->Products->save($product)) {
                     $product_id=$product->id;   
                }
            }


			if ($product_id) {
	            
                if($this->request->getData('category_id')){
	                foreach($this->request->getData('category_id') as $key =>$category){
	                         $productCategory_arr[] =  $category;     
	                }
	                $this->saveProductCategories($product_id,$productCategory_arr,'ProductCategories');
				}
                if($this->request->getData('heading')){
                    foreach($this->request->getData('heading') as $key =>$heading){
                         $heading_arr[] =  $heading;     
                    }
                    foreach($this->request->getData('price') as $key =>$price){
                        $price_arr[] =  $price;     
                    }
                    foreach($this->request->getData('type') as $key =>$type){
                        $type_arr[] =  $type;     
                    }
                    foreach($this->request->getData('taxable') as $key =>$taxable){
                        $taxable_arr[] =  $taxable;     
                    }
                    $this->saveProductPlans($product_id,$heading_arr,$price_arr,$type_arr,$taxable_arr,'ProductPlans');
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
	            if($url = $this->request->getData('url')){
	                $this->saveProductFeatured($product_id,$url,'ProductGalleries');
	            }
	            if($urls = $this->request->getData('urls')){
	                $this->saveProductGallery($product_id,$urls,'ProductGalleries');
	            }
				$this->Flash->success(__('The product has been saved.'));
				return $this->redirect(['action' => 'index']);
            }
            print_r($product->getErrors());
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories =  $this->Categories->ParentCategories->find('all', [ 
            'select' => ['id','name'],
            'contain' => [ 'ChildCategories'],'limit' => 200]);
        $this->set(compact('product','categories'));
    }

    public function edit($id = null)
    {
        $this->loadModel('Brands');
        $this->loadModel('Categories');
        $this->loadModel('ProductPlans');
        $id = base64_decode($id);
        $product = $this->Products->get($id, [
            'contain' => ['ParentProducts', 'ProductCategories', 'ProductGalleries', 'ChildProducts','ProductPlans','ProductFaq'],
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
            $product_arr['service_coverd'] =$this->request->getData('service_coverd');
            $product_arr['service_target'] =$this->request->getData('service_target');
            $product_arr['service_process'] =$this->request->getData('service_process');
            $product_arr['service_guide'] =$this->request->getData('service_guide');
            $product_arr['status'] =$this->request->getData('status');
            $product_arr['_cgst'] =$this->request->getData('_cgst');
            $product_arr['_commission'] =$this->request->getData('_commission');
			$product_arr['_basic_price'] =$this->request->getData('_basic_price');
			$product_arr['_standard_price'] =$this->request->getData('_standard_price');
            $product_arr['_premium_price'] =$this->request->getData('_premium_price');
            $product_arr['_basic_plan_price'] =$this->request->getData('_basic_plan_price');
			$product_arr['_standard_plan_price'] =$this->request->getData('_standard_plan_price');
			$product_arr['_premium_plan_price'] =$this->request->getData('_premium_plan_price');
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
            //dd( $this->request->getData());
            if(!empty($product_data['parent'])){
               //$product = $this->Products->newEntity();
               $product = $this->Products->get($id);       
               $product = $this->Products->patchEntity($product, $this->request->getData());//$product_data['parent'][0]);
               if ($this->Products->save($product)) {
                     $product_id=$product->id; 
                }
            }
            //dd($this->request->getData())  ;   

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
                    $this->saveProductCategories($product_id,$productCategory_arr,'ProductCategories');
                }
                
                if($this->request->getData('heading')){
                    foreach($this->request->getData('heading') as $key =>$heading){
                         $heading_arr[] =  $heading;     
                    }
                    foreach($this->request->getData('price') as $key =>$price){
                        $price_arr[] =  $price;     
                    }
                    foreach($this->request->getData('type') as $key =>$type){
                        $type_arr[] =  $type;     
                    }
                    foreach($this->request->getData('taxable') as $key =>$taxable){
                        $taxable_arr[] =  $taxable;     
                    }
                    //dd('2');
                    $this->saveProductPlans($product_id,$heading_arr,$price_arr,$type_arr,$taxable_arr,'ProductPlans');
                }
                if($this->request->getData('questions')){
                    foreach($this->request->getData('questions') as $key =>$questions){
                        $question_arr[] =  $questions;     
                    }
                    foreach($this->request->getData('answers') as $key =>$answers){
                        $answer_arr[] =  $answers;     
                    }

                    $this->saveProductFaq($product_id,$question_arr,$answer_arr,'ProductFaq');
                }
                if($url = $this->request->getData('url')){
                    $this->saveProductFeatured($product_id,$url,'ProductGalleries');
                }
                if($urls = $this->request->getData('urls')){
                     $this->saveProductGallery($product_id,$urls,'ProductGalleries');

                }
               $this->Flash->success(__('The product has been Updated Successfully.'));

               return $this->redirect(['action' => 'edit', base64_encode($id) ]);  
            }else{
                print_r($product->getErrors());
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
            print_r($product->getErrors());
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories =  $this->Categories->ParentCategories->find('all', [ 
            'select' => ['id','name'],
            'contain' => [ 'ChildCategories'],'limit' => 200]);
        
        $this->set(compact('product','categories'));
        $this->render('add');
    }


    public function uploadImage() {
        $this->autoRender = false;
        $response =array();
        if (!empty($_FILES)) {
            $file_name = date('ymdhis-') . $_FILES['file']['name'];
            $response =array('file_name' => $file_name);
            $allowed_files = array( 'image/jpeg', 'image/jpg', 'image/png' );
            /*print_r($_FILES); die();*/
            if ( !in_array($_FILES['file']['type'], $allowed_files) ) {
                die(json_encode(0));
            }

            $path_parts = pathinfo($file_name);
            $destination = WWW_ROOT . 'img' . DS . 'product-images' . DS . $file_name;
            move_uploaded_file($_FILES['file']['tmp_name'], $destination);
            
            $destination_app = WWW_ROOT . 'img' . DS . 'product-images' . DS . 'app-images'. DS . $file_name;
            $size=getimagesize($destination);
            copy ( $destination , $destination_app );
            //Resixe image to 125*75 resolution
            $new_width=125;
            $new_height=75;
            $width=$size[0];
            $height=$size[1];
            $image_p = imagecreatetruecolor($new_width, $new_height);
            $whiteBackground = imagecolorallocate($image_p, 255, 255, 255); 
            imagefill($image_p,0,0,$whiteBackground); // fill the background with white
            if ($path_parts['extension'] == 'jpg') {
                $image = imagecreatefromjpeg($destination_app);
            } elseif ($path_parts['extension'] == 'gif') {
                $image = imageCreateFromGif($destination_app);
            } elseif ($path_parts['extension'] == 'png') {
                $image = imageCreateFromPng($destination_app);
            }
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            if ($path_parts['extension'] == 'jpg') {
                imagejpeg($image_p, $destination_app);
            } elseif ($path_parts['extension'] == 'gif') {
                imagegif($image_p, $destination_app);
            } elseif ($path_parts['extension'] == 'png') {
                imagepng($image_p, $destination_app);
            }

            echo json_encode($file_name);
            die();
        }
    }


    public function deleteProductImage() {

        $this->autoRender = false;
        $this->loadModel('ProductGalleries');
        if (!empty($_POST)) {
            $image = $this->ProductGalleries->get($_POST['gallery_id']);

            if ($image ) {
                //$this->ProductGalleries->id = $_POST['gallery_id'];
                $this->ProductGalleries->delete($image);
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //die('Here');
        //$this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        $product->delete_status = 0;
        if ($this->Products->save($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }


}
