<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Utility\Security; 
use Cake\Routing\Router;
use Cake\Mailer\Email;
/**
 * Base Controller
 *
 *
 * @method \App\Model\Entity\Base[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BaseController extends AppController
{
    /*
     * Get all categories except Brands and Child categories of Brand
     */

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadComponent('Auth');
        $this->Auth->allow( ['login','getcities','getStateId','applycouponcode']);
    }
    
    public function applycouponcode() {
      $this->autoRender = false;
      
      $coupon_code = $_POST['coupon_code'];
      $total_amount = $_POST['total'];
      $product_id = $_POST['product_id'];
      
      $this->loadModel('Coupons');

      $coupon_Query = $this->Coupons->find('all', [
          'conditions' => [
              'Coupons.coupon_code' =>$_POST['coupon_code'],
              'Coupons.status' =>1,
              'Coupons.delete_status' =>1,
            ],
      ]);
      
      $coupon_Query->disableHydration();
      $coupon_Data = $coupon_Query->first();
      
      if($coupon_Data == '') {
          $response = array (
              'status' => 0,
              'message' => 'Invalid Coupon'
          );
      } else {
          //Check Coupon expire date time
          $datetime = explode(",", $coupon_Data['expire'], 2);
          $expire_date=$datetime[0];
          $current_date= date('n/d/y');
          if($current_date > $expire_date) {
             $response = array (
                'status' => 0,
                'message' => 'Coupon Expired'
            );
            $response = json_encode($response);
            echo $response;
            die();
          }
          
          //Calculate Discount percentage
          $discount_type = $coupon_Data['discount_type'];
          $discount_value = $coupon_Data['discount'];
          if($discount_type == 'percentage') {
            $discount_value = ($discount_value / 100) * $total_amount;
            $discounted_price = $total_amount - $discount_value;
          } else {
            $discounted_price = $total_amount - $discount_value;
          }
          
          $response = array (
              'status' => 1,
              'message' => 'Valid Coupon',
              'discounted_price' => $discounted_price,
              'discount_value' => $discount_value,
              'id' => $coupon_Data['id'],
          );
          
      }
      $response = json_encode($response);
      echo $response;
      die();
      
    }

    public function saveProductCategories($product_id, $categories,$model,$foreign_key='product_id'){

        if( $model != "" ){
           $this->{$model} =$this->loadModel($model);
        }else{
            return false;
        } 

         if($product_id && $categories){
            $this->{$model}->deleteAll(['Categories.product_id' => $product_id]);
           foreach($categories as $key =>$category){
               $productCategory_arr = [ $foreign_key => $product_id,'category_id' => $category]; 
               $productBrand = $this->{$model}->find()->where( $productCategory_arr)->first(); 
                if($productBrand) {
                 //return true;
                } else {
                  $productCategory = $this->{$model}->newEntity();
                  $productCategory = $this->{$model}->patchEntity($productCategory, $productCategory_arr);
                  $productCategory->{$foreign_key} =$product_id;
                  $this->{$model}->save($productCategory); 
               }     
           }
          
           
        }
         return true;
    }

    public function saveProductPlans($product_id,$headings,$prices,$types,$taxables,$model,$foreign_key='product_id'){
        if( $model != "" ){
           $this->{$model} =$this->loadModel($model);
        }else{
            return false;
        } 
        
         if($product_id && $headings){
            $this->{$model}->deleteAll(['ProductPlans.product_id' => $product_id]);
            foreach($headings as $key =>$heading){
                
                $productPlan_arr = [ $foreign_key => $product_id,'heading' => $heading,'price' => $prices[$key],'type' => $types[$key],'taxable' => $taxables[$key]]; 
                $productBrand = $this->{$model}->find()->where( $productPlan_arr)->first(); 
                    if($productBrand) {
                    //return true;
                    } else {
                        
                    $productPlan = $this->{$model}->newEntity();
                    $productPlan = $this->{$model}->patchEntity($productPlan, $productPlan_arr);
                    $productPlan->{$foreign_key} =$product_id;
                    $this->{$model}->save($productPlan); 
                    //die('in a base controller ');
                    
                }     
            }  
        }
         return true;
    }

    public function saveSellerProductPlans($product_id,$headings,$basic_price_arr,$std_price_arr,$pre_price_arr,$taxable_arr,$model,$foreign_key='product_id'){
        if( $model != "" ){
           $this->{$model} =$this->loadModel($model);
        }else{
            return false;
        } 
        
         if($product_id && $headings){
            $this->{$model}->deleteAll(['ProductSellerPlans.product_id' => $product_id]);
            foreach($headings as $key =>$heading){
                
                $productPlan_arr = [ $foreign_key => $product_id,'heading' => $heading,'basic_price' => $basic_price_arr[$key],'std_price' => $std_price_arr[$key],'pre_price' => $pre_price_arr[$key],'taxable' => $taxable_arr[$key]]; 
                $productBrand = $this->{$model}->find()->where( $productPlan_arr)->first(); 
                    if($productBrand) {
                    //return true;
                    } else {
                    $productPlan = $this->{$model}->newEntity();
                    $productPlan = $this->{$model}->patchEntity($productPlan, $productPlan_arr);
                    $productPlan->{$foreign_key} =$product_id;
                    $this->{$model}->save($productPlan); 
                    
                }     
            }  
        }
         return true;
    }

    public function saveProductFaq($product_id,$questions,$answers,$model,$foreign_key='product_id'){
        if( $model != "" ){
           $this->{$model} =$this->loadModel($model);
        }else{
            return false;
        } 

         if($product_id && $questions){
            $this->{$model}->deleteAll(['ProductFaq.product_id' => $product_id]);
            foreach($questions as $key =>$question){
                $productFaq_arr = [ $foreign_key => $product_id,'question' => $question,'answer' => $answers[$key]]; 
                $productFaq = $this->{$model}->find()->where( $productFaq_arr)->first(); 
                    if($productFaq) {
                    //return true;
                    } else {
                    $productFaq = $this->{$model}->newEntity();
                    $productFaq = $this->{$model}->patchEntity($productFaq, $productFaq_arr);
                    $productFaq->{$foreign_key} =$product_id;
                    $this->{$model}->save($productFaq); 
                }     
            }  
        }
         return true;
    }

    public function saveProductReview($product_id,$names,$reviews,$ratings,$model,$foreign_key='product_id'){
        if( $model != "" ){
           $this->{$model} =$this->loadModel($model);
        }else{
            return false;
        } 

         if($product_id && $names){
            $this->{$model}->deleteAll(['ProductReviews.product_id' => $product_id]);
            foreach($names as $key =>$name){
                $productReview_arr = [ $foreign_key => $product_id,'reviewer_name' => $name,'review_text' => $reviews[$key],'rating' => $ratings[$key]]; 
                $productReview = $this->{$model}->find()->where( $productReview_arr)->first(); 
                    if($productReview) {
                    //return true;
                    } else {
                    $productReview = $this->{$model}->newEntity();
                    $productReview = $this->{$model}->patchEntity($productReview, $productReview_arr);
                    $productReview->{$foreign_key} =$product_id;
                    $this->{$model}->save($productReview); 
                }     
            }  
        }
         return true;
    }

    public function saveProductBrand($product_id, $brand_id,$model,$foreign_key='product_id'){

        if( $model != "" ){
           $this->{$model} =$this->loadModel($model);
        }else{
            return false;
        } 
         if($product_id && $brand_id){
            $productBrand_arr =[$foreign_key => $product_id,'brand_id' => $brand_id];
            $productBrand = $this->{$model}->find()->where($productBrand_arr)->first(); 
               if($productBrand){
                   return true;
               }else{
                  $productBrand =  $this->{$model}->newEntity();
                  $productBrand =  $this->{$model}->patchEntity($productBrand, $productBrand_arr);
                  $productBrand->{$foreign_key} =$product_id;
                  $this->{$model}->save($productBrand);
               }        
          }
         return true;
    }


    public function saveProductFeatured($product_id, $url,$model,$foreign_key='product_id'){

        if( $model != "" ){
           $this->{$model} =$this->loadModel($model);
        }else{
            return false;
        } 
         if($product_id && $url){
            $productBrand_arr =[$foreign_key => $product_id,'url' => $url,'type' =>'Featured'];
            $productBrand = $this->{$model}->find()->where($productBrand_arr)->first(); 
           if($productBrand){
               return true;
           }else{
              $productBrand =  $this->{$model}->newEntity();
              $productBrand =  $this->{$model}->patchEntity($productBrand, $productBrand_arr);
              $productBrand->{$foreign_key} =$product_id;
              $this->{$model}->save($productBrand); 
           }     
        }else{
            return false; 
        }
        return true;
    }


    public function saveProductGallery($product_id, $urls,$model,$foreign_key='product_id'){

        if( $model != "" ){
           $this->{$model} =$this->loadModel($model);
        }else{
            return false;
        } 
        if($urls){
          foreach(explode(',', $urls) as $key =>$url){
             if($product_id && $url){
                $productBrand_arr =[$foreign_key => $product_id,'url' => $url,'type' =>'Gallery'];
                $productBrand = $this->{$model}->find()->where($productBrand_arr)->first(); 
                 if($productBrand){
                     continue;
                 }else{
                    $productBrand =  $this->{$model}->newEntity();
                    $productBrand =  $this->{$model}->patchEntity($productBrand, $productBrand_arr);
                    $productBrand->{$foreign_key} =$product_id;
                    $this->{$model}->save($productBrand);
                 }     
            }
          }

        }else{
            return false;
        }

        return true;
        
    }

    public function saveProductChild($product_id, $child,$model){

        if( $model != "" ){
           $this->{$model} =$this->loadModel($model);
        }else{
            return false;
        } 
        if( is_array($child) ){
            foreach($child as $variation){
               $exists = $this->{$model}->find('all', 
                [
                    'contain' => [],
                    'conditions' =>['parent_id' => $product_id ,'id' => @$variation['product_id']]
                ])->first();
                if($exists){
                  $product = $exists;
                }else{
                  $product =  $this->{$model}->newEntity();
                }
               
               $product =  $this->{$model}->patchEntity($product,$variation);
               $product->parent_id =  $product_id;
               $product->product_type_id = 3;
               if ( $this->{$model}->save($product)) {        
                }
            }

        }else{
            return false;
        }

        return true;
        
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

    public function deleteMerchantProductImage() {

        $this->autoRender = false;
        $this->loadModel('MerchantProductGalleries');
        if (!empty($_POST)) {
            $image = $this->MerchantProductGalleries->get($_POST['gallery_id']);

            if ($image ) {
                //$this->ProductGalleries->id = $_POST['gallery_id'];
                $this->MerchantProductGalleries->delete($image);
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }
    }

    

    public function saveProductBundledItems($product_id, $child, $model,$foreign_key='product_id'){

        if( $model != "" ){
           $this->{$model} =$this->loadModel($model);
        }else{
            return false;
        } 
        if( is_array($child) ){
            foreach($child as $variation){
               if($variation['product_id']){
                   $product =  $this->{$model}->newEntity();
                   $product =  $this->{$model}->patchEntity($product,$variation);
                   $product->bundled_parent =  $product_id;
                   $product->{$foreign_key} = $variation['product_id'];
                   if ( $this->{$model}->save($product)) {      
                    }else{
                       print_r($product->getErrors()); 
                    }
               }
            }
        }else{
            return false;
        }
        return true;   
    }


    public function getcities($id = null) {
        $this->autoRender = false;
         $this->loadModel('Cities');
        $cities = $this->Cities->find('list', array('conditions' => 'Cities.statecode=' . $id,
                    'fields' => array('id', 'name')));
    $options ='<option value="">--Select City--</option>'."\n";       
    foreach($cities as $key=>$option) {
       $options .='<option value="'.$key.'">'.$option.'</option>'."\n";
    }
    echo  $options;
    }

    public function getStateId($id = null) {
        $this->autoRender = false;
        $this->loadModel('Cities');
        $StateId = $this->Cities->find('all', array('conditions' => 'Cities.id=' . $id,
                    'fields' => array('id','statecode', 'state')));
        //echo $StateId;
        foreach($StateId as $key=>$option) {
            $StateCode =$option;
        }
        echo $StateCode['statecode'];
    }

    public function getSubCate($id = null) {
        $this->autoRender = false;
         $this->loadModel('Categories');
        $subCategories = $this->Categories->find('list', array(
            'conditions' =>array(
                                'Categories.parent_id = ' => $id,
                                'Categories.user_id is ' => NULL   
                            ),
            'fields' => array('id', 'name')));

        /*$subCategories = $this->Categories->find('list', array(
                    'conditions' =>
                         'Categories.parent_id=' . $id,

                    'fields' => array('id', 'name')));*/


        //$subCategories =  $this->Categories->find()->select(['id','name'])->where(['parent_id' => $id]);  

        $options ='<option value="">--Select SubCategory--</option>'."\n";       
        foreach($subCategories as $key=>$option) {
            $options .='<option value="'.$key.'">'.$option.'</option>'."\n";
        }
        echo  $options;
    }
 
    public function getServices($id = null) {
        $this->autoRender = false;
        $this->loadModel('Categories');
        $this->loadModel('ProductCategories');
        $Services = $this->ProductCategories->find('all')->select(['Products.id', 'Products.title','Products.description'])
                    ->where(['category_id' => $id,'delete_status'=> 1 ])
                    ->contain(['Products'=>[
                        'fields' => [
                            'Products.id',
                            'Products.title',
                            'Products.status',
                        ]
                    ]]); 

        $options ='<option value="">--Select Service--</option>'."\n";       
        foreach($Services as  $service) {
            //pr($service);
            //echo '------'.$service['product']['id'];
            if($service['product']['status']==1){
                $options .='<option myDesc="'.$service['product']['description'].'" value="'.$service['product']['id'].'">'.$service['product']['title'].'</option>';
            }
        }
        echo  $options;
    }

    public function getDescription($id = null) {
        $this->autoRender = false;
        $this->loadModel('Products');
        
        $author_id = $this->Auth->user('id');
        //die($author_id);
        $alreadyActivated = $this->Products->find()->
            where(['parent_id' => $id ,'author' => $author_id,'delete_status'=>1])->first();
        //$data = $alreadyActivated->toArray();
        if(!is_null($alreadyActivated)){
            $already=["status"=>"already-activated"];
            echo json_encode($already);
        }else{
            //echo $alreadyActivated;
            /*$desc = $this->Products->find('all', array('conditions' => array(
                                'id ='=>$id,
                                'parent_id is' => NULL,    
                                ),
                                'fields' => array('id','description')))->all();
        
            $data = $desc->toArray();
            echo( $data[0]['description']);*/
            $desc = $this->Products->find('all', array('conditions' => array(
                'id ='=>$id,
                'parent_id is' => NULL,    
                )))->contain(['ProductPlans'])->all();

            $data = $desc->toArray();
            //print_r($data[0]);
            echo( $data[0]);
        }

    }
    /*
    *  Check store deliver in the customer addres or not
    */
    public function distance($lat1, $lon1, $lat2, $lon2) {
      if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            $data = array(
                'status'=>0,
                'distance'=>'Invalid Parameters',
            );
		} else {
			$theta = $lon1 - $lon2;
			$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
			$dist = acos($dist);
			$dist = rad2deg($dist);
			$miles = $dist * 60 * 1.1515;
        
			//Return Distance in KM
			$distance=round($miles * 1.609344, 1) . PHP_EOL;
			$data = array(
                'status'=>1,
                'distance'=>$distance,
            );
			return json_encode($data);
        }
    }

    /*
    *  Search products 
    *  Params $merchant_id , search_text
    */
    public function smart_search($merchant_id,$_search_text) {
        $this->autoRender=false;
        // $merchant_id=$_POST['merchant_id'];
        // $_search_text=$_POST['search_text'];
        
        //Create array of search text
        $search___text = explode(" ", $_search_text);
        foreach($search___text as $text){
            $search_text[] = array('VendorProduct.title LIKE' => '%'.$text.'%');
        }
        
        //Search Vendor Product by merchant id and search keyword
        if(!empty($merchant_id) && !empty($search_text)) {
            $data = $this->VendorProduct->find('all',array( 
                            'contain'=>array('VendorProductMeta'),
                            'conditions'=>array(
                                        'OR'=>$search_text,
                                        'VendorProduct.merchant_id' =>$merchant_id,    
                                    ),  
                                )
                            );
        } else {
            $data = array(
                    'status'=>0,
                    'message'=>'Invalid Parameters',
                );
        }
        return json_encode($data);
    }
	
	public function save_app_notification($user_id,$title,$message) {
		if ($user_id && $title && $message) {
			$this->AppNotification->create();
			  $data=array();
			  $data['AppNotification']['user_id']=$user_id;
              $data['AppNotification']['title']=$title;
              $data['AppNotification']['message']=$message;
			if ($this->AppNotification->save($data)) {
				
				return true;
			} else {
				return false;
			}
		}
		return false;
	}


    /*
     * Get Brands registered as Category
     */
    public function product_brands() {

        $brands_id = $this->Category->findBySlug('brand');
        $brands = $this->Category->find('all', array('conditions' => array('parent_category' => $brands_id['Category']['id'])));
        $brand_array = array();
        $brand_array[] = $brands_id['Category']['id'];
        foreach ($brands as $bkey => $bvalue) {
            $brand_array[] = $bvalue['Category']['id'];
        }

        return array(
            'brands' => $brands,
            'brands_id' => $brand_array
        );
    }
    //End
    
    public function getNameByID($model_name = null, $id = null, $field_name = null) {

        if ($model_name == null || $id == null || $field_name == null)
            return 0;

        $name = $this->$model_name->find('first', array(
            'conditions' => array(
                $model_name . '.id' => $id
            ),
            'fields' => array(
                $field_name
            )
        ));
        return @$name[$model_name][$field_name];
    }

    public function getFieldByID($model_name = null, $field = null, $id = null, $field_name = null) {

        if ($model_name == null || $id == null || $field_name == null)
            return 0;
        $name = $this->$model_name->find('first', array(
            'conditions' => array(
                $model_name . '.' . $field => $id
            ),
            'fields' => array(
                $field_name
            )
        ));
        return @$name[$model_name][$field_name];
    }

    public function checkAlreadyExists($model_name = null, $conditions = array()) {
        if ($model_name == "" || empty($conditions))
            return;
        $result = $this->$model_name->find('first', array('conditions' => $conditions));
        return $result;
    }

    public function get_current_user_id() {

        $current_user = $this->Session->read('current_user');
        return $current_user['User']['id'];
    }

    public function get_current_user_username() {
        $current_user = $this->Session->read('current_user');
        return $current_user['User']['username'];
    }

    public function get_max_number($model_name = null, $conditions = 'WHERE 1=1', $field = 'id') {
        if ($model_name == null)
            return 0;
        $max_number = $this->$model_name->query('SELECT MAX(' . $field . ') FROM ' . strtolower($model_name) . 's ' . $conditions);
        return $max_number[0][0]['MAX(' . $field . ')'];
    }

    public function get_current_user_info() {
        $current_user = $this->Session->read('current_user');
        return $current_user['User'];
    }

    public function get_current_user_role() {
        $current_user = $this->Session->read('current_user');

        return $current_user['User']['role'];
    }

    public function get_merchant() {
        $user_id = $this->Auth->user('id');
        $merchant_id ='';
        $this->loadModel('Merchants');
         $merchant = $this->Merchants->find()->where(['user_id' => $user_id])->first();
         if($merchant){
            return $merchant['id'];
         }
        return $merchant_id;
    }

    public function generate_unique_password() {
        $token = "";
        for ($i = 0; $i < 15; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(65, 90)) : $token .= chr(rand(97, 122));
        }
        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;
        return $token;
    }

    public function get_order_notes($order_id = "") {
        if (!empty($order_id)) {
            $OrderMeta = $this->OrderMeta->findByOrder_id($order_id);
            if(empty($OrderMeta)) {
                return false;
            } else {
                $order_notes=$OrderMeta['OrderMeta']['meta_value'];
                $order_notes = unserialize($order_notes);
				$array_order = array_reverse($order_notes);
                //$order_notes = unserialize(base64_decode($order_notes));
                $order_notes=json_encode($array_order);
                return $order_notes;
            }
        } else {
            return false;
        }
    }
	
	/**
     * Generate a unique hash / token.
     * @param Object User
     * @return Object User
     */
    public function __generatePasswordToken($user) {
        if (empty($user)) {
            return null;
        }
        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33, 79)) : $token .= chr(rand(80, 126));
        }
        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;
        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);
        ;
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }
        //$user['User']['reset_password_token'] = $hash;
        //$user['User']['token_created_at'] = date('Y-m-d H:i:s');
        //$user->reset_password_token=$hash;
        //$user->token_created_at=date('Y-m-d H:i:s');
        return $user;
        
    }
	
	/**
     * Generate a unique hash / token for Email Verification.
     * @param Object User
     * @return Object User
     */
    public function __generateEmailVerificationToken() {
        // Generate a random string 100 chars in length.
        $token = "";
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33, 79)) : $token .= chr(rand(80, 126));
        }
        (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;
        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);
        ;
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }
        return $hash;
    }

    public function generateRandomToken($count)
    {
      $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
      $random_string = ''; 
    
      for ($i = 0; $i < $count; $i++) { 
          $random_index = rand(0, strlen($chars) - 1); 
          $random_string .= $chars[$random_index]; 
      } 

      return $random_string; 
    }
	
	
	 /**
     * Sends Email verification Email to user's email address.
     * @param $id
     * @return
     */
    public function sendEmailVerificationEmail($user) {
            
            $reset_link = Router::url(array('controller' => 'Users', 'action' => 'validate_email_verification_token', $user['email_verification_token']),true);
            
            $email = new Email();
            $email
              ->template('easify-user-verfication','easify') //->template('template','layout')
              ->setViewVars(
                          [
                            'reset_link' => $reset_link,
                            'first_name' => $user['first_name'],
                          ]
                      )
              ->emailFormat('html')
              ->from(['connect@easifyy.com' => 'Easifyy'])
              ->to($user['username'])
              ->subject('Email Verification Link - Easifyy')
              ->send($msg);
            // return true;
    }
	
	/**
     * Validate token created at time.
     * @param String $token_created_at
     * @return Boolean
     */
    public function __validToken($token_created_at) {
        $expired = strtotime($token_created_at) + 86400;
        $time = strtotime("now");
        if ($time < $expired) {
            return true;
        }
        return false;
    }
	
	

    public function orderNotes( $order_id , $notes= array()) {
		$data = array();
		if (!empty($order_id) && is_array($notes) ) {
			
			$OrderMeta = $this->OrderMeta->findByOrder_id($order_id);
			if($OrderMeta){
				
				$meta_value = $OrderMeta['OrderMeta']['meta_value'];
				$old = unserialize($meta_value);
				//$old = unserialize(base64_decode($meta_value));    
				$arr_index = 0;
				if( empty($old)) $arr_index = 0;
				else $arr_index = count($old);
				
				$old[$arr_index] = $notes;
				$final = serialize($old);
                //$final = base64_encode(serialize($old));
				$OrderMeta['OrderMeta']['meta_value'] =$final;
				if ($this->OrderMeta->save($OrderMeta['OrderMeta'])) {
					$old = unserialize($final);
					//$old = unserialize(base64_decode($meta_value));    
                    ///print_r($old);
					return true;
				} else {
					return false;
				}
			
			}else{
					$this->OrderMeta->create();
					$old[0] = $notes;
					$final = serialize($old);
                    //$final = base64_encode(serialize($old));
					$OrderMeta['OrderMeta']['order_id']=$order_id;
					$OrderMeta['OrderMeta']['meta_key']='notes';
					$OrderMeta['OrderMeta']['meta_value']= $final;
					
					if ($this->OrderMeta->save($OrderMeta)) {
						return true;
					} else {
						return false;
					}
				}
		
		}
	}
	
    

	public function _get_vendor_categories($vendor_id = null) {

        if ($vendor_id == null)
            return 0;

        $brands = $this->product_brands();

        $categories = $this->Category->find('all', [
            'joins' => [
                [
                    'table' => 'product_categories',
                    'alias' => 'ProdCats',
                    'type' => 'INNER',
                    'conditions' => [
                        'ProdCats.category_id = Category.id'
                    ]
                ],
                [
                    'table' => 'vendor_products',
                    'alias' => 'VendorProd',
                    'type' => 'INNER',
                    'conditions' => [
                        'VendorProd.product_id = ProdCats.product_id',
                        'VendorProd.parent_id is NULL'
                    ]
                ],
            ],
            'conditions' => ['VendorProd.merchant_id' => $vendor_id, 'ProdCats.category_id NOT IN' => $brands['brands_id']],
            'fields' => ['id', '_name', 'parent_category'],
            'group' => 'Category.id'
                ]
        );
        

        unset($brands['brands_id'][0]); /* Unset the brand parent category 'Brand' */
        
        $brands = $this->Category->find('all', [
            'joins' => [
                [
                    'table' => 'product_categories',
                    'alias' => 'ProdCats',
                    'type' => 'INNER',
                    'conditions' => [
                        'ProdCats.category_id = Category.id'
                    ]
                ],
                [
                    'table' => 'vendor_products',
                    'alias' => 'VendorProd',
                    'type' => 'INNER',
                    'conditions' => [
                        'VendorProd.product_id = ProdCats.product_id',
                        'VendorProd.parent_id is NULL'
                    ]
                ],
            ],
            'conditions' => ['VendorProd.merchant_id' => $vendor_id, 'ProdCats.category_id IN' => $brands['brands_id']],
            'fields' => ['id', '_name', 'parent_category'],
            'group' => 'Category.id'
                ]
        );
       
       return array(
            'categories' => $categories,
            'brands' => $brands
        );
    }

    public function _get_vendor_products($vendor_id = null, $limit = 10) {
        if ($vendor_id == null)
            return 0;

        $products = $this->VendorProduct->find('all', [
            'recursive' => -1,
            'contain' => [
                'ProductGallery',
                //'Category',
                'VendorProductMeta',
                'ProductVariation',
            ],
            'limit' => $limit,
            'conditions' => [
                'VendorProduct.merchant_id' => $vendor_id,
                'VendorProduct.parent_id' => null,   
				'VendorProduct.status' => 'Publish'
            ],
            'order' => [
                'VendorProduct.id' => 'Desc'
            ],
			'group' => ['VendorProduct.id'],
            'fields' => [
                'id', 'product_id', 'merchant_id', 'title', 'slug', 'product_type', 'parent_id'
            ]
        ]);
        //$variationMetas = $this->VendorProduct->VariationProduct('list');
       // print_r($products);
        return $products;
    }

    public function _get_vendor_products_bycategory($cat_id = null, $vendor_id = null, $limit=20,$id = null) 
	{
		
        if ($cat_id == null && $vendor_id == null)
            return 0;
        $conditions = array();
        if ( is_array( $cat_id ) ) {
            $conditions['ProductCategory.category_id'] = "IN (".implode(',', $cat_id).")" ;
        } else {
            $conditions['ProductCategory.category_id'] = $cat_id;
        }

        $products = $this->VendorProduct->find('all', [
            'recursive' => -1,
            'contain' => [
                'ProductGallery',
                'Category',
                'VendorProductMeta',
                'ProductVariation',
            ],
            'limit' => $limit,
            'joins' => [
                [
                    'table' => 'product_categories',
                    'alias' => 'ProductCategory',
                    'type' => 'inner',
                    'conditions' => [
                        'ProductCategory.product_id = VendorProduct.product_id',
                    ]
                ]
            ],
            'conditions' => [
                'VendorProduct.merchant_id' => $vendor_id,
                //'ProductCategory.category_id' => $cat_id,
                $conditions,
                'VendorProduct.parent_id' => null,
                //'VendorProduct.product_id NOT IN' => $id
            ],
            'order' => [
                'VendorProduct.id' => 'Desc'
            ],
			'group' => ['VendorProduct.id']
        ]);

        return $products;
    }

    public function _get_extension($file_name) {
        $file = explode('.', $file_name);
        return strtolower($file[(count($file) - 1)]);
    }

    public function product_slugify($text, $inc = null) 
    {
        $this->loadModel('Products');
        $org_text = $text;
        $text = ($inc == null) ? $text : $text . ' ' . $inc;

        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        $exists = $this->Products->findBySlug($text);

        if (!empty($exists)) {
            return $this->product_slugify($org_text, ++$inc);
        } else {
            return $text;
        }
    }


    public function merchant_product_slugify($text, $inc = null) {
      $this->loadModel('MerchantProducts');
        $org_text = $text;
        $text = ($inc == null) ? $text : $text . ' ' . $inc;

        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        $exists = $this->MerchantProducts->findBySlug($text);

        if (!empty($exists)) {
            return $this->merchant_product_slugify($org_text, ++$inc);
        } else {
            return $text;
        }
    }

    public function merchant_slugify($text, $inc = null) 
    {
       $this->loadModel('Merchants');
        $org_text = $text;
        $text = ($inc == null) ? $text : $text . ' ' . $inc;

        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        $exists = $this->Merchants->findBySlug($text);

        if (!empty($exists)) {
            return $this->merchant_slugify($org_text, ++$inc);
        } else {
            return $text;
        }

        //return $text;
    }

    public function get_merchant_meta( $merchant_id = null, $meta_key = null, $type = false ) {
        if ($merchant_id == null || $meta_key == null)
            return 0;

        $model_name = 'MerchantMeta';
        $meta_data = array();
        // if ($type) {
        //     $model_name = 'VendorProductMeta';
        // }

        $meta_data = $this->$model_name->find('first', array('conditions' => array($model_name.'.merchant_id' => $merchant_id, 'meta_key' => $meta_key)));

        $meta_data_collection = array();
        if (!empty($meta_data)) {
            foreach ($meta_data as $md_key => $md_value) {
                if (isset($md_value['meta_value'])) {
                    $meta_data_collection = $md_value['meta_value'];
                }
            }

            return $meta_data_collection;
        } else {
            return 0;
        }
    }

    /**
     * @Name: get_product_meta
     * @Desc: Get product meta field
     * @Params: $product_id, $meta_key, $type
     * $type is a bool. If request for Vendor then $type will be true
     * */
    public function get_product_meta($product_id = null, $meta_key = null, $type = false) {

        if ($product_id == null || $meta_key == null)
            return 0;

        $model_name = 'ProductMeta';
        $meta_data = array();
        if ($type) {
            $model_name = 'VendorProductMeta';
        }

        $meta_data = $this->$model_name->find('first', array('conditions' => array($model_name.'.product_id' => $product_id, 'meta_key' => $meta_key)));
        // print_r($meta_data);
        $meta_data_collection = array();
        if (!empty($meta_data)) {
            foreach ($meta_data as $md_key => $md_value) {
                if (isset($md_value['meta_value'])) {
                    $meta_data_collection = $md_value['meta_value'];
                }
            }

            return $meta_data_collection;
        } else {
            return 0;
        }
    }

    /**
     * @Name: update_product_meta
     * @Desc: Update product meta field
     * @Params: $product_id, $meta_key, $meta_value, $type
     * $type is a bool. If request for Vendor then $type will be true
     * */
    public function update_product_meta($product_id, $meta_key, $meta_value, $type = false) {
        if ($product_id == null || $meta_key == null)
            return 0;
        $model_name = 'ProductMeta';

        if ($type) {
            $model_name = 'VendorProductMeta';
        }

        $exists = $this->$model_name->find('first', array('conditions' => array($model_name.'.product_id' => $product_id, 'meta_key' => $meta_key), 'field' => array('id')));
        // print_r(  $exists);
        /* If product meta already exits */
        if (empty($exists)) {
            $this->$model_name->create();

            $data[$model_name]['product_id'] = $product_id;
            $data[$model_name]['meta_key'] = $meta_key;
            $data[$model_name]['meta_value'] = $meta_value;
            if ($this->$model_name->save($data)) {
                return 1;
            } else {
                return  0;
            }
        } else { /* If product meta doesn't exists */

            $this->$model_name->id = $exists[$model_name]['id'];

            $data[$model_name]['product_id'] = $product_id;
            $data[$model_name]['meta_key'] = $meta_key;
            $data[$model_name]['meta_value'] = $meta_value;
            if ($this->$model_name->save($data)) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function update_merchant_meta($merchant_id, $meta_key, $meta_value ) {

        if ($merchant_id == null || $meta_key == null)
            return 0;

        $model_name = 'MerchantMeta';

        $exists = $this->$model_name->find('first', array('conditions' => array($model_name.'.merchant_id' => $merchant_id, 'meta_key' => $meta_key), 'field' => array('id')));

        /* If product meta already exits */
        if (empty($exists)) {

            $this->$model_name->create();

            $data[$model_name]['merchant_id'] = $merchant_id;
            $data[$model_name]['meta_key'] = $meta_key;
            $data[$model_name]['meta_value'] = $meta_value;
            if ($this->$model_name->save($data)) {
                return 1;
            } else {
                return 0;
            }
        } else { /* If product meta doesn't exists */

            $this->$model_name->id = $exists[$model_name]['id'];
            $data[$model_name]['merchant_id'] = $merchant_id;
            $data[$model_name]['meta_key'] = $meta_key;
            $data[$model_name]['meta_value'] = $meta_value;
            if ($this->$model_name->save($data)) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    /**
     * @Name: save_product_meta_data
     * @Desc: Save all product meta in a single function. For future use so we don't have to change at every loc
     * @Params: $product_id, $meta_data array, $array_key which is currently being saved
     * 
     * */
    public function save_product_meta_data($product_id = 0, $meta_data = array(), $array_key = 0) {

        if ($array_key < 0 ) {
            $this->update_product_meta($product_id, '_hsn_code', @$meta_data['_hsn_code']);
            $this->update_product_meta($product_id, '_is_taxable', @$meta_data['_is_taxable']);
            $this->update_product_meta($product_id, '_tax_inclusive', @$meta_data['_tax_inclusive']);
            $this->update_product_meta($product_id, '_cgst', @$meta_data['_cgst']);
            $this->update_product_meta($product_id, '_sgst', @$meta_data['_sgst']);
            $this->update_product_meta($product_id, '_igst', @$meta_data['_igst']);
			$this->update_product_meta($product_id, '_custom_product', @$meta_data['_custom_product']);
        } else {

            $this->update_product_meta($product_id, '_item_code', @$meta_data['_item_code'][$array_key]);
            $this->update_product_meta($product_id, '_bar_code', @$meta_data['_bar_code'][$array_key]);
            $this->update_product_meta($product_id, '_unit', @$meta_data['_unit'][$array_key]);
            $this->update_product_meta($product_id, '_weight', @$meta_data['_weight'][$array_key]);
            $this->update_product_meta($product_id, '_price', @$meta_data['_price'][$array_key]);
            $this->update_product_meta($product_id, '_sale_price', @$meta_data['_sale_price'][$array_key]);
            $this->update_product_meta($product_id, '_stock', @$meta_data['_stock'][$array_key]);
            $this->update_product_meta($product_id, '_hsn_code', @$meta_data['_hsn_code']);
            $this->update_product_meta($product_id, '_is_taxable', @$meta_data['_is_taxable']);
            $this->update_product_meta($product_id, '_tax_inclusive', @$meta_data['_tax_inclusive']);
            $this->update_product_meta($product_id, '_cgst', @$meta_data['_cgst']);
            $this->update_product_meta($product_id, '_sgst', @$meta_data['_sgst']);
            $this->update_product_meta($product_id, '_igst', @$meta_data['_igst']);
            $this->update_product_meta($product_id, '_custom_product', @$meta_data['_custom_product']);
            $stock = $meta_data['_stock'][$array_key] == "" ? $meta_data['_stock'][$array_key] : $meta_data['_stock'][$array_key];
       
        }
    }

    /**
     * @Name: save_admin_product_meta_data
     * @Desc: Save all product meta in a single function. For future use so we don't have to change at every loc
     * @Params: $product_id, $meta_data array, $array_key which is currently being saved
     * 
     * */
    public function save_admin_product_meta_data($product_id = 0, $meta_data = array(), $array_key = 0, $save_global_meta = false, $call_admin = true) {

        if ($save_global_meta) {
            
            $this->update_product_meta($product_id, '_hsn_code', @$meta_data['_hsn_code'], $call_admin);
            $this->update_product_meta($product_id, '_is_taxable', @$meta_data['_is_taxable'], $call_admin);
            $this->update_product_meta($product_id, '_tax_inclusive', @$meta_data['_tax_inclusive'],$call_admin);
            $this->update_product_meta($product_id, '_cgst', @$meta_data['_cgst'], $call_admin);
            $this->update_product_meta($product_id, '_sgst', @$meta_data['_sgst'], $call_admin);
            $this->update_product_meta($product_id, '_igst', @$meta_data['_igst'], $call_admin);
			if(isset($meta_data['_bundled_product_ids'])){
			$this->update_product_meta($product_id, '_bundled_product_ids', @$meta_data['_bundled_product_ids'], $call_admin);
			}
            
        } else {

            unset($meta_data['_hsn_code']);
            unset($meta_data['_is_taxable']);
            unset($meta_data['_tax_inclusive']);
            unset($meta_data['_cgst']);
            unset($meta_data['_sgst']);
            unset($meta_data['_igst']);

            //print_r($meta_data);
           
            /*unset($meta_data['_item_code'][$array_key]);
            unset($meta_data['_unit'][$array_key]);
            unset($meta_data['_weight'][$array_key]);
            unset($meta_data['_bar_code'][$array_key]);*/

            /*$_item_code = $this->get_product_meta(@$meta_data['id'][$array_key], '_item_code');
            $_bar_code = $this->get_product_meta(@$meta_data['id'][$array_key], '_bar_code');
            $_unit = $this->get_product_meta(@$meta_data['id'][$array_key], '_unit');
            $_weight = $this->get_product_meta(@$meta_data['id'][$array_key], '_weight');*/


            $this->update_product_meta($product_id, '_item_code', $meta_data['_item_code'][$array_key], $call_admin);
            $this->update_product_meta($product_id, '_bar_code', $meta_data['_bar_code'][$array_key], $call_admin);
            $this->update_product_meta($product_id, '_unit', $meta_data['_unit'][$array_key], $call_admin);
            $this->update_product_meta($product_id, '_weight', $meta_data['_weight'][$array_key], $call_admin);
            $this->update_product_meta($product_id, '_price', $meta_data['_price'][$array_key], $call_admin);
            $this->update_product_meta($product_id, '_sale_price', $meta_data['_sale_price'][$array_key], $call_admin);
            $this->update_product_meta($product_id, '_stock', $meta_data['_stock'][$array_key], $call_admin);
        }
    }

    /**
     * @Name: delete_product_meta
     * @Desc: Delete product meta field
     * @Params: $product_id, $type
     * $type is a bool. If request for Vendor then $type will be true
     * */
    public function delete_product_meta($product_id, $type = false) {

        if ($product_id == null || $meta_key == null)
            return 0;

        $exists = null;
        $model_name = "ProductMeta";
        if ($type) {
            $model_name = "VendorProductMeta";
        }
        $exists = $this->$model_name->find('all', array('conditions' => array('product_id' => $product_id), 'fields' => array('id')));


        /* If product meta already exits */
        if (empty($exists)) {

            return 0;
        } else { /* If product meta doesn't exists */

            foreach ($exists as $key => $value) {

                $this->$model_name->id = $value['ProductMeta']['id'];
                $this->$model_name->delete();
            }
            return 1;
        }
    }

    protected function get_product_category($product_id) {

        $product_category = $this->ProductCategory->find('all', array('conditions' => array('product_id' => $product_id), 'fields' => array('category_id')));
        if (empty($product_category))
            return 0;

        $categories = array();
        foreach ($product_category as $pc_key => $pc_value) {
            $category_id = $pc_value['ProductCategory']['category_id'];
            $categories[] = $category_id;
            $parent_category = $this->Category->find('all', array('conditions' => array('id' => $category_id, 'parent_category <>' => null), 'fields' => array('parent_category')));

            if (!empty($parent_category)) {
                foreach ($parent_category as $pc_key => $pc_value) {
                    $categories[] = $pc_value['Category']['parent_category'];
                }
            }
        }

        return $categories;
    }

    public function upload_image_old( $id, $type) {

        $this->autoRender = false;
        if (!empty($_FILES)) {

            $file_name = date('ymdhis-') . $_FILES['file']['name'];
            
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

            

            if ( $type == 'featured' ) {
                $featured_image = $this->ProductGallery->find('first', array('conditions' => array('product_id' => $id, 'type' => $type ), 'fields' => array('id')));
                if (!empty($featured_image)) {
                    $this->ProductGallery->id = $featured_image['ProductGallery']['id'];
                    $this->ProductGallery->save( array('ProductGallery' => array('url' => $file_name )) );
                } else {
                    $this->ProductGallery->create();
                    $this->ProductGallery->save(
                            array(
                                'ProductGallery' => array(
                                    'url' => $file_name,
                                    'product_id' => $id,
                                    'type' => $type
                                )
                            )
                    );
                }
            } else {
                $this->ProductGallery->create();
                $this->ProductGallery->save(
                        array(
                            'ProductGallery' => array(
                                'url' => $file_name,
                                'product_id' => $id,
                                'type' => $type
                            )
                        )
                );
            }

            echo json_encode($file_name);
        }
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

    public function upload_post_image() {

        $this->autoRender = false;

        if (!empty($_FILES)) {

            $file_name = date('ymdhis-') . $_FILES['file']['name'];
            $path_parts = pathinfo($file_name);
            $destination = WWW_ROOT . DS . 'img' . DS . 'post-images' . DS . $file_name;
            move_uploaded_file($_FILES['file']['tmp_name'], $destination);
            
            $destination_app = WWW_ROOT . DS . 'img' . DS . 'post-images' . DS . 'app-images'. DS . $file_name;
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
        }
    }


    // public function uploadImageStore() {

    //     $this->autoRender = false;

    //     if (!empty($_FILES)) {

    //         $file_name = date('ymdhis-') . $_FILES['file']['name'];
    //         $path_parts = pathinfo($file_name);            
    //         //Upload image for Web Site
    //         $destination = WWW_ROOT . DS . 'images' . DS . 'store_pics' . DS . $file_name;
    //         move_uploaded_file($_FILES['file']['tmp_name'], $destination);
    //         //Upload Images for App
    //         $destination_app = WWW_ROOT . DS . 'images' . DS . 'store_pics' . DS . 'app-images'. DS . $file_name;
    //         $size=getimagesize($destination);
    //         copy ( $destination , $destination_app );
    //         //Resixe image to 125*75 resolution
    //         $new_width=125;
    //         $new_height=75;
    //         $width=$size[0];
    //         $height=$size[1];
    //         $image_p = imagecreatetruecolor($new_width, $new_height);
    //         $whiteBackground = imagecolorallocate($image_p, 255, 255, 255); 
    //         imagefill($image_p,0,0,$whiteBackground); // fill the background with white
    //         if ($path_parts['extension'] == 'jpg') {
    //             $image = imagecreatefromjpeg($destination_app);
    //         } elseif ($path_parts['extension'] == 'gif') {
    //             $image = imageCreateFromGif($destination_app);
    //         } elseif ($path_parts['extension'] == 'png') {
    //             $image = imageCreateFromPng($destination_app);
    //         }
    //         imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    //         if ($path_parts['extension'] == 'jpg') {
    //             imagejpeg($image_p, $destination_app);
    //         } elseif ($path_parts['extension'] == 'gif') {
    //             imagegif($image_p, $destination_app);
    //         } elseif ($path_parts['extension'] == 'png') {
    //             imagepng($image_p, $destination_app);
    //         }
    //         echo json_encode($file_name);
    //     }
    // }

    public function superadmin_upload_category_image() {

        $this->autoRender = false;

        if (!empty($_FILES)) {

            $file_name = date('ymdhis-') . $_FILES['file']['name'];
            $path_parts = pathinfo($file_name);            
            $destination = WWW_ROOT . 'images' . DS . 'cat-images' . DS . $file_name;
            move_uploaded_file($_FILES['file']['tmp_name'], $destination);
            //Upload images for Appp
            $destination_app = WWW_ROOT . DS . 'images' . DS . 'cat-images' . DS . 'app-images'. DS . $file_name;
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
                $image = imagecreatefromjpeg($destination);
            } elseif ($path_parts['extension'] == 'gif') {
                $image = imageCreateFromGif($destination);
            } elseif ($path_parts['extension'] == 'png') {
                $image = imageCreateFromPng($destination);
            }
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            if ($path_parts['extension'] == 'jpg') {
                header("Content-type: image/jpeg");
                imagejpeg($image_p, $destination);
            } elseif ($path_parts['extension'] == 'gif') {
                header("Content-type: image/gif");
                imagegif($image_p, $destination);
            } elseif ($path_parts['extension'] == 'png') {
                header("Content-type: image/png");
                imagepng($image_p, $destination);
            }
            //echo json_encode($this->webroot.'images'.DS.'/cat-images'.DS. $file_name);
            echo json_encode($file_name);
        }
    }

    public function superadmin_delete_product_image() {

        $this->autoRender = false;
        $this->loadModel('ProductCategories');
        if (!empty($_POST)) {
            $image = $this->ProductCategories->findById($_POST['gallery_id']);

            if (!empty($_POST)) {
                $this->ProductCategories->id = $_POST['gallery_id'];
                $this->ProductCategories->delete();
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }
    }

    public function superadmin_delete_store_image() {
        $this->autoRender = false;
        $this->loadModel('Merchants');

        if (!empty($_POST)) {
            $image = $this->Merchants->findById($_POST['gallery_id']);

            if (!empty($_POST)) {
                $this->Merchants->id = $_POST['gallery_id'];
                $this->Merchants->saveField('store_pic', '');
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }
    }

    public function admin_delete_product_image() {

        $this->autoRender = false;
        //echo json_encode(0);
        if (!empty($_POST)) {
            $image = $this->ProductGallery->findById($_POST['gallery_id']);

            if (!empty($_POST)) {
                $this->ProductGallery->id = $_POST['gallery_id'];
                $this->ProductGallery->delete();
                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }
    }

    public function admin_delete_product_variation() {
        $this->autoRender = false;
        if (!empty($_POST)) {
            $image = $this->VendorProduct->findById($_POST['var_id']);
            $parent_product=$this->VendorProduct->findById($image['VendorProduct']['parent_id']);
            $total_variations=sizeof($parent_product['ProductVariation']);
            if($total_variations >= 2) {
                    if (!empty($_POST)) {
                        $this->VendorProduct->id = $_POST['var_id'];
                        $this->VendorProduct->delete();

                        $product_meta = $this->VendorProductMeta->findByProductId($_POST['var_id']);
                        if (!empty($product_meta)) {
                            foreach ($product_meta as $key => $value) {
                                $this->VendorProductMeta->id = $value['id'];
                                $this->VendorProductMeta->delete();
                            }
                        }
                        echo json_encode(1);
                    } else {
                        echo json_encode(0);
                    }
            } else {
                echo json_encode(-1);
            }

            
        }
    }

    public function superadmin_delete_product_variation() {

        $this->autoRender = false;

        if (!empty($_POST)) {
            $image = $this->Product->findById($_POST['var_id']);

            if (!empty($_POST)) {
                $this->Product->id = $_POST['var_id'];
                $this->Product->delete();

                $product_meta = $this->ProductMeta->findByProductId($_POST['var_id']);
                if (!empty($product_meta)) {
                    foreach ($product_meta as $key => $value) {
                        $this->ProductMeta->id = $value['id'];
                        $this->ProductMeta->delete();
                    }
                }

                echo json_encode(1);
            } else {
                echo json_encode(0);
            }
        }
    }

    /* Get products by Category id
     * @param: category_id:integer, include_sub:bool
     */

    public function get_product_by_category($category_id = null, $include_sub = false, $include_existing = false) {

        if ($category_id == null)
            return 0;

        $get_child_categories = array();
        /* Check if query is to include the Sub categories */
        if ($include_sub) {
            /* Get child categories of the Category id */
            $get_child_categories = $this->Category->find('list', array('conditions' => array('parent_category' => $category_id), 'fields' => array('id', 'id')));
        }
        $get_child_categories[] = $category_id;

        $category_products = $this->ProductCategory->find('list', array(
            'conditions' => array('category_id' => $get_child_categories),
            'fields' => array('id', 'product_id')
                )
        );

        if (empty($category_products)) {
            return 0;
        }
        $vendor_existing_products = array();
        if (!$include_existing) {
            $vendor_existing_products = $this->VendorProduct->find('list', array('conditions' => array('merchant_id' => $this->get_merchant_id()), 'fields' => array('product_id', 'product_id')));

        }
        $this->Product->recursive = 0;
        //pr($vendor_existing_products);
        $conditionsvendor=array();
        if($vendor_existing_products){
             $conditionsvendor['id NOT IN']=$vendor_existing_products;

        }
        $products = $this->Product->find('all', array(
            'conditions' => array('id' => $category_products, $conditionsvendor, 'parent_id' => NULL, 'author'=> 1 ),
            'fields' => array('Product.id', 'Product.title')
                )
        );

        if (!empty($products)) {
            foreach ($products as $p_key => $p_value) {
                $product_image = $this->ProductGallery->find('first', array('conditions' => array('type' => 'featured', 'product_id' => $p_value['Product']['id']), 'fields' => 'url'));
                if (!empty($product_image)) {
                    $products[$p_key]['Product']['url'] = $product_image['ProductGallery']['url'];
                } else {
                    $products[$p_key]['Product']['url'] = '';
                }
            }
        }

        if (!empty($products)) {
            return $products;
        } else {
            return 0;
        }
    }

    public function getLatLong($address) {
        if (!empty($address)) {
            $address = str_replace(" ", "+", $address);
            $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?key=AIzaSyBZ-ITpnMXq-YdnaP6TxcNuft-Tn4qkO2w&address=$address&sensor=false");
            $json = json_decode($json);
			//print_r($json);
            $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
            $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
            $user_location = array("lat" => $lat, "long" => $long );
            return $user_location;
        }
    }

    public function _getcities($id = null) {
        $this->autoRender = false;
        $options = '';
        if (is_numeric($id)) {
            $cities = $this->CityMaster->find('list', array('conditions' => 'CityMaster.statecode=' . $id,
                'fields' => array('id', 'name')));
            $options = '<option value="">--Select City--</option>' . "\n";
            foreach ($cities as $key => $option) {
                $options .= '<option value="' . $key . '">' . $option . '</option>' . "\n";
            }
        } elseif (is_string($id)) {
            $cities = $this->CityMaster->find('list', array('conditions' => "CityMaster.name LIKE '%$id%'",
                'fields' => array('id', 'name')));
            foreach ($cities as $key => $option) {
                $options .= '<option value="' . $option . '">';
            }
        } else {
            $cities = $this->CityMaster->find('list',
                    array(
                        'contain' => array(),
                        'fields' => array('id', 'name')
                    )
            );
            foreach ($cities as $key => $option) {
                $cities_array[] = $option;
            }

            $options = json_encode($cities_array);
        }



        return $options;
    }

    public function getstates() {
        $this->autoRender = false;

        $states = $this->CityMaster->find('list', array('fields' => array('statecode', 'state'),
            'order' => array('CityMaster.statecode')
                )
        );

        $options = '<option value="">--Select State--</option>' . "\n";
        foreach ($states as $key => $option) {
            $options .= '<option value="' . $key . '">' . $option . '</option>' . "\n";
        }

        return $options;
    }

    public function setCurrentLocation() {
        $this->autoRender = false;
		$result = array();
        $data = array('loc' => $_POST['loc']);
        if ($data) {
			 $link =Router::url(['controller' => 'site', 'action' => 'search_listing']).'?location='.$_POST['loc'];;
			$result['loc'] = $_POST['loc'];
			$result['link'] = $link;
            //$this->getLatLong($_POST['loc'];
            $this->Session->write('user_location', $data);
            //print_r($data);
        }
        return json_encode($result);
    }

    protected function getShippingCharges( $merchant_id, $cart_total){

        //$merchant_id = $this->getFieldByID('Merchant', 'user_id', $merchant_id, 'id');
        $minimum_order = $this->get_merchant_meta( $merchant_id, 'minimum_order', true );
        
        if ( $minimum_order == '' ) {
          
          $response = array(
              array(
                'status' => 0,
                'message' => 'Invalid request!'
              )
            );
          return $response;
        }

        $delivery_charges = 0;

        if( $minimum_order > $cart_total ) {
          $delivery_charges = $this->get_merchant_meta( $merchant_id, 'delivery_charges', true );
          $response = array(
              array(
                'status' => 1,
                'message' => $delivery_charges
              )
            );
          return $response;
        } else {
          $response = array(
              array(
                'status' => 1,
                'message' => 0
              )
            );
          return $response;
        }
    }

    /*
    * Order delivery time Managment.
    * return order delivery date and time.
    */

    public  function admin_order_delivery($merchant_id){

        $current_time=date("H:i:s"); 
        $current_date = date("d-M-Y");
        $buffer_time = "+30 minutes";
        $buffer_time_slot = strtotime($buffer_time, strtotime($current_time));
        $buffer_time_slot =date('H:i:s', $buffer_time_slot);
        $next_date = date("d-M-Y", time() + 86400);
        $first_slot_start = date('H:i:s',strtotime('9:00'));
        $first_slot_end = date('H:i:s',strtotime('12:00'));
        $second_slot_start = date('H:i:s',strtotime('15:00'));
        $second_slot_end = date('H:i:s',strtotime('17:00'));
        $merchant_delivery_array = $this->order_delivery_time($merchant_id);
        //print_r( $merchant_delivery_array);
        //die;
        if( isset($merchant_delivery_array['delivery_time']) ){
             $delivery_time = date('H:i:s',strtotime($merchant_delivery_array['delivery_time']));
               $delivery_date = date("d-M-Y",strtotime($merchant_delivery_array['delivery_date']));
            if($delivery_time <  $buffer_time_slot ){

                if( $delivery_time < $first_slot_start && $delivery_date == $current_date  ){

                   return $order_delivery_time = 'Between '. $first_slot_start .' - '. $first_slot_end .' on '. $delivery_date;

                }elseif($delivery_time < $second_slot_start && $delivery_date == $current_date ){
                    return $order_delivery_time = 'Between '. $second_slot_start .' - '. $second_slot_end .' on '. $delivery_date;
                }else{
                    return $order_delivery_time = 'Between '. $first_slot_start .' - '. $first_slot_end .' on '. $next_date;
                }

                
            }else{
                return $order_delivery_time = 'Between '. $first_slot_start .' - '. $first_slot_end .' on '. $next_date;
            }

            
        }

        //$delivery_time = strtotime("+15 minutes", strtotime($delivery_time));

    }

    public function order_delivery_time($merchant_id) {

        $this->Merchant->id = $merchant_id;
        $merchant_status = $this->Merchant->field('status');

        $delivery_date = date("d-M-Y");
        $current_time = date("H:i:s");
        $merchant_array = array(
                        'delivery_date' => $delivery_date,
                        'delivery_time' => $current_time
                        );
        $current_time = DateTime::createFromFormat('H:i:s', $current_time);
         
        //Get Store Meta Info.
        $MerchantMeta=$this->MerchantMeta->
              find('all',array('conditions'=>array('merchant_id'=>$merchant_id)));
		
        foreach ($MerchantMeta as $MerchantMeta_key => $MerchantMeta_value) {
            if($MerchantMeta_value['MerchantMeta']['meta_key']=='open_time') {
                $open_time=$MerchantMeta_value['MerchantMeta']['meta_value'];
            }
            elseif($MerchantMeta_value['MerchantMeta']['meta_key']=='close_time') {
                $close_time=$MerchantMeta_value['MerchantMeta']['meta_value'];
            }
            elseif($MerchantMeta_value['MerchantMeta']['meta_key']=='delivery_slot') {
                $delivery_slot=$MerchantMeta_value['MerchantMeta']['meta_value'];
            } 
            elseif($MerchantMeta_value['MerchantMeta']['meta_key']=='deliver_time') {
                $merchant_delivery_time=$MerchantMeta_value['MerchantMeta']['meta_value'];
            }         
        }
        
            $interval = DateInterval::createFromDateString($delivery_slot);
            $begin = new DateTime($open_time);
            $end = new DateTime($close_time);
            // DatePeriod won't include the final period by default, so increment the end-time by our interval
            $end->add($interval);

            // Convert into array to make it easier to work with two elements at the same time
            $periods = iterator_to_array(new DatePeriod($begin, $interval, $end));

            $start = array_shift($periods);
            
            //Calculate Delivery Time between Diffrents Slots
            $count=1;
            foreach ($periods as $time) {
               $slot__start=$start->format('H:i:s');
               $slot__end=$time->format('H:i:s');
               $start = $time;
               $delivery_time=$start->format('H:i:s');
               
               //Add merchant deliver time in slot
               $delivery_time = strtotime("+".$merchant_delivery_time."minutes", strtotime($delivery_time));
               $delivery_time =date('H:i:s', $delivery_time);
               
               //Add extraa 15 min in order deliver time.
               $delivery_time = strtotime("+15 minutes", strtotime($delivery_time));
               $delivery_time =date('H:i:s', $delivery_time);
               
               if($count==1) {
                $next_day_delivery_time=$delivery_time;
               }
                $_slot_start = DateTime::createFromFormat('H:i:s', $slot__start);
                $_slot_end = DateTime::createFromFormat('H:i:s', $slot__end);   
                //If store close today
                if($merchant_status=='0') {
                   $delivery_date = date("Y-M-d", time() + 86400);
                   $order_delivery_time=$delivery_date.' '.$next_day_delivery_time;
                   $merchant_array = array(
                        'delivery_date' => $delivery_date,
                        'delivery_time' => $next_day_delivery_time
                        );
                   //return $order_delivery_time; 
                   return $merchant_array;  
                }
                if ($current_time > $_slot_start && $current_time < $_slot_end) {
                   $order_delivery_time=$delivery_date.' '.$delivery_time;
                  // return $order_delivery_time;
                   $merchant_array = array(
                        'delivery_date' => $delivery_date,
                        'delivery_time' => $delivery_time
                        );
                   //return $order_delivery_time; 
                   return $merchant_array;  
                }
                
            $count++;    
            }
            
            //Check Conditions if order recived before shop open.
            $open_time = DateTime::createFromFormat('H:i:s', date("h:i a", strtotime($open_time)));
            $close_time = DateTime::createFromFormat('H:i:s', date("h:i a", strtotime($close_time)));
            if ($current_time < $open_time) {
                   $order_delivery_time=$delivery_date.' '.$next_day_delivery_time;
                   //return $order_delivery_time;
                    $merchant_array = array(
                        'delivery_date' => $delivery_date,
                        'delivery_time' => $next_day_delivery_time
                        );
                   //return $order_delivery_time; 
                   return $merchant_array;  
            }
            //Order recived after shop close
            if ($current_time > $close_time) {
                   $delivery_date = date("Y-M-d", time() + 86400);
                   $order_delivery_time=$delivery_date.' '.$next_day_delivery_time;
                  // return $order_delivery_time;
                   $merchant_array = array(
                        'delivery_date' => $delivery_date,
                        'delivery_time' => $next_day_delivery_time
                        );
                   //return $order_delivery_time; 
                   return $merchant_array; 
            }
            
           
    }

    public function web_customer_cancel_order(  ) {
      $this->autoRender=false;
      $response=array();
      $order_id=$_POST['order_id'];
      $customer_id=$_POST['customer_id'];
      $order=$this->Order->findByid($order_id);
      $order_status=$order['Order']['status'];
      
      if( $order['Order']['user_id'] == $customer_id ) {
          
          if( $order_status == 'Processing' ) {
          //Save Order Note
              $_date=date("d-M-Y");
              $_time=date("h:i:a");
              $curr_date=$_date.' '.$_time;
              $notes=array(
                  'type'=>'customer',
                  'message'=> 'Order status changed from '.$order_status.' to Cancelled',
                  'time'=> $curr_date,
              );
              $this->orderNotes($order_id,$notes);
            //End
            //Update Status    
            $this->Order->id=$order_id;
            $this->Order->saveField('status','Cancelled' );
            //End 
            return 1;

          } else {
             return 0;
          }
      } else {
          
          return 0;
      }
      // return json_encode($response);
  }

    public function estimate_delivery_time($merchant_id) {

        $this->Merchant->id = $merchant_id;
        $merchant_status = $this->Merchant->field('status');

        $delivery_date=date("d-M-Y");
        $current_time=date("h:i:a");
        $current_time = DateTime::createFromFormat('H:i a', $current_time);
         
        //Get Store Meta Info.
        $MerchantMeta=$this->MerchantMeta->
              find('all',array('conditions'=>array('merchant_id'=>$merchant_id)));

        foreach ($MerchantMeta as $MerchantMeta_key => $MerchantMeta_value) {
            if($MerchantMeta_value['MerchantMeta']['meta_key']=='open_time') {
                $open_time=$MerchantMeta_value['MerchantMeta']['meta_value'];
            }
            elseif($MerchantMeta_value['MerchantMeta']['meta_key']=='close_time') {
                $close_time=$MerchantMeta_value['MerchantMeta']['meta_value'];
            }
            elseif($MerchantMeta_value['MerchantMeta']['meta_key']=='delivery_slot') {
                $delivery_slot=$MerchantMeta_value['MerchantMeta']['meta_value'];
            } 
            elseif($MerchantMeta_value['MerchantMeta']['meta_key']=='deliver_time') {
                $merchant_delivery_time=$MerchantMeta_value['MerchantMeta']['meta_value'];
            }         
        }
        
            $interval = DateInterval::createFromDateString($delivery_slot);

            $begin = new DateTime($open_time);
            $end = new DateTime($close_time);
            // DatePeriod won't include the final period by default, so increment the end-time by our interval
            $end->add($interval);
            // Convert into array to make it easier to work with two elements at the same time
            $periods = iterator_to_array(new DatePeriod($begin, $interval, $end));

            $start = array_shift($periods);
            
            //Calculate Delivery Time between Diffrents Slots
            $count=1;
            foreach ($periods as $time) {
               $slot__start=$start->format('g:i a');
               $slot__end=$time->format('g:i a');
               $start = $time;
               $delivery_time=$start->format('g:i a');
               
               //Add merchant deliver time in slot
               $delivery_time = strtotime("+".$merchant_delivery_time."minutes", strtotime($delivery_time));
               $delivery_time =date('g:i a', $delivery_time);
               
               //Add extraa 15 min in order deliver time.
               $delivery_time = strtotime("+30 minutes", strtotime($delivery_time));
               $delivery_time =date('g:i:a', $delivery_time);
               
               if($count==1) {
                $next_day_delivery_time=$delivery_time;
               }
                $_slot_start = DateTime::createFromFormat('H:i a', $slot__start);
                $_slot_end = DateTime::createFromFormat('H:i a', $slot__end);   
                //If store close today
                if($merchant_status=='0') {
                    $delivery_date = date("Y-M-d", time() + 86400);
                   $order_delivery_time=$delivery_date.' '.$next_day_delivery_time;
                   return $order_delivery_time;   
                }
                if ($current_time > $_slot_start && $current_time < $_slot_end) {
                   $order_delivery_time=$delivery_date.' '.$delivery_time;
                   return $order_delivery_time;
                }
                
            $count++;    
            }
            
            //Check Conditions if order recived before shop open.
            $open_time = DateTime::createFromFormat('H:i a', date("h:i a", strtotime($open_time)));
            $close_time = DateTime::createFromFormat('H:i a', date("h:i a", strtotime($close_time)));
            if ($current_time < $open_time) {
                   $order_delivery_time=$delivery_date.' '.$next_day_delivery_time;
                   return $order_delivery_time;
            }
            //Order recived after shop close
            if ($current_time > $close_time) {
                   $delivery_date = date("Y-M-d", time() + 86400);
                   $order_delivery_time=$delivery_date.' '.$next_day_delivery_time;
                   return $order_delivery_time;
            }
            
           
    }

    /*
     * Order Notification Function's
     * @param string $order
     * @return true
     */

    //Send mail to Superadmin and Admin When new Merchant Register
    public function merchant_register_notice($data) {
        
        //Send Mail to Superadmin
        $email = new CakeEmail();
        $email->emailFormat('html');
        $email->template('superadmin_merchant_regiter', 'order');
        $email->viewVars(array('data' => $data));
        $email->from(array('vinit.webrndexperts@gmail.com' => 'Local Laala'));
        $email->to('sarbjit.rndexperts@gmail.com');
        $email->subject('Local Laala- New Merchant Request For Open Store');
        $email->send();

        //Send Mail to Register User
        $email = new CakeEmail();
        $email->emailFormat('html');
        $email->template('merchant_regiter', 'order');
        $email->viewVars(array('data' => $data));
        $email->from(array('vinit.webrndexperts@gmail.com' => 'Local Laala'));
        $email->to($data['User']['username']);
        $email->subject('Local Laala- New Registeration');
        $email->send();
        
        return true;
        //die('Here 321');
    }

    //Send mail to merchant when customer reuqest for cancel order.
    public function send_order_cancel_request($merchant_email,$customer_info,$order_id) {

        $email = new CakeEmail();
        $email->emailFormat('html');
        $email->template('order-cancel-request', 'order');
        $email->viewVars(array('customer_info' => $customer_info, 'order_id'=> $order_id));
        $email->from(array('vinit.webrndexperts@gmail.com' => 'Local Grocry'));
        $email->to($merchant_email);
        $email->subject('Local Grocery- Order Cancel Request');
        $email->send();
        return true;
    }

    //Send mail to customer when order cancel request declined
    public function send_decline_ordercancel_request($order_id,$customer_email) {
       
        $email = new CakeEmail();
        $email->emailFormat('html');
        $email->template('order-cancel-request-decline', 'order');
        $email->viewVars(array('order_id'=> $order_id));
        $email->from(array('vinit.webrndexperts@gmail.com' => 'Local Grocry'));
        $email->to($customer_email);
        $email->subject('Local Grocery- Order Cancel Request');
        $email->send();
        return true;   
    }
    //Send Order Email to Customer
    public function sendEmailCustomerOrder($order,$customer_info) {
        
        $email = new CakeEmail();
        $email->emailFormat('html');
        $email->template('order-confirmation-customer', 'order');
        $email->viewVars(array('order' => $order,'customer_info' => $customer_info));
        $email->from(array('vinit.webrndexperts@gmail.com' => 'Local Grocry'));
        $email->to($order['User']['username']);
        $email->subject('Local Grocery- Thanks For Your Order');
        $email->send();
        return true;
    }

    //Send Order Email to Merchant
    public function sendEmailMerchantOrder($order,$customer_info) {

        //Get Merchant Useremail
        $Merchant_id = $order['Merchant']['user_id'];
        $this->User->id = $Merchant_id;
        $Merchant_username = $this->User->field('username');
        //Send Email to Merchant
        $email = new CakeEmail();
        $email->emailFormat('html');
        $email->template('order-received-merchant', 'order');
        $email->viewVars(array('order' => $order,'customer_info' => $customer_info));
        $email->from(array('vinit.webrndexperts@gmail.com' => 'Local Grocry'));
        $email->to($Merchant_username);
        $email->subject('Local Grocery- New Order Received');
        $email->send();
        return true;
        
    }

    //Send Order Status Update By Email to Customer.
    public function sendEmailCustomerStatusUpdate($order, $customer_email, $status_change_to,$customer_info) {
        //echo  $customer_email; die();
        //Customer Email
        // $to = $order['Order']['email'];
        $status_update = '';
        if ($status_change_to == 'On Hold'):
            $status_update .= 'Order status  On Hold';
        elseif ($status_change_to == 'Accepted'):
            $status_update .= 'Order has been accepted.';
        elseif ($status_change_to == 'Pending payment'):
            $status_update .= 'Order status Pending payment';
        elseif ($status_change_to == 'Processing'):
            $status_update .= 'Order status Processing';
        elseif ($status_change_to == 'Completed'):
            $status_update .= 'Order status Completed';
        elseif ($status_change_to == 'Cancelled'):
            $status_update .= 'Order status Cancelled';
        elseif ($status_change_to == 'Cancelled By Customer'):
            $status_update .= 'Order status Cancelled By Customer';
        else :
            $status_update .= 'Order status has been changed';
        endif;

        $email = new CakeEmail();
        $email->emailFormat('html');
        $email->template('order-status-update-customer', 'order');
        $email->viewVars(array('order' => $order, 'status_update' => $status_update,'customer_info'=>$customer_info));
        $email->from(array('vinit.webrndexperts@gmail.com' => 'Local Grocry'));
        $email->to( $customer_email );
        $email->subject('Local Grocery- Order Status Update');
        $email->send();
        return true;
    }

    //Send Order Status Update By SMS to Customer. 
    public function sendMessageCustomerStatusUpdate($order, $status) {

        $customer_phoneno = $order['Order']['phone'];
        $Message = '';
        if ($status == 'On Hold'):
            $Message .= '<h1>Order status On Hold</h1>';
        elseif ($status == 'Pending payment'):
            $Message .= '<h1>Order status  Pending payment</h1>';
        elseif ($status == 'Processing'):
            $Message .= '<h1>Order status Processing</h1>';
        elseif ($status == 'Completed'):
            $Message .= '<h1>Order status Completed</h1>';
        elseif ($status == 'Cancelled'):
            $Message .= '<h1>Order status Cancelled</h1>';
        elseif ($status == 'OrderReceived'):
            $Message .= 'LocalStore:Thanks for shopping with us,' . $order['Order']['first_name'] . '! Your order confirmed. Have
            Order Id #' . $order['Order']['id'];
        endif;

        $apiKey = urlencode('6bR/+otX8K8-8T2LqHGQVT1I29mqGDRQVYeaFoQyLN');
        $numbers = array($customer_phoneno);
        $sender = urlencode('TXTLCL');
        $message = rawurlencode($Message);
        $numbers = implode(',', $numbers);
        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        // Process your response here
        $response;
        return true;
    }

    //Send SMS to Merchant
    public function sendMessageMerchantOrder($order) {

        $merchant_phoneno = $order['Merchant']['phone_1'];
        $message = 'LocalStore: New Order Received. You have received an order from ' . $order['Order']['first_name'] . '. Have order id #' . $order['Order']['id'];

        $apiKey = urlencode('6bR/+otX8K8-8T2LqHGQVT1I29mqGDRQVYeaFoQyLN');
        $numbers = array($merchant_phoneno);
        $sender = urlencode('TXTLCL');
        $message = rawurlencode($message);
        $numbers = implode(',', $numbers);
        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        // Process your response here
        $response;
        return true;
    }

    /*
    * Create Notfications For customer.
    * Params Notification type.
    */
    public function create_notification_customer($order,$notifications_type) {
        $data=array();
        if($notifications_type=='Order Notification') {
            $message='Your order has been received.';
            $link= BASE_URL.'orders/view/'.$order['Order']['id'];
        } else {
            $message='Your Order Status has been changed to '.$notifications_type;
            $link= BASE_URL.'orders/view/'.$order['Order']['id'];
        }
        $data['Notification']['user_id']=$order['User']['id'];
		$data['Notification']['order_id']=$order['Order']['id'];
        $data['Notification']['type']=$notifications_type;
        $data['Notification']['message']=$message;
        $data['Notification']['user_type']='customer';
        $data['Notification']['status']=0;
        $data['Notification']['link']=$link;
        $this->Notification->create();
        $this->Notification->save($data);
        return true;
    }

     /*
    * Create Notfications For customer.
    * Params Notification type.
    */
    public function create_notification_merchant($order,$notifications_type) {
        $data=array();
        if($notifications_type=='Order Notification') {
            $message='Your Received a new order. From '.$order['User']['first_name'];
            $link= BASE_URL.'admin/orders/view/'.$order['Order']['id'];
        } else {
            $message='Lorem Ipsum is dummy content. Check status by click on me';
        }
        $data['Notification']['user_id']=$order['Merchant']['id'];
		$data['Notification']['order_id']=$order['Order']['id'];
        $data['Notification']['type']=$notifications_type;
        $data['Notification']['message']=$message;
        $data['Notification']['user_type']='admin';
        $data['Notification']['status']=0;
        $data['Notification']['link']=$link;
        $this->Notification->create();
        $this->Notification->save($data);
        return true;
    }

    
    public function upload_images_storepics() {
        $destination = WWW_ROOT . DS . 'images' . DS . 'store_pics';
        $destination_app = WWW_ROOT . DS . 'images' . DS . 'store_pics' . DS . 'app-images';
        $handle = opendir($destination);
        
        while($file = readdir($handle)){
          if($file !== '.' && $file !== '..'){
                $path_parts = pathinfo($file); 
              
                $file_path=$destination.'/'.$file;
                $size=getimagesize($file_path);
                $file_path=$destination.'/'.$file;
                $destination_path=$destination_app.'/'.$file;
                copy ($file_path, $destination_path);
                $new_width=125;
                $new_height=75;
                $width=$size[0];
                $height=$size[1];
                $image_p = imagecreatetruecolor($new_width, $new_height);
                $whiteBackground = imagecolorallocate($image_p, 255, 255, 255); 
                imagefill($image_p,0,0,$whiteBackground); // fill the background with white
                if ($path_parts['extension'] == 'jpg') {
                    $image = imagecreatefromjpeg($destination_path);
                } elseif ($path_parts['extension'] == 'gif') {
                    $image = imageCreateFromGif($destination_path);
                } elseif ($path_parts['extension'] == 'png') {
                    $image = imageCreateFromPng($destination_path);
                }
                imagecopyresized($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                if ($path_parts['extension'] == 'jpg') {
                    header("Content-type: image/jpeg");
                    imagejpeg($image_p, $destination_path);
                } elseif ($path_parts['extension'] == 'gif') {
                    header("Content-type: image/gif");
                    imagegif($image_p, $destination_path);
                } elseif ($path_parts['extension'] == 'png') {
                    header("Content-type: image/png");
                    imagepng($image_p, $destination_path);
                }
            }
        }
        die('Here');
    }

    public function upload_images_productpics() {
        $destination = WWW_ROOT . DS . 'img' . DS . 'product-images';
        $destination_app = WWW_ROOT . DS . 'img' . DS . 'product-images' . DS . 'app-images';
        $handle = opendir($destination);
        
        while($file = readdir($handle)){
          if($file !== '.' && $file !== '..'){
                $path_parts = pathinfo($file); 
              
                $file_path=$destination.'/'.$file;
                $size=getimagesize($file_path);
                $file_path=$destination.'/'.$file;
                $destination_path=$destination_app.'/'.$file;
                copy ($file_path, $destination_path);
                $new_width=125;
                $new_height=75;
                $width=$size[0];
                $height=$size[1];
                $image_p = imagecreatetruecolor($new_width, $new_height);
                $whiteBackground = imagecolorallocate($image_p, 255, 255, 255); 
                imagefill($image_p,0,0,$whiteBackground); // fill the background with white
                if ($path_parts['extension'] == 'jpg') {
                    $image = imagecreatefromjpeg($destination_path);
                } elseif ($path_parts['extension'] == 'gif') {
                    $image = imageCreateFromGif($destination_path);
                } elseif ($path_parts['extension'] == 'png') {
                    $image = imageCreateFromPng($destination_path);
                }
                imagecopyresized($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                if ($path_parts['extension'] == 'jpg') {
                    header("Content-type: image/jpeg");
                    imagejpeg($image_p, $destination_path);
                } elseif ($path_parts['extension'] == 'gif') {
                    header("Content-type: image/gif");
                    imagegif($image_p, $destination_path);
                } elseif ($path_parts['extension'] == 'png') {
                    header("Content-type: image/png");
                    imagepng($image_p, $destination_path);
                }
            }
        }
        die('Here');
    }
    public function upload_images_catpics() {
        
        $destination = WWW_ROOT . DS . 'images' . DS . 'cat-images';
        $destination_app = WWW_ROOT . DS . 'images' . DS . 'cat-images' . DS . 'app-images';
        $handle = opendir($destination);
        
        while($file = readdir($handle)){
          if(is_file($destination.'/'.$file)){
                $path_parts = pathinfo($file); 
                echo $file;
                echo '<br>';
                $file_path=$destination.'/'.$file;
                $size=getimagesize($file_path);
                $file_path=$destination.'/'.$file;
                $destination_path=$destination_app.'/'.$file;
                copy ($file_path, $destination_path);
                $new_width=125;
                $new_height=75;
                $width=$size[0];
                $height=$size[1];
                $image_p = imagecreatetruecolor($new_width, $new_height);
                $whiteBackground = imagecolorallocate($image_p, 255, 255, 255); 
                imagefill($image_p,0,0,$whiteBackground); // fill the background with white
                if ($path_parts['extension'] == 'jpg') {
                    $image = imagecreatefromjpeg($destination_path);
                } elseif ($path_parts['extension'] == 'gif') {
                    $image = imageCreateFromGif($destination_path);
                } elseif ($path_parts['extension'] == 'png') {
                    $image = imageCreateFromPng($destination_path);
                }
                imagecopyresized($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                if ($path_parts['extension'] == 'jpg') {
                    //header("Content-type: image/jpeg");
                    imagejpeg($image_p, $destination_path);
                } elseif ($path_parts['extension'] == 'gif') {
                    //header("Content-type: image/gif");
                    imagegif($image_p, $destination_path);
                } elseif ($path_parts['extension'] == 'png') {
                    //header("Content-type: image/png");
                    imagepng($image_p, $destination_path);
                }
            }
        }
        die('Here');
    }

    public function push_notification_android( $device_id= null, $message='Test',$title='test'){
        
        $url = 'https://fcm.googleapis.com/fcm/send';
        $api_key='AAAAEdA0rZw:APA91bH5wlgRq-4IZ3q0tl6zmH-TD67cOXbsc4NBkpW-Uo8KmJ5FVPgDvdQ7slHviwJF7dgVT1CrriOkJg8AAFgN2GsFUuSzCNum-ikIvsfypfZ05pjCyrB0gEeS83zvC9xq1ZJ_5l1X';            
        $fields = array (
            'registration_ids' => array (
                    $device_id
            ),
		   'notification' => array(
            'title' => $title, 
            'body' =>  $message 
            ),
            'data' => array (
					'title' => $title,
                    "message" => $message
            )
        );
        //header includes Content type and api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$api_key
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
		
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }

      public function testSMS($order) {
       //  // App::import('Lib', '/Twilio/autoload.php');
       //  //App::uses('Twilio', 'Twilio/Rest/Client');
       //  $customer_phoneno = $order['Order']['phone'];


       //  // Your Account SID and Auth Token from twilio.com/console
       //  // $account_sid = 'AC9c551fa3ed799d8a57aee7aeeabd78e4';
       //  // $auth_token = '8cb79b20f4bb2969273911d21348c70e';

       //  // // A Twilio number you own with SMS capabilities


       //  //$this->Twilio->sendSMS();
       //  //$twilio = $this->Twilio($account_sid, $auth_token);
       //  //$this->Twilio->getInstance($account_sid, $auth_token);
       //          //$client = new Client($account_sid, $auth_token);
       //  /* print_r( $client);
       //    die('Here');
       //    $client->messages->create(
       //    $customer_phoneno,
       //    array(
       //    'from' => $twilio_number,
       //    'body' => 'I sent this message in under 10 minutes!'
       //    )
       //    );
       //    die('Here'); */  
       //  //$twilio_number = "+12512206996";
       // // $to = "8054273751";
       //  //$smscheck = $this->Way2sms->sms($to,"hello check new");


    }

    //Get Merchant id in admin view.
    public function get_merchant_id() {
        //Get Merchant ID
        $user_id = $this->get_current_user_id();
        $this->loadModel('Merchant');
        $merchant_data = $this->Merchant->find('first', array(
            'conditions' => array('user_id' => $user_id),
        ));
        $merchant_id = $merchant_data['Merchant']['id'];
        return $merchant_id;
    }
    
    // Download order invoice as PDF
    public function purchase_pdf_exporter($order_id) {
        $this->loadModel('Order');
        $order=$this->Order->find('first',array('conditions'=>array('Order.id'=>$order_id)));
        $html='';
        
        //TCPDF
        $your_width=200;
        $your_height=300;
        $custom_layout = array($your_width, $your_height);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $custom_layout, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('RND Experts');
        $pdf->SetTitle('Local Store Report');
        $pdf->SetSubject('Local Store Report');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        $pdf->SetFont('dejavusans', '', 9);

        // add a page
        $pdf->AddPage();
        //<img src="'.BASE_URL.'/img/logo-groc.png">
        //Content
        $html='';
        $html.='<div style="text-align:center;">
                    <h1><i><u>Merchant Logo</u></i></h1>
                    <h1>Order Invoice</h1>
                </div>';
        $html.='<br>';
        $html.='<br>';
        $html.='<table border="1" cellspacing="1" cellpadding="4">';
            $html.='<tr>';
                $html.='<td><h4><b>Store Details</b></h4></td>';
                $html.='<td><h4><b>Cutomer Details</b></h4></td>';
                $html.='<td><h4><b>Order Details</b></h4></td>';
            $html.='</tr>';
            $html.='<tr>';
                $html.='<td>';
                   $html.='<b>Store Name: </b>'.$order['Merchant']['store_name'];         
                   $html.='<br>';
                   $html.='<b>GST Number: </b>'.$order['Merchant']['gst_number'];         
                   $html.='<br>';
                   $html.='<b>PAN Number: </b>'.$order['Merchant']['pan_number'];         
                   $html.='<br>';
                   $html.='<b>License Number: </b>'.$order['Merchant']['license_number'];         
                   $html.='<br>';
                   $html.='<b>Address  : </b>'.$order['Merchant']['address_line_1'].''.$order['Merchant']['address_line_2'];         
                   $html.='<br>';
                   $html.='<b>Phone Number: </b>'.$order['Merchant']['phone_1'].' '.$order['Merchant']['phone_2'];         
                $html.='</td>';
                $html.='<td>';
                   $html.='<b>Name: </b>'.$order['Customer']['name'];         
                   $html.='<br>';
                   $html.='<b>Address  : </b>'.$order['Customer']['address_line_1'];         
                   $html.='<br>';
                   $html.='<b>Phone Number: </b>'.$order['Customer']['phone_1']; 
                $html.='</td>';
                $html.='<td>';
                   $html.='<b>Total  : ₹</b>'.$order['Order']['total'];         
                   $html.='<br>';
                   $html.='<b>Order Type: </b>'.strtoupper($order['Order']['order_type']);         
                   $html.='<br>';
                   $html.='<b>Order Mode  : </b>'.strtoupper($order['Order']['order_mode']);         
                   $html.='<br>';
                   $html.='<b>Delivery time: </b>'.$order['Order']['delivery_time']; 
                   $html.='<br>';
                   $html.='<b>Order Status: </b>'.$order['Order']['status']; 
                $html.='</td>';
            $html.='</tr>';
          
        $html.='</table>';
        $html.='<h4>Cart Details</h4>';
        $html.='<table border="1" cellspacing="1" cellpadding="4">';
        $html.='<thead>
                        <tr>
                            <th><b>S No.</b></th>
                            <th><b>Item</b></th>
                            <th><b>Quantity</b></th>
                            <th><b>Price</b></th>
                            <th><b>Total <em>(without tax)</em></b></th>
                            <th colspan="3"><b>Tax</b></th>
                            <th><b>Total <em>(with tax)</em></b></th>
                            <th><b>Stock Status</b></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>CGST</th>
                            <th>SGST</th>
                            <th>IGST</th>
                            <th></th>
                            <th></th>
                        </tr>
                </thead>';  
        $html.='<tbody>';
        $count=1;   
        foreach ($order['OrderItem'] as $order_key => $order_value ) {
            if($order_value['status']==0 ) { $stock="stock empty"; } else { $stock="available"; }
            $html.='<tr>
                        <td>'.$count.'</td>
                        <td>'.$order_value['title'].'</td>
                        <td>'.$order_value['quantity'].'</td>
                        <td>₹'.$order_value['price'].'</td>
                        <td>₹'.$order_value['subtotal'].'</td>
                        <td>₹'.$order_value['cgst'] .'</td>
                        <td>₹'.$order_value['sgst'] .'</td>
                        <td>₹'.$order_value['igst'] .'</td>
                        <td>₹'.$order_value['total'].'</td>
                        <td>'. $stock.'</td>
                    </tr>'; 
            $count++;
        }       
        $html.='</tbody>';
        $html.= '<tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th colspan="3"></th>
                            <th></th>
                        </tr>
                </tfoot>';
        $html.='</table>';
        $html.='<table border="1" cellspacing="1" cellpadding="4">';
            $html.='<tr>';
                $html.='<td rowspan="5"></td>';
                $html.='<td>Total<em>(without tax)</em></td>';
                $html.='<td>₹'.$order['Order']['subtotal'].'</td>';
            $html .='</tr>';
            $html.='<tr>';
                $html.='<td>Tax
                    <br><em>-igst ₹'.$order['Order']['igst'].'</em>
                    <br><em>-sgst ₹'.$order['Order']['sgst'].'</em>
                    <br><em>-cgst ₹'.$order['Order']['cgst'].'</em>
                </td>';
                $html.='<td>₹'.$order['Order']['tax'].'</td>';
            $html .='</tr>';
            if(!empty($order['Order']['coupon_discount'])) {
                $html.='<tr>';
                    $html.='<td>Coupon Discount</td>';
                    $html.='<td>-₹'.$order['Order']['coupon_discount'].'</td>';
                $html .='</tr>';
            } 
            $html.='<tr>';
                $html.='<td>Shipping</td>';
                $html.='<td>₹'.$order['Order']['shipping'].'</td>';
            $html .='</tr>';
            $html.='<tr>';
                $html.='<td>Total Payble Amount</td>';
                $html.='<td>₹'.$order['Order']['total'].'</td>';
            $html .='</tr>';
        $html.='</table>';
        $html.='<div style="text-align:center;">
                    <h5>'.COPYRIGHT.'</h5>
                </div>';        
        $pdf->writeHTML( $html, true, false, true, false, '');
        $pdf->Output('order_invoice.pdf', 'D');
    }

    public function send_coupon_generated_email($user_info,$coupon_array) {
        $users=array();
        $users[]=$user_info['User']['username'];
        $users[]='webrndexperts@gmail.com';
        $email = new CakeEmail();
        $email->emailFormat('html');
        $email->template('coupon_generated_email', 'order');
        $email->viewVars(array('user_info' => $user_info,'coupon_array' => $coupon_array));
        $email->from(array('vinit.webrndexperts@gmail.com' => 'Local Grocry'));
        $email->to($users);
        $email->subject('Lojista - Coupon');
        $email->send();
        return true;       
    }

    public function superadmin_upload_image ($id,$type,$url_to_image) {
        
        $ch = curl_init($url_to_image);
        $file_name = basename($url_to_image);
        $complete_save_loc =  WWW_ROOT . 'img' . DS . 'product-images' . DS . $file_name;
        $fp = fopen($complete_save_loc, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
        $path_parts = pathinfo($file_name);
        $destination_app = WWW_ROOT . 'img' . DS . 'product-images' . DS . 'app-images'. DS . $file_name;
        $size=getimagesize($complete_save_loc);
        copy ( $complete_save_loc , $destination_app );
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

        

        if ( $type == 'featured' ) {
            $featured_image = $this->ProductGallery->find('first', array('conditions' => array('product_id' => $id, 'type' => $type ), 'fields' => array('id')));
            if (!empty($featured_image)) {
                $this->ProductGallery->id = $featured_image['ProductGallery']['id'];
                $this->ProductGallery->save( array('ProductGallery' => array('url' => $file_name )) );
            } else {
                $this->ProductGallery->create();
                $this->ProductGallery->save(
                        array(
                            'ProductGallery' => array(
                                'url' => $file_name,
                                'product_id' => $id,
                                'type' => $type
                            )
                        )
                );
            }
        } else {
            $this->ProductGallery->create();
            $this->ProductGallery->save(
                    array(
                        'ProductGallery' => array(
                            'url' => $file_name,
                            'product_id' => $id,
                            'type' => $type
                        )
                    )
            );
        }
    }   

    public function websetOrderStatus($order_id=null,$order_status=null,$user_id=null,$old_status=null,$out_of_stock_items=array()){
        $response = array();
         
        if ( $order_id == null || $order_status==null || $user_id==null || $old_status == null)  {
            $response = array(
                  array(
                    'status' => 0,
                    'message' => 'Invalid request!!!'
                  )
                );
            return $response;
        }
        
        $merchant_id = $this->get_merchant_id_by_user_id( $user_id );
       
        $this->Order->recursive = 0;
        $order_data = $this->Order->find(
            'first',
            array(
              'conditions' => array(
                'Order.id' => $order_id,
                'merchant_id' => $merchant_id,
                'Order.status' => $old_status
              )
            )
        );

        if ( empty($order_data) ) {
          $response = array(
              array(
                'status' => 0,
                'message' => 'Invalid request!'
              )
            );
        } else {
          $status_data = array();
          $out_of_item_name = array();

          /*Remove out of order items from order*/
          if ( $out_of_stock_items != "" ) {

            $old_total = $order_data['Order']['total'];
            $old_subtotal = $order_data['Order']['subtotal'];
            $old_sgst = $order_data['Order']['sgst'];
            $old_igst = $order_data['Order']['igst'];
            $old_cgst = $order_data['Order']['cgst'];
            $old_tax = $order_data['Order']['tax'];
            $old_item_count = $order_data['Order']['order_item_count'];

            $new_total = 0;
            $new_subtotal = 0;
            $new_sgst = 0;
            $new_igst = 0;
            $new_cgst = 0;
            $new_tax = 0;
            $new_item_count = 0;
          
            
            foreach ($out_of_stock_items as $key => $value) {
            
            /*Validate order item.*/
            $validate_order_item = $this->OrderItem->find( 'first', array(
                'conditions' => array( 'OrderItem.id' => $value, 'OrderItem.order_id' => $order_id, 'OrderItem.status' => 1 ),
                'fields' => array('OrderItem.title', 'OrderItem.id', 'OrderItem.subtotal', 'OrderItem.total', 'OrderItem.igst', 'OrderItem.sgst', 'OrderItem.cgst', 'OrderItem.product_id')
                ) 
            );
            
            if ( !empty( $validate_order_item ) ) {
                /*Save order item status and notes*/
                $this->OrderItem->id = $value;
                $this->OrderItem->save( array(
                  'OrderItem' => array(
                    'status' => 0,
                    'notes' => 'out of stock'
                  )
                ) );
                $out_of_item_name[] = $this->getNameByID( 'VendorProduct', $validate_order_item['OrderItem']['product_id'], 'title' ); 
                $new_total += $validate_order_item['OrderItem']['total'];
                $new_subtotal += $validate_order_item['OrderItem']['subtotal'];
                $new_sgst += $validate_order_item['OrderItem']['sgst'];
                $new_igst += $validate_order_item['OrderItem']['igst'];
                $new_cgst += $validate_order_item['OrderItem']['cgst'];
                $new_tax += $validate_order_item['OrderItem']['cgst'] + $validate_order_item['OrderItem']['sgst'] + $validate_order_item['OrderItem']['igst'];
                $new_item_count += 1;

                /*Update product stock*/
                $rejected_product_id = $validate_order_item['OrderItem']['product_id'];
                $product_meta = $this->VendorProductMeta->find( 'first', array(
                    'conditions' => array(
                        'VendorProductMeta.product_id' => $rejected_product_id,
                        'VendorProductMeta.meta_key' => '_stock'
                      )
                  ) );
                
                if ( !empty($product_meta) ) {
                  $this->VendorProductMeta->id = $product_meta['VendorProductMeta']['id'];
                  $this->VendorProductMeta->save( array(
                      'VendorProductMeta' => array(
                        'meta_value' => 0
                      )
                    )

                  );
                }

              }

            }

            if ( in_array( $order_data['Order']['order_type'], $this->online_payment_methods )  ) {
              $this->udpateUserWallet( $order_id, $order_data['Order']['user_id'], $new_total, 'Refund for out of stock items.' );
            }
            
            $status_data['Order']['total'] = $old_total - $new_total;
            $status_data['Order']['subtotal'] = $old_subtotal - $new_subtotal;
            $status_data['Order']['sgst'] = $old_sgst - $new_sgst;
            $status_data['Order']['igst'] = $old_igst - $new_igst;
            $status_data['Order']['cgst'] = $old_cgst - $new_cgst;
            $status_data['Order']['tax'] =  ($old_tax - $new_tax) < 0 ? 0 :$old_tax - $new_tax;
            // print_r($status_data);
          }

          // $status_data['Order']['id'] = $order_id;
          $status_data['Order']['status'] = $order_status;

          $this->Order->id = $order_id;
          if ( $this->Order->save( $status_data ) ) {
            $response = array(
              array(
                'status' => 1,
                'message' => 'Status updated.'
              )
            );

            /* Customer notification */
                $user_id = $order_data['Order']['user_id'];
                $user_data = $this->User->find('first',array(
                    'conditions'=>array('User.id'=>$user_id),
                    'fields' => array( 'User.fcm_token','User.first_name', 'User.last_name')
                    )
                );
                $device_id = $user_data['User']['fcm_token'];
                $title ="Order Status Updates" ;
          $notes = "";
          if ( !empty($out_of_item_name) ) {
            $notes = implode(',', $out_of_item_name).' is out of stock.';
          }
                $message ="You Order#{$order_id} status is changed to {$order_status}.".$notes;
                $this->push_notification_android($device_id,$message,$title);
                /** End customer notification */
          } else {
            $response = array(
              array(
                'status' => 0,
                'message' => 'Error while saving. Try later!'
              )
            );
          }
        }
        return $response;
    }

    protected function uploadImageFromUrl( $url ) {
        
        $this->autoRender = false;
        $response =array();
        if ( $url != "" ) {
            
            $ext = pathinfo($url, PATHINFO_EXTENSION);

            $file_name = $this->generateRandomToken(10).'-'.date('ymdhis').'.'.$ext;
            $response =array('file_name' => $file_name);
            $allowed_files = array( 'jpeg', 'jpg', 'png' );

            if ( !in_array($ext, $allowed_files) ) {
                return 0;
            }

            $data = file_get_contents($url);
            
            $destination = 'img' . DS . 'product-images' . DS . $file_name;
            $destination_app = 'img' . DS . 'product-images' . DS . 'app-images'. DS . $file_name;
            $destination_desktop = 'img' . DS . 'product-images' . DS . $file_name;
            
            $upload =file_put_contents($destination, $data);

            $this->resizeImage( $destination, $destination_app, 'mobile' );
            $this->resizeImage( $destination, $destination_desktop, 'desktop', true );
            
            return $file_name;
            
        }
    }

    protected function resizeImage( $source, $destination, $type, $do_unlink = false, $new_height = 0, $new_width = 0)
    {
        $path_parts = pathinfo($source);  
        $destination_app = WWW_ROOT . $destination;
        $size=getimagesize($source);
        copy ( $source , $destination_app );
        
        if ( $type == 'desktop' ) {
            $new_width = $new_height = 500;
        } else {
            $new_width = $new_height = 125;
        }
        
        $width=$size[0];
        $height=$size[1];

        if( $width > $height ) {
            $new_height = $height * ($new_height/$width);
        } else if( $width < $height ){
            $new_width = $width * ( $new_width / $height );
        } else if( $width == $height ) {
            $new_height = $new_width;    
        }
        
        
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

        if ( $do_unlink === true ) {
        //    unlink($source);
        }

        return 1;
    }
}
