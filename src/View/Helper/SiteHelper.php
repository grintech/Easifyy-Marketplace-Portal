<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry;
/**
 * Site helper
 */
class SiteHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function getAllBrands($limit =200,$id =null){
        $this->loadModel('Brands');
        $data =  $this->Brands->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
            'limit' => $limit
            ])->toArray();

       if($id) {
            if(isset($data[$id])) {
                return $data[$id];
            }
        } else {
            return $data;
        }
        
    }

   public function getAllProducts($id =null){
     $this->loadModel('Products');
     $data = $this->Products->find('all',['conditions' => ['product_type_id' => '1']])->toArray();
     if($id) {
            if(is_array($data)) {
               foreach ($data as $key => $value) {
                   if($value['id'] == $id){
                    return $value;
                   }
               }
            }
        } else {
            return $data;
        }
   }


   public function getMerchantProducts($id =null){
     $this->loadModel('MerchantProducts');
     $data = $this->MerchantProducts->find('all',[
            'conditions' => ['product_type_id' => '1','Merchants.user_id' =>$id],
            'contain' =>['Merchants']
        ])->toArray();
   
        return $data;
   }

   public function getMerchantProduct($id =null){
     $this->loadModel('MerchantProducts');
     $data = $this->MerchantProducts->find('all',[
            'conditions' => ['id' =>$id]
        ])->first();
   
        return $data;
   }


    /*public function getAllCategories($limit =200){
        $this->loadModel('Categories');
         $categories =  $this->Categories->ParentCategories->find('all', [ 
            'select' => ['id','name'],
            'contain' => [ 'ChildCategories'],'limit' => $limit]);  
         return $categories; 
         
          
    }*/
	public function getAllCategories($limit =200){
        $this->loadModel('Categories');
        //$this->loadModel('ProductCategories');
        //$this->loadModel('Products');

        $categories =  $this->Categories->ParentCategories->find('all', [ 
            'contain' => [ 'ChildCategories',
                'ChildCategories.ProductCategories.Products'=> [
                    'fields' => [
                        'Products.title',
                        'Products.menu_title',
                        'Products.slug',
                        'Products.delete_status',
                        'Products.status',
                    ]
                ],
            ],'limit' => $limit])->where(['delete_status !=' =>0,'user_id is' => NULL,])->order(['menuOrder' => 'ASC'])->enableAutoFields(false);  

         return $categories; 
    }

    public function getAllBusinessSupport(){
        $this->loadModel('BusinessSupport');
        $data =  $this->BusinessSupport->find('all')->all();
        //echo "<pre>".print_r($data);echo "</pre>";
        return $data ;
    }

    public function getAllProductStatuses($limit =200,$id =null){
        $this->loadModel('ProductStatuses');
        $data =  $this->ProductStatuses->find('list', [ 
                        'keyField' => 'id',
                        'valueField' => 'name',
                        'limit' => $limit
                    ])->toArray();
        if($id) {
            if(isset($data[$id])) {
                return $data[$id];
            }
        } else {
            return $data;
        }
    }

    public function getAllProductTypes($limit =200,$id =null){
        $this->loadModel('ProductTypes');
        $data =  $this->ProductTypes->find('list', [ 
                        'keyField' => 'id',
                        'valueField' => 'name',
                        'limit' => $limit
                    ])->where(['name !=' =>'variation'])->toArray();
        if($id) {
            if(isset($data[$id])) {
                return $data[$id];
            }
        } else {
            return $data;
        }
    }


    public function getAllOrderStatuses($limit =200,$id = null){
        $this->loadModel('OrderStatuses');
        $data =  $this->OrderStatuses->find('list', [ 
                        'keyField' => 'id',
                        'valueField' => 'name',
                        'limit' => $limit
                    ])->toArray();
         if($id) {
            if(isset($data[$id])) {
                return $data[$id];
            }
        } else {
            return $data;
        } 
    }


    public function getAllCities($limit =350, $id =null ){
        $this->loadModel('Cities');
        $data =  $this->Cities->find('list', [ 
                        'keyField' => 'id',
                        'valueField' => 'name',
                        'limit' => $limit
                    ])->toArray();
       if($id) {
            if(isset($data[$id])) {
                return $data[$id];
            }
        } else {
            return $data;
        }  
    }

    public function getAllStates($limit =200,$id =null ){
        $this->loadModel('States');
        $data =  $this->States->find('list', [ 
                        'keyField' => 'id',
                        'valueField' => 'name',
                        'limit' => $limit
                    ])->toArray();
        if($id) {
            if(isset($data[$id])) {
                return $data[$id];
            }
        } else {
            return $data;
        } 
    }

    public function getAllOrderNotification(){
        $this->loadModel('Orders');
        $data =  $this->Orders->find('list', [ 
            'keyField' => 'id',
            'valueField' => 'invoice_id',
        ])->where(['merchant_id =' => 0 ,'order_status_id' => 1 ,'superadmin_view' => 0])->order(['created' => 'DESC'])->toArray();
        return $data ;
    }

    public function getReviewNotification(){
        $this->loadModel('Reviews');
        $data =  $this->Reviews->find('list', [ 
            'keyField' => 'id',
            'valueField' => 'order_id',
        ])->where(['superadmin_view' => 0,'reviewer_type'=>'psp'])->order(['created' => 'DESC'])->toArray();
        return $data ;
    }

    public function getOrderNotifications(){
        $this->loadModel('Notifications');
        $data =  $this->Notifications->find('all', [ 
            'keyField' => 'type',
            'valueField' => 'message',
            'order_id' => 'order_id',
        ])->where(['viewed_status =' => 0 ])->order(['created' => 'DESC'])->all();
        //echo "<pre>".print_r($data);echo "</pre>";
        return $data ;
    }
    public function getPSPNotification($userID){
        $this->loadModel('Users');
        $this->loadModel('Notifications');
        $data =  $this->Notifications->find('all', [ 
            'keyField' => 'type',
            'valueField' => 'message',
            'order_id' => 'order_id',
        ])->where(['viewed_status =' => 0,'user_id'=> $userID])->order(['created' => 'DESC'])->all();

        /*$data =  $this->Users->find('all' , 
        [   
            'contain' => [ 'orders',
                'orders.Notifications'=> [
                    'fields' => [
                        'Notifications.user_id',
                        'Notifications.order_id',
                        'Notifications.type',
                        'Notifications.message',
                        'Notifications.viewed_status',
                    ]
                ],
            ]
        ])->where(['Users.id' =>$userID])->all();  
        //echo "<pre>";print_r($data);echo "</pre>";
        //die();*/
        return $data ;
    }
    public function getUserOrderNotifications($userID){
        $this->loadModel('Users');
        $this->loadModel('Notifications');
        $data =  $this->Users->find('all' , 
            [   
                'contain' => [ 'orders',
                    'orders.Notifications'=> [
                        'fields' => [
                            'Notifications.user_id',
                            'Notifications.order_id',
                            'Notifications.type',
                            'Notifications.message',
                            'Notifications.viewed_status',
                        ]
                    ],
                ],
                'conditions'=>[
                    'Users.id' =>$userID
                ]   
            ])->where(['Users.id' =>$userID])->order(['created' => 'DESC'])->all();  
        //echo "<pre>";print_r($data);echo "</pre>";
        //die();
        return $data ;
    }
    public function getPspOrderNotification($id){

        $this->loadModel('Merchants');
        $merchant = $this->Merchants->find('all')
        ->where(['Merchants.user_id' => $id])
        ->select(['id'])
        ->first();
        if( $merchant ){
            $pspId= $merchant->id;
        }
        $this->loadModel('Orders');
        $data =  $this->Orders->find('list', [ 
            'keyField' => 'id',
            'valueField' => 'invoice_id',
        ])->where(['merchant_id =' => $pspId ,'order_status_id' => 2 ,'psp_view' => 0])->order(['created' => 'DESC'])->toArray();
        return $data ;
    }

    public function getUserOrderNotification($id){
        //if ($this->Session->read('Auth.User')){
         //   $userData=$this->Session->read('Auth.User');
            //echo "<pre>";print_r($this->request->getData('id'));echo "  <pre>";
        //    die($userData);
        //}
        $this->loadModel('Orders');
        $data =  $this->Orders->find('list', [ 
            'keyField' => 'id',
            'valueField' => 'invoice_id',
        ])->where(['user_id =' => $id,'merchant_id =' => 0 ,'order_status_id' => 1 ,'user_view' => 0])->order(['created' => 'DESC'])->toArray();
        return $data ;
    }

    public function getAllProductUnits($limit =200, $id =null ){
        $this->loadModel('ProductUnits');
        $data =  $this->ProductUnits->find('list', [ 
                        'keyField' => 'id',
                        'valueField' => 'name',
                        'limit' => $limit
                    ])->toArray();
        if($id) {
            if(isset($data[$id])) {
                return $data[$id];
            }
        } else {
            return $data;
        } 
    }

   
    
    public function states($id = null) {
        $states = array(
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'DC' => 'District Of Columbia',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming',
            'AE' => 'AE',
            'AA' => 'AA',
            'AP' => 'AP'
        );
        if($id) {
            if(isset($states[$id])) {
                return $states[$id];
            }
        } else {
            return $states;
        }
    }
	
	public function loadModel($modelClass) {
        $this->{$modelClass} = TableRegistry::get($modelClass);
        if (!$this->{$modelClass}) {
            throw new MissingModelException($modelClass);
        }
        return $this->{$modelClass};
    }

    public function get_merchant_name($merchant_id=null) {
        $this->loadModel('Merchants');
         $merchant = $this->Merchants->find()->where(['id' => $merchant_id])->first();
         if($merchant){
            return ucwords($merchant['store_name'])." ".ucwords($merchant['last_name']);
         }else{
            return "-";
         }
    }

    public function get_merchant_id($user_id=null) {
        $this->loadModel('Merchants');
         $merchant = $this->Merchants->find()->where(['user_id' => $user_id])->first();
         if($merchant){
            return $merchant['id'];
         }else{
            return "-";
         }
    }
    public function get_user_name($user_id=null) {
        $this->loadModel('Users');
         $merchant = $this->Users->find()->where(['id' => $user_id])->first();
         if($merchant){
            return ucwords($merchant['store_name'])." ".ucwords($merchant['last_name']);
         }else{
            return "-";
         }
    }
    public function get_user_profile_status($user_id=null) {
        $this->loadModel('Users');
         $user = $this->Users->find()->where(['id' => $user_id])->first();
         if($user){
            return $user['user_profile_updated'];
         }else{
            return "-";
         }
    }

    public function get_footer_categories(){
        $this->loadModel('Categories');
            
        $ourServiceCategory = $this->Categories->find('all', [
                'conditions' => [
                    'Categories.status' => 1,
                    'Categories.delete_status' => 1,
                    'Categories.show_in_footer' => 1
                ],
                'fields' => [
                    'slug','name'
                ]
        ]);

        $ourServiceCategory->disableHydration();
        
        $ourServiceCategory = $ourServiceCategory->all();

        return $ourServiceCategory;
    }

}
