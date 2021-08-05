<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Shop Controller
 *
 *
 * @method \App\Model\Entity\Shop[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShopController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function clear() {
    
        $this->Cart->clear();
        $this->Session->delete('CouponCode');
        $current_user = $this->Session->read('current_user');
        $id = $current_user['User']['id'];
        $options = array('CartSession.user_id' => $id);
        if (empty($id)) {
            $id = $this->Session->id();
            $options = array('CartSession.session_id' => $id);
        }
        $shop = $this->CartSession->deleteAll($options);
       /*  $this->Session->setFlash(
                'All item(s) removed from your shopping cart.',
                'default', array('class' => 'message bg-success text-white text-center p-2')
        ); */
        return $this->redirect(['controller' => 'site', 'action' => 'index']);
    }

    public function index($slug = null, $cat = null) { 
        
        $this->layout = 'customer'; 
        $this->set('isAjax', false);
        //print_r($merchant_slug); die('here');
        //$id = base64_decode($id);
        $number =12;
        $this->Merchant->recursive = -1;
        $merchant = $this->Merchant->find( 'first', array(
                'conditions' => array(
                    'slug' => $slug,
                ), 
                'fields' => array( 'Merchant.user_id', 'Merchant.id', 'Merchant.store_name', 'Merchant.status', 'Merchant.slug', 'Merchant.store_pic')
            ) 
        );

        
        if ( empty($merchant) ) {
            $this->Session->setFlash(
                    'ERROR:Invalid Access!',
                    'default', array('class' => 'message bg-danger text-white text-center p-2')
            );
            $this->redirect($this->referer());
        }
        
        $merchant_id = $id = $merchant['Merchant']['id'];
        if ($this->Session->check('Shop.Merchant')) {
            $merchant_info = $this->Session->read('Shop.Merchant');
            if (!($merchant_info['id'] == $id)) {
                $this->Session->write('Shop.Merchant', $merchant['Merchant']);
                $this->Session->delete('Shop.OrderItem');
                $this->Session->delete('Shop.Order');
                $this->Session->delete('CouponCode');
                $current_user = $this->Session->read('current_user');
                $id = $current_user['User']['id'];
                $options = array('CartSession.user_id' => $id);
                if (empty($id)) {
                    $id = $this->Session->id();
                    $options = array('CartSession.session_id' => $id);
                }
                
                if($this->CartSession->deleteAll($options)){
                    return $this->redirect(['controller' => 'Shop', 'action' => 'index',$slug]);
                }
            }
            // $this->Session->delete('Shop.OrderItem.' . $id);
        } else {
            $this->Session->write('Shop.Merchant', $merchant['Merchant']);
        }

        if (empty($merchant)) {
            $this->Session->setFlash(
                    'ERROR:Invalid Access!.',
                    'default', array('class' => 'message bg-danger text-white text-center p-2')
            );
            $this->redirect($this->referer());
        }
        $id = $merchant['Merchant']['user_id'];
        $merchant_id = $merchant['Merchant']['id'];
        $user_id=$this->get_current_user_id();
        $page_title = $merchant['Merchant']['store_name'];

        $deliver_time = $this->get_merchant_meta( $merchant_id, 'deliver_time', true );
        $payment_method = $this->get_merchant_meta( $merchant_id, 'payment_method', true );
        $minimum_order = $this->get_merchant_meta( $merchant_id, 'minimum_order', true );
        $close_time = $this->get_merchant_meta( $merchant_id, 'close_time', true );
        $open_time = $this->get_merchant_meta( $merchant_id, 'open_time', true );
        $deliver_radius = $this->get_merchant_meta( $merchant_id, 'deliver_radius', true );
        $store_name = $merchant['Merchant']['store_name'];

        //$this->set('page_breadcrumb', $store_name);
        $this->set('store_name',  $store_name);
        /* Defined in app controller */
        $all_categories = $this->_get_vendor_categories($merchant_id);
        
        $vendor_categories = $all_categories['categories'];
        $vendor_brands = $all_categories['brands'];
        $conditions = array();
        if(($cat != null) && ($keyword = $this->request->query('keyword')) ){
            if(!is_numeric($cat)){
                $category = $this->Category->findBy_name($cat);
                $this->set('category_name',  $cat);
                $cat_id = $category['Category']['id'];
                
                if ( is_array( $cat_id ) ) {
                    $conditions['ProductCategory.category_id'] = "IN (".implode(',', $cat_id).")" ;
                }else {
                    $conditions['ProductCategory.category_id'] = $cat_id;
                }
            }

        
        $conditions['VendorProduct.title LIKE'] = "%$keyword%";
        } elseif ($cat != null) {

            if(!is_numeric($cat)){
                $category = $this->Category->findBy_name($cat);
                $this->set('category_name',  $cat);
                $cat_id = $category['Category']['id'];
                
                if ( is_array( $cat_id ) ) {
                    $conditions['ProductCategory.category_id'] = "IN (".implode(',', $cat_id).")" ;
                }else {
                    $conditions['ProductCategory.category_id'] = $cat_id;
                }
            }

        } elseif($keyword = $this->request->query('keyword')){
                
         $conditions['VendorProduct.title LIKE'] = "%$keyword%";
        } else {
            //$products = $this->_get_vendor_products($merchant_id,10);
        }
        //$this->VendorProduct->recursive = 1;
        $this->Paginator = $this->Components->load('Paginator');
        
        $this->Paginator->settings = [
  
            'VendorProduct' => [
                'recursive' => 1,
                'contain' => [
                    'ProductGallery',
                    'VendorProductMeta',
                    'ProductVariation'
                ],
                'limit' => 20,
                //'maxLimit' => 10,
                'paramType' => 'querystring',
                'joins' =>[
                        [
                            'table' => 'product_categories',
                            'alias' => 'ProductCategory',
                            'type' => 'inner',
                            'conditions' =>[
                                'ProductCategory.product_id = VendorProduct.product_id',

                            ]
                        ],
                        [
                            'table' => 'vendor_product_metas',
                            'alias' => 'VendorProductMeta',
                            'type' => 'left',
                            'conditions' =>[
                                'VendorProductMeta.product_id = VendorProduct.id',

                            ]
                        ]
                ],
                'conditions' => [
                    'VendorProduct.status' => 'Publish',
                     'VendorProduct.parent_id' => null, 
                     'VendorProduct.merchant_id' => $merchant_id ,
                     //'VendorProductMeta.meta_key' =>'_stock',
                     //'VendorProductMeta.meta_value' =>'<> 0',
                     $conditions
                ],
                'order' => [
                    'VendorProduct.id' => 'Desc'
                ],
                'group' => ['VendorProduct.id'] 
               
            ]
        ];
    

         $products = $this->Paginator->paginate('VendorProduct');
         // echo '<pre>';
         // print_r($conditions);
         // echo '</pre>';

        
        //print_r($products);
        $Merchant_Offers = $this->CouponCode->find('all',array('conditions'=>array('merchant_id'=>$merchant_id)));
        //Merchant reviews
        $merchant_review = $this->Reviews->find('all',array(
                        'conditions'=>array('merchant_id'=>$merchant_id,'approved'=>1),
                        'order'=>array('Reviews.created'=>'desc'),
                        )
                    );
        $current_customer_review = $this->Reviews->find('first',array('conditions'=>array('user_id'=>$user_id,'merchant_id'=>$merchant_id)));
        $avg_rating = $this->Reviews->find('all',array( 'fields' => array( 'AVG(rating)' ) , 'conditions'=>array( 'merchant_id'=>$merchant_id)));
        $star_rating = $avg_rating[0][0]['AVG(rating)'];                
        $merchant_id;       
        $estimate_delivery_time= $this->admin_order_delivery($merchant_id);  

        $this->set(compact('estimate_delivery_time','user_id','current_customer_review','merchant_review','products', 'merchant', 'vendor_categories', 'vendor_brands','Merchant_Offers', 'deliver_time', 'payment_method', 'minimum_order', 'close_time', 'open_time', 'deliver_radius', 'page_title', 'star_rating'));
        $this->set('title_for_layout', Configure::read('Settings.SHOP_TITLE'));
        
    }


    
    public function ajax_product_listing($store_name= null, $category_name= null ,$page=1){
        if($this->request->is('ajax')) {
                
                $this->layout = 'ajax';
                $this->view = 'products_listing';
                $limit = 10; 
                $conditions = array();
                $merchant = $this->Merchant->find( 'first', array(
                'conditions' => array(
                    'slug' => $store_name,
                ), 
                'fields' => array( 'Merchant.user_id', 'Merchant.id', 'Merchant.store_name', 'Merchant.status', 'Merchant.slug', 'Merchant.store_pic')
            ) 
            );
                $merchant_id = $merchant['Merchant']['id'];
                
                if(($category_name != null)){
                    if(!is_numeric($category_name)){
                    $category = $this->Category->findBy_name($category_name);
                    $cat_id = $category['Category']['id'];
                    if ( is_array( $cat_id ) ) {
                        $conditions['ProductCategory.category_id'] = "IN (".implode(',', $cat_id).")" ;
                    }else {
                        $conditions['ProductCategory.category_id'] = $cat_id;
                    }
                    }else{
                        $page=$category_name;
                    }
                }
                if($keyword = $this->request->query('keyword')){
                    
                    $conditions[] = "VendorProduct.title LIKE '%$keyword%'";
                }
                
                $this->Product->recursive = -1;
                $products = $this->VendorProduct->find( 'all', array(
                            'joins' => array(
                            array(
                                'table' => 'product_categories',
                                'alias' => 'ProductCategory',
                                'type' => 'inner',
                                'conditions' => array(
                                    'ProductCategory.product_id = VendorProduct.product_id',
                                )
                            )
                        ),
                        'conditions' => array(
                            'VendorProduct.parent_id' => null, 
                            'VendorProduct.merchant_id' => $merchant_id, 
                            'VendorProduct.status' => 'Publish',
                            $conditions,
                        ),
                        'group' => array('VendorProduct.id'), 
                        'order' => array(
                        'VendorProduct.id' => 'Desc'
                        ),
                        'limit' => $limit,
                        'page' => $page,
                    )
                 );
                }
                
                //$data = $this->Products->list_products($page, $limit);
                //print_r($products);
                $this->set('products_list',$products); 
                $this->set('isAjax', $this->RequestHandler->isAjax());
                
    }


    public function add() {
        $this->set('page_breadcrumb', 'Add');
        
        if ($this->request->is('post')) {
            $id = $this->request->data['Product']['id'];
            $this->VendorProduct->recursive = -1;
            $find_product = $this->VendorProduct->find( 'first', array(
                    'conditions' => array( 'id' => $id ),
                    'fields' => array( 'id', 'parent_id', 'product_type' )
                ) 
            );
            
            if ( empty( $find_product ) ) {
                $this->Session->setFlash(
                    "Oops! Something went wrong.",
                    'default', array('class' => 'bg-danger text-white text-center p-2')
                );
                $this->redirect($this->referer());
            }

            $product_id = $id;
            if ( $find_product['VendorProduct']['product_type'] == 'variation' ) {
                $product_id = $find_product['VendorProduct']['parent_id']; 
            }


            $_hsn_code = $this->get_product_meta( $product_id, '_hsn_code', true );                                   
            $_is_taxable = $this->get_product_meta( $product_id, '_is_taxable', true );
            $_stock = $this->get_product_meta( $id, '_stock', true );

            if ( $_stock < 1 || $_stock < $this->request->data['Product']['quantity'] ) {
                $this->Session->setFlash(
                    "Product has $_stock left in stock.",
                    'default', array('class' => 'bg-danger text-white text-center p-2')
                );
                $this->redirect($this->referer());
            }
            
            $_tax_inclusive = 0;
            $_cgst = 0;
            $_sgst = 0;
            $_igst = 0;
            
            if ( $_is_taxable == 'Yes') {
                $_tax_inclusive = $this->get_product_meta( $product_id, '_tax_inclusive', true );
                $_cgst = $this->get_product_meta( $product_id, '_cgst', true );
                $_sgst = $this->get_product_meta( $product_id, '_sgst', true );
                $_igst = $this->get_product_meta( $product_id, '_igst', true );
            } else {
                $_tax_inclusive = 'Yes';
                $_cgst = 0;
                $_sgst = 0;
                $_igst = 0;
            }

            $tax_details = array(
                '_hsn_code' => $_hsn_code,
                '_is_taxable'=> $_is_taxable,
                '_tax_inclusive'=> $_tax_inclusive,
                '_cgst'=> $_cgst,
                '_sgst'=> $_sgst,
                '_igst'=> $_igst,
            );
            
            $quantity = isset( $this->request->data['Product']['quantity'] ) ? $this->request->data['Product']['quantity'] : 1;

            

            $productmodId = isset($this->request->data['mods']) ? $this->request->data['mods'] : null;
            $product = $this->Cart->add($id, $quantity, $productmodId,$tax_details);
        }
        if (!empty($product)) {
            /* $this->Session->setFlash(
                        'Product added to your shopping cart. <a href="localstore/Shop/cart"> View Cart</a>', 
                        'default', array('class' => 'bg-success text-white text-center p-2')
                    ); */
                    $this->Session->setFlash(
                        'Product added to your shopping cart.', 
                        'session_flash_link'
                             
                    );
        } else {
            $this->Session->setFlash(
                    'Unable to add this product to your shopping cart.',
                    'default', array('class' => 'bg-danger text-white text-center p-2')
            );
        }
        $this->redirect($this->referer());
    }

public function add_to_cart() {
        
         $this->autoRender = false;
         $response = array('msg' => "", 'class' =>'', 'status'=> 0, 'product'=> '');
        if ($this->request->is('ajax')) {
            
            
            $id = $this->request->data['id'];
            $this->VendorProduct->recursive = -1;
            $find_product = $this->VendorProduct->find( 'first', array(
                    'conditions' => array( 'id' => $id ),
                    'fields' => array( 'id', 'parent_id', 'product_type' )
                ) 
            );
            
            if ( empty( $find_product ) ) {
                     $response = array('msg' =>"Oops! Something went wrong.",'class' =>'bg-danger text-white text-center p-2', 'status'=> 0, 'product'=> '');
                /* $this->Session->setFlash(
                    "Oops! Something went wrong.",
                    'default', array('class' => 'bg-danger text-white text-center p-2')
                ); */
                //$this->redirect($this->referer());
            }

            $product_id = $id;
            if ( $find_product['VendorProduct']['product_type'] == 'variation' ) {
                $product_id = $find_product['VendorProduct']['parent_id']; 
            }


            $_hsn_code = $this->get_product_meta( $product_id, '_hsn_code', true );                                   
            $_is_taxable = $this->get_product_meta( $product_id, '_is_taxable', true );
            $_stock = $this->get_product_meta( $id, '_stock', true );

            if ( $_stock < 1 || $_stock < $this->request->data['quantity'] ) {
                /* $this->Session->setFlash(
                    "Product has $_stock left in stock.",
                    'default', array('class' => 'bg-danger text-white text-center p-2')
                ); */
                //$this->redirect($this->referer());
            $response = array('msg' =>"Product has $_stock left in stock.",'class' =>'bg-danger text-white text-center p-2', 'status'=> 0, 'product'=> '');
            }
            
            $_tax_inclusive = 0;
            $_cgst = 0;
            $_sgst = 0;
            $_igst = 0;
            
            if ( $_is_taxable == 'Yes') {
                $_tax_inclusive = $this->get_product_meta( $product_id, '_tax_inclusive', true );
                $_cgst = $this->get_product_meta( $product_id, '_cgst', true );
                $_sgst = $this->get_product_meta( $product_id, '_sgst', true );
                $_igst = $this->get_product_meta( $product_id, '_igst', true );
            } else {
                $_tax_inclusive = 'Yes';
                $_cgst = 0;
                $_sgst = 0;
                $_igst = 0;
            }

            $tax_details = array(
                '_hsn_code' => $_hsn_code,
                '_is_taxable'=> $_is_taxable,
                '_tax_inclusive'=> $_tax_inclusive,
                '_cgst'=> $_cgst,
                '_sgst'=> $_sgst,
                '_igst'=> $_igst,
            );
            
            $quantity = isset( $this->request->data['quantity'] ) ? $this->request->data['quantity'] : 1;

            

            $productmodId = isset($this->request->data['mods']) ? $this->request->data['mods'] : null;
            $product = $this->Cart->add($id, $quantity, $productmodId,$tax_details);
            $user_id = $this->get_current_user_id();
        
                $options = array('conditions' => array('user_id' => $user_id));
                if (empty($user_id)) {
                    $id = $this->Session->id();
                    $options = array('conditions' => array('session_id' => $id));
                }
                $cart = $this->CartSession->find('all', $options);
                $cart_count = count($cart);
                 if (!empty($product)) {
                
                    $response = array('msg' =>"Product added to your shopping cart. <a href='". BASE_URL ."Shop/cart'> View Cart</a>",'class' =>'bg-success text-white text-center p-2', 'status'=> 0, 'product'=> $product,'items_count' => $cart_count);
            } else {
                $this->Session->setFlash(
                        'Unable to add this product to your shopping cart.',
                        'default', array('class' => 'bg-danger text-white text-center p-2')
                );
                $response = array('msg' =>"Unable to add this product to your shopping cart.",'class' =>'bg-danger text-white text-center p-2', 'status'=> 0, 'product'=> $product);
            } 
              echo json_encode($response);
              exit(0);
        }
        
        //$this->redirect($this->referer());
    }

    public function itemupdate() {

        if ($this->request->is('ajax')) {

            $id = $this->request->data['id'];

            $quantity = isset($this->request->data['quantity']) ? $this->request->data['quantity'] : null;

            if (isset($this->request->data['mods']) && ($this->request->data['mods'] > 0)) {
                $productmodId = $this->request->data['mods'];
            } else {
                $productmodId = null;
            }
            $product = $this->Cart->add($id, $quantity, $productmodId);
        }
        $cart = $this->Session->read('Shop');
        echo json_encode($cart);
        $this->autoRender = false;
    }

//////////////////////////////////////////////////

    public function update() {
        $this->Cart->update($this->request->data['Product']['id'], 1);
    }

//////////////////////////////////////////////////

    public function cartremoveproduct($id = null) {
        
        $this->autoRender = false;

        $id = $_POST['id'];
        $product = $this->CartSession->Delete($id);
        $this->Cart->cart();
        
        if (!empty($product)) {
            $this->Session->setFlash(
                    'Product removed from your shopping cart.',
                    'default', array('class' => 'message bg-success text-white text-center p-2')
            );
        }
        
        return true;
    }

//////////////////////////////////////////////////

    public function cartupdate() {
        if ($this->request->is('post')) {
            foreach ($this->request->data['Product'] as $key => $value) {
                $this->CartSession->id = $key;
                if ($value == 0) {
                    $this->CartSession->Delete($key);
                } else {
                    $data = $this->CartSession->read();
                    $subtotal = $data['CartSession']['subtotal'] * $value;
                    $this->CartSession->saveField('subtotal', $subtotal);
                    $this->CartSession->saveField('quantity', $value);
                    $this->Session->write('order_item_count', $value);
                }
            }
            $this->Cart->cart();
            $this->Session->delete('CouponCode');
            $this->Session->setFlash(
                    'Shopping Cart is updated.',
                    'default', array('class' => 'message bg-success text-white text-center p-2')
            );
        }
        return $this->redirect(['action' => 'cart']);
    }

//////////////////////////////////////////////////

    public function cart() {
        $this->set('page_breadcrumb', 'Cart');
        $this->layout = 'customer';
        $shop = $this->Session->read('Shop');
       
        $id = $this->get_current_user_id();
        $conditions = array('user_id' => $id);
        $options = array('conditions' => array('user_id' => $id));
        if (empty($id)) {
            $id = $this->Session->id();
            $options = array('conditions' => array('session_id' => $id));
            $conditions = array('CartSession.session_id' => $id);
        }
        $Cart = $this->CartSession->find('all', $options);
        
        
        $merchant='';
        if($Cart){
            $store_user_id = $Cart[0]['CartSession']['merchant_id'];
            $merchant = $this->Merchant->findByid($store_user_id);
            $merchant_id=$merchant['Merchant']['id'];
            $merchant_meta=$this->MerchantMeta->find('all',array('conditions'=>array('merchant_id'=>$merchant_id)));
        }
         $coupon = $this->Session->read('CouponCode');
         $this->Product->recursive = -1;
         $products = $this->VendorProduct->find( 'all', array(
                    'contain' => array('VendorProductMeta','ProductVariation'),
                    'joins' => array(
                            array(
                                'table' => 'cart_session',
                                'alias' => 'CartSession',
                                'type' => 'inner',
                                'conditions' => array(
                                'CartSession.product_id = VendorProduct.id',
                                )
                            )
                        ),
                    'conditions' => array(
                       // 'VendorProduct.merchant_id' => $merchant_id, 
                        'VendorProduct.status' => 'Publish',
                        $conditions
                    ),
                )
             );
        $this->set(compact('shop', 'products','merchant','merchant_meta','coupon', 'Cart', 'store_user_id'));

    }

//////////////////////////////////////////////////
public function _getMerchant(){
        $merchant = null;
        $user_id = $this->get_current_user_id();
        $options = array('conditions' => array('user_id' => $user_id));
        $cart_session = $this->CartSession->find('all', $options);
        
        if($cart_session){
            $merchant_id = $cart_session[0]['CartSession']['merchant_id'];
            $merchant = $this->Merchant->findByid($merchant_id);
            if(!empty($merchant)){
                return $merchant;
            }
        }
    return $merchant;   
    
}

    public function address() {
        $this->set('page_breadcrumb', 'Address');
        $merchant='';
        $deliver_radius='';
        $this->layout = 'customer';
        $shop = $this->Session->read('Shop');
        $user_id = $this->get_current_user_id();
        $merchant = $this->_getMerchant();
        $merchant_id =$merchant['Merchant']['id'];
        
        $merchant_long=$merchant['Merchant']['longitude'];
        $merchant_lat=$merchant['Merchant']['latitude'];
        
        
        //$merchant_id=$shop['Merchant']['id'];
        $merchant_meta=$this->MerchantMeta->find('all',array('conditions'=>array('merchant_id'=>$merchant_id)));
        
        foreach($merchant_meta as $meta_key => $meta_value ) {
            if($meta_value['MerchantMeta']['meta_key']=='deliver_radius') {
                $deliver_radius =$meta_value['MerchantMeta']['meta_value'];
            }
        }
        
        $customer_addresses = $this->Customer->find('all', array('contain' => ['CityMaster'],'conditions' => array('user_id' => $user_id)));
        foreach($customer_addresses as $add_key => $add_value ) {
            $customer_long= $add_value['Customer']['longitude'];
            $customer_lat= $add_value['Customer']['latitude'];
            $distance=$this->distance($merchant_lat,$merchant_long,$customer_lat,$customer_long);
            $distance=json_decode($distance,true);
            if($distance['status']==1) {
                $distance_=$distance['distance'];
                $deliver_radius;
                
                if($deliver_radius > round($distance_) ){
                    $customer_addresses[$add_key]['Customer']['deliverable']='yes';
                } else {
                    //$customer_addresses[$add_key]['Customer']['deliverable']='no';
                    $customer_addresses[$add_key]['Customer']['deliverable']='yes';
                }
            } else {
                //$customer_addresses[$add_key]['Customer']['deliverable']='no';
                $customer_addresses[$add_key]['Customer']['deliverable']='yes';
            }
            
        }
       
            $order = array('yes','no');
            usort($customer_addresses, function ($a, $b) use ($order) {
                $pos_a = array_search($a['Customer']['deliverable'], $order);
                $pos_b = array_search($b['Customer']['deliverable'], $order);
                return $pos_a - $pos_b;
            });
        $current_user = $this->Session->read('current_user');
        
        //Update Coupon Meta Usage Count
            $coupon = $this->Session->read('CouponCode');
            $data = $coupon['coupon_info'];
            $couponCode = substr($data, strpos($data, "-") + 1);     
            $couponCode = substr($couponCode, strpos($couponCode, "/") + 1);
            $couponCode= strip_tags($couponCode);
            $couponCode=trim($couponCode," ");
            $findCouponMeta = $this->CouponMeta->find('first', array(
                        'conditions' => array(
                            'user_id' => $user_id,
                            'coupon_code' => $couponCode,
                        )
                    ));
            if($findCouponMeta) {
                    $this->CouponMeta->id=$findCouponMeta['CouponMeta']['id'];
                    $this->CouponMeta->saveField('usage_count',$findCouponMeta['CouponMeta']['usage_count']+1);    
            }else{
                if($couponCode){
                    $CouponMeta=array();
                    $CouponMeta['CouponMeta']['user_id']=$user_id;
                    $CouponMeta['CouponMeta']['coupon_code']=$couponCode;
                    $CouponMeta['CouponMeta']['usage_count']=1;
                    $this->CouponMeta->save($CouponMeta);  
                }     
            }
        // End
        $options = array('conditions' => array('user_id' => $user_id));
        $Cart = $this->CartSession->find('all', $options);

        /*
         *
         * Find Already Registerd Customer Address
         */
        $Customer_Address = $this->Customer->find('first', array(
            'contain' => [],
            'conditions' => array(
                'user_id' => $user_id,
                'default_address' => '1'
            )
        ));
         
        $state_array = $this->CityMaster->find('all', array('fields' => array('statecode', 'state'), 'order' => array('state')));
        $state = Hash::combine($state_array, '{n}.CityMaster.statecode', '{n}.CityMaster.state');
        $city = '';
        $Customer_location = $this->Session->read('user_location');
        $coupon = $this->Session->read('CouponCode');
        
        $this->set(compact('merchant_meta','current_user', 'Customer_location', 'Customer_Address', 'state', 'city', 'Cart', 'coupon', 'customer_addresses'));
         
        if ($this->request->is('post')) {
            if (!empty($this->request->data['Order']) ) {
                $order = $this->request->data['Order'];
                //pr($order);
               
                $this->Session->write('Shop.Order', $shop['Order']);
                $this->redirect(['action' => 'review']);
                die('Here');
            } else {
                $this->Session->setFlash(
                        'Can not checkout without a valid address.',
                        'default', array('class' => 'message bg-danger text-white text-center p-2')
                );
            }
        }
        if (!empty($shop['Order'])) {
            $this->request->data['Order'] = $shop['Order'];
        }
     
    }

//////////////////////////////////////////////////

    public function review() {
        $this->set('page_breadcrumb', 'Review Order');

        $this->layout = 'customer';
        $shop = $this->Session->read('Shop');
        $user_id = $this->get_current_user_id();
        $merchant = $this->_getMerchant();
        $customer_info=$this->Customer->findByUserId($this->get_current_user_id());
        $merchant_id=$merchant['Merchant']['id'];
        $merchant_meta=$this->MerchantMeta->find('all',
                    array('conditions'=>array('merchant_id'=>$merchant_id)));
        $coupon = $this->Session->read('CouponCode');   
        $estimate_del_time=$this->estimate_delivery_time($merchant_id); 
        //Read Current User
        $current_user = $this->Session->read('current_user');
        $id = $current_user['User']['id'];
        $options = array('conditions' => array('user_id' => $id));
        $Cart = $this->CartSession->find('all', $options);
         
        
        
        
        if (empty($shop)) {
            return $this->redirect('/');
        }
        /*
        *   Place Order Code
        */
        if ($this->request->is('post')) {
            //Load Model Order
            $this->loadModel('Order');
            // print_r($coupon);
            // die;
            $this->Order->set($this->request->data);
            $taxes = $this->order_tax_calculate($Cart);
            foreach ($merchant_meta as $merchant_key => $merchant_value) {
                if($merchant_value['MerchantMeta']['meta_key']=='delivery_charges') {
                    $delivery_charges=$merchant_value['MerchantMeta']['meta_value'];
                }
                elseif($merchant_value['MerchantMeta']['meta_key']=='minimum_order') {
                    $minimum_order=$merchant_value['MerchantMeta']['meta_value'];   
                } 
                elseif($merchant_value['MerchantMeta']['meta_key']=='payment_method') {
                  $payment_method=$merchant_value['MerchantMeta']['meta_value'];     
                }
            } 
            
            if ($this->Order->validates()) {    
               
                $order['Order'] = $shop['Order'];
                $order['Order']['order_mode']='online';
                $order['Order']['customer_id']=$customer_info['Customer']['id'];
                $loop_count=$item_subtotal = $cart_subtotal = $cart_quantity = 0;
                
                //Get Orderitem Data
                foreach ($Cart as $key => $value) {
                    $cart_quantity = $cart_quantity + $value['CartSession']['quantity'];
                    $item_subtotal = $value['CartSession']['price'] * $value['CartSession']['quantity'];
                    $order['OrderItem'][] = $value['CartSession'];
                    foreach ($value as $OrderItem_key => $OrderItem_value) {
                        
                        $tax_details=json_decode($OrderItem_value['tax_details'],true);
                        // Condition for tax caluclations
                            #If product is taxable
                            if($tax_details['_is_taxable']=='Yes'){
                                # If tax is already added in the product price
                                if($tax_details['_tax_inclusive']=='Yes') {
                                // Formula: Price * ( Tax / (Tax+100) )
                                    $cgst=round($item_subtotal * ($tax_details['_cgst'] /($tax_details['_cgst']+100)),2); 
                                    $sgst=round($item_subtotal * ($tax_details['_sgst'] /($tax_details['_sgst']+100)),2); 
                                    $igst=round($item_subtotal * ($tax_details['_igst'] /($tax_details['_igst']+100)),2); 
                                # If tax is not already added in the product price    
                                } else {
                                //Formula: Price * ( ( Tax + 100) / 100 )    
                                    $cgst=round($item_subtotal *(($tax_details['_cgst']+100)/100),2); 
                                    $cgst=$cgst-$item_subtotal;
                                    $sgst=round($item_subtotal *(($tax_details['_sgst']+100)/100),2); 
                                    $sgst=$sgst-$item_subtotal;
                                    $igst=round($item_subtotal *(($tax_details['_igst']+100)/100),2); 
                                    $igst=$igst-$item_subtotal;
                                }
                            #If product is not taxable
                            } else {
                                $cgst=$igst=$sgst=0;
                            }
                        // End
                    }

                    $order['OrderItem'][$loop_count]['cgst']=$cgst;
                    $order['OrderItem'][$loop_count]['sgst']=$sgst;
                    $order['OrderItem'][$loop_count]['igst']=$igst;

                    $totalgst=$cgst+$sgst+$igst;    
                    
                    if($tax_details['_tax_inclusive']=='Yes') {
                        $single_prodcut_total = $item_subtotal-$totalgst;
                    } else {
                        $single_prodcut_total=$item_subtotal;
                    } 

                    $order['OrderItem'][$loop_count]['subtotal']= $single_prodcut_total;
                    $order['OrderItem'][$loop_count]['total']= $single_prodcut_total+$totalgst;
                    $cart_subtotal = $cart_subtotal + $single_prodcut_total ;
                    $loop_count++;    
                }

                $order['Order']['status'] = 'Processing';
                $order['Order']['merchant_id'] = $merchant['Merchant']['id'];
                $order['Order']['user_id'] = $id;
                $order['Order']['quantity'] = $cart_quantity;
                $order['Order']['subtotal'] = $cart_subtotal;
                $order['Order']['order_type'] = $this->request->data['Order']['order_type'];
                
                //Order Delivery time
                    $order_delivery_time=$this->admin_order_delivery($merchant_id);   
                    $order['Order']['delivery_time']=$order_delivery_time;
                //End

                //Save coupon code to order table 
                     $discount = 0;
                    if($coupon) {
                        /*  
                        $data = $coupon['coupon_info'];
                        $couponCode = substr($data, strpos($data, "-") + 1);     
                        $arr = explode("/", $couponCode, 2);
                        $couponCodeprice = $arr[0];
                        $coupon_discount=filter_var($couponCodeprice, FILTER_SANITIZE_NUMBER_INT); 
                        */
                        $discount = $coupon['discount'];
                        $order['Order']['coupon_id']=$coupon['coupon_code'];
                        $order['Order']['coupon_discount']=$coupon['discount']; 
                    }
                //Add Tax rates in Order
                $shipping_charge=$order['Order']['shipping']=$delivery_charges;
                $order['Order']['cgst']=$taxes['total__cgst'];
                $order['Order']['sgst']=$taxes['total__sgst'];
                $order['Order']['igst']=$taxes['total__igst'];
                $tax = $order['Order']['tax']=$taxes['total_tax'];                    
                //End
                                            
                //Check if coupon code is applied
                if ($coupon['coupon_info']) {
                        $order['Order']['total'] = $coupon['price']+$shipping_charge+$tax;
                        $order['Order']['gross_total'] = $coupon['price']+$shipping_charge+$tax+$discount;
                } else {
                        $order['Order']['total'] = $cart_subtotal + $shipping_charge+$tax;
                        $order['Order']['gross_total'] = $cart_subtotal + $shipping_charge+$tax+$discount;
                }
                // echo "<pre>";
                // print_r($coupon);
                // print_r($order);
                // die();
                  
            
                //Payment Method CCavenue
                if ($this->request->data['Order']['order_type'] == 'ccavenue') {
                    $save = $this->Order->saveAll($order, ['validate' => 'first']);
                    $order_id = $this->Order->getLastInsertId();
                    $savedOrder = $this->Order->read();
                    
                    $CCAvenue = $this->CCAvenue->ccavenue_charge($savedOrder['Order'],$order['Order']['total'],$order_id);
                   
                }

                //Payment Method Paytm
                elseif ($this->request->data['Order']['order_type'] == 'paytm') {
                    $save = $this->Order->saveAll($order, ['validate' => 'first']);
                    $order_id = $this->Order->getLastInsertId(); 
                    $savedOrder = $this->Order->read();
                    $Paytm = $this->Paytm->paytm_charge($savedOrder['Order'], 'test');
                }
                //Payment Method Cash On Delivery
                elseif($this->request->data['Order']['order_type'] == 'cod') {
                    

                    //echo '<pre>'; print_r($order); die();
                    $save = $this->Order->saveAll($order, ['validate' => 'first']);
                    $order_id = $this->Order->getLastInsertId(); 
                    return $this->redirect(['action' => 'success', base64_encode($order_id)]);
                }
                // Razorpay paymethod
                 elseif($this->request->data['Order']['order_type'] == 'razorpay') {
                    
                    return $this->redirect(['action' => 'rozorpay_payment']);
                    //echo '<pre>'; print_r($order); die();
                   // $save = $this->Order->saveAll($order, ['validate' => 'first']);
                    //$order_id = $this->Order->getLastInsertId(); 
                    //return $this->redirect(['action' => 'success', base64_encode($order_id)]);
                }
            
            } else {
                $errors = $this->Order->invalidFields();
                $this->set(compact('errors'));
            }

        }
        
      
        
        $this->set(compact('shop','merchant_meta','Cart', 'coupon','customer_info','estimate_del_time'));
}

/////////////////////////////////////////////////
/** Razorpay payment checkout page **/
   public function rozorpay_payment(){
        $this->set('page_breadcrumb', 'Razorpay  Payment');
        $this->layout = 'customer';
        $order_total=0;
        $shop = $this->Session->read('Shop');
        $user_id = $this->get_current_user_id();
        $merchant = $this->_getMerchant();
        
        $customer_info=$this->Customer->findByUserId($this->get_current_user_id());
        
        $merchant_id=$merchant['Merchant']['id'];
        $merchant_meta=$this->MerchantMeta->find('all',array('conditions'=>array('merchant_id'=>$merchant_id)));
        $coupon = $this->Session->read('CouponCode');   
        $estimate_del_time=$this->estimate_delivery_time($merchant_id); 
        //Read Current User
        $current_user = $this->Session->read('current_user');
        $id = $current_user['User']['id'];
        $options = array('conditions' => array('user_id' => $id));
        $Cart = $this->CartSession->find('all', $options);
        $taxes = $this->order_tax_calculate($Cart);
                foreach ($merchant_meta as $merchant_key => $merchant_value) {
                if($merchant_value['MerchantMeta']['meta_key']=='delivery_charges') {
                    $delivery_charges=$merchant_value['MerchantMeta']['meta_value'];
                }
                elseif($merchant_value['MerchantMeta']['meta_key']=='minimum_order') {
                    $minimum_order=$merchant_value['MerchantMeta']['meta_value'];   
                } 
                elseif($merchant_value['MerchantMeta']['meta_key']=='payment_method') {
                  $payment_method=$merchant_value['MerchantMeta']['meta_value'];     
                }
            }
                $order['Order'] = $shop['Order'];
                $order['Order']['order_mode']='online';
                $order['Order']['customer_id']=$customer_info['Customer']['id'];
                $loop_count=$item_subtotal = $cart_subtotal = $cart_quantity = 0;
                
                //Get Orderitem Data
                foreach ($Cart as $key => $value) {
                    $cart_quantity = $cart_quantity + $value['CartSession']['quantity'];
                    $item_subtotal = $value['CartSession']['price'] * $value['CartSession']['quantity'];
                    $order['OrderItem'][] = $value['CartSession'];
                    foreach ($value as $OrderItem_key => $OrderItem_value) {
                        
                        $tax_details=json_decode($OrderItem_value['tax_details'],true);
                        // Condition for tax caluclations
                            #If product is taxable
                            if($tax_details['_is_taxable']=='Yes'){
                                # If tax is already added in the product price
                                if($tax_details['_tax_inclusive']=='Yes') {
                                // Formula: Price * ( Tax / (Tax+100) )
                                    $cgst=round($item_subtotal * ($tax_details['_cgst'] /($tax_details['_cgst']+100)),2); 
                                    $sgst=round($item_subtotal * ($tax_details['_sgst'] /($tax_details['_sgst']+100)),2); 
                                    $igst=round($item_subtotal * ($tax_details['_igst'] /($tax_details['_igst']+100)),2); 
                                # If tax is not already added in the product price    
                                } else {
                                //Formula: Price * ( ( Tax + 100) / 100 )    
                                    $cgst=round($item_subtotal *(($tax_details['_cgst']+100)/100),2); 
                                    $cgst=$cgst-$item_subtotal;
                                    $sgst=round($item_subtotal *(($tax_details['_sgst']+100)/100),2); 
                                    $sgst=$sgst-$item_subtotal;
                                    $igst=round($item_subtotal *(($tax_details['_igst']+100)/100),2); 
                                    $igst=$igst-$item_subtotal;
                                }
                            #If product is not taxable
                            } else {
                                $cgst=$igst=$sgst=0;
                            }
                        // End
                    }
                    $order['OrderItem'][$loop_count]['cgst']=$cgst;
                    $order['OrderItem'][$loop_count]['sgst']=$sgst;
                    $order['OrderItem'][$loop_count]['igst']=$igst;

                    $totalgst=$cgst+$sgst+$igst;    
                    
                    if($tax_details['_tax_inclusive']=='Yes') {
                        $single_prodcut_total = $item_subtotal-$totalgst;
                    } else {
                        $single_prodcut_total=$item_subtotal;
                    } 

                    $order['OrderItem'][$loop_count]['subtotal']= $single_prodcut_total;
                    $order['OrderItem'][$loop_count]['total']= $single_prodcut_total+$totalgst;
                    $cart_subtotal = $cart_subtotal + $single_prodcut_total ;
                    $loop_count++;    
                }

                $order['Order']['status'] = 'Processing';
                $order['Order']['merchant_id'] = $merchant['Merchant']['id'];
                $order['Order']['user_id'] = $id;
                $order['Order']['quantity'] = $cart_quantity;
                $order['Order']['subtotal'] = $cart_subtotal;
                $order['Order']['order_type'] = 'razorpay';
                
                //Order Delivery time
                    $order_delivery_time=$this->order_delivery_time($merchant_id);   
                    $order['Order']['delivery_time']=$order_delivery_time;
                //End

                //Save coupon code to order table    
                    if($coupon) {
                       /*  $data = $coupon['coupon_info'];
                        $couponCode = substr($data, strpos($data, "-") + 1);     
                        $arr = explode("/", $couponCode, 2);
                        $couponCodeprice = $arr[0];
                        $coupon_discount=filter_var($couponCodeprice, FILTER_SANITIZE_NUMBER_INT); */
                        $order['Order']['coupon_id']=$coupon['coupon_code'];
                        $order['Order']['coupon_discount']=$coupon['discount']; 
                    }
                //Add Tax rates in Order
                if($cart_subtotal >= $minimum_order){
                    $delivery_charges = 0;
                }
                $shipping_charge=$order['Order']['shipping']=$delivery_charges;
                $order['Order']['cgst']=$taxes['total__cgst'];
                $order['Order']['sgst']=$taxes['total__sgst'];
                $order['Order']['igst']=$taxes['total__igst'];
                $tax=$order['Order']['tax']=$taxes['total_tax'];                    
                //End
                                            
                //Check if coupon code is applied
                if ($coupon['coupon_info']) {
                        $order['Order']['total'] = $coupon['price']+$shipping_charge+$tax;
                        $order_total =$coupon['price']+$shipping_charge+$tax;
                } else {
                        $order['Order']['total'] = $cart_subtotal + $shipping_charge+$tax;
                        $order_total = $cart_subtotal + $shipping_charge+ $tax;
                }
          if ($this->request->is('post')) {
                
                    if(isset($this->request->data['razorpay_payment_id'])){
                        $save = $this->Order->saveAll($order, ['validate' => 'first']);
                        $order_id = $this->Order->getLastInsertId(); 
                        $UserTransaction['UserTransaction']=array();
                        $UserTransaction['UserTransaction']['user_id']=$this->get_current_user_id();
                        $UserTransaction['UserTransaction']['order_id']=$order_id;
                        $UserTransaction['UserTransaction']['merchant_id']=$order['Order']['merchant_id'];
                        $UserTransaction['UserTransaction']['amount']=$order['Order']['total'];
                        $UserTransaction['UserTransaction']['payment_method']=$order['Order']['order_type'];
                        $UserTransaction['UserTransaction']['transactionID']=$this->request->data['razorpay_payment_id'];
                        $UserTransaction['UserTransaction']['payment_status']=1;
                        $UserTransaction['UserTransaction']['payment_date']=date('Y-m-d H:i:s');
                        $this->UserTransaction->save($UserTransaction);
                        return $this->redirect(['action' => 'success', base64_encode($order_id)]);
                    }else{
                        return $this->redirect(['action' => 'review']);
                    }
                    
          }
        $this->set(compact('shop','merchant_meta','Cart', 'coupon','customer_info','estimate_del_time','order_total'));
    
}
    
/////////////////////////////////////////////////

    public function success($id = null) {
        $this->set('page_breadcrumb', 'Order Success');
        $id=base64_decode($id);
        $this->layout = 'customer';
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        $transaction_status='';
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
        $order = $this->Order->find('first', $options);
        $order_id = $order['Order']['id'];
        $customer_id = $order['Order']['customer_id'];
        $customer_info=$this->Customer->findByid($customer_id);
        $user_id =$customer_info['Customer']['user_id']; 
        $user_data = $this->User->find('first',array(
            'conditions'=>array('User.id'=>$user_id),
            'fields' => array( 'User.fcm_token','User.first_name', 'User.last_name')
            )
             );
        $device_id = $user_data['User']['fcm_token'];    
        $this->set('order', $order);
        $payment_status = false;
        if ($order) {
            if ($order['Order']['order_type'] == 'paytm') {
                $paytmChecksum = "";
                $paramList = array();
                $isValidChecksum = "FALSE";
                $paramList = $_POST;
                
                $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; 
                //Sent by Paytm pg
                $isValidChecksum = $this->Paytm->verifychecksum_e($paramList, $this->Paytm->merchantKey, $paytmChecksum); //will return TRUE or FALSE string.
                // print_r($_POST["STATUS"]);
                // die('here');
                if ($_POST["STATUS"] == "TXN_SUCCESS") {
                    $payment_status = true;
                     $this->Session->delete('CouponCode');
                    //Process your transaction here as success transaction.
                    //Verify amount & order id received from Payment gateway with your application's order id and amount.
                    //Save payment details in User_Transaction table
                    $UserTransaction['UserTransaction']=array();
                    $UserTransaction['UserTransaction']['user_id']=$this->get_current_user_id();
                    $UserTransaction['UserTransaction']['order_id']=$order['Order']['id'];
                    $UserTransaction['UserTransaction']['merchant_id']=$order['Order']['merchant_id'];
                    $UserTransaction['UserTransaction']['amount']=$order['Order']['total'];
                    $UserTransaction['UserTransaction']['payment_method']=$order['Order']['order_type'];
                    $UserTransaction['UserTransaction']['transactionID']=$_POST['TXNID'];
                    $UserTransaction['UserTransaction']['payment_status']=1;
                    $UserTransaction['UserTransaction']['payment_date']=$_POST['TXNDATE'];
                    
                    
                    $this->UserTransaction->save($UserTransaction);
                    
                    $title ="Order Status" ;
                    $message ="your order Order#{$order_id} has been  placed successfully ";
                    
                    $this->push_notification_android($device_id,$message,$title);
                    $this->Session->setFlash(
                            'Thank you for shopping with us. Transaction status is success.',
                            'default', array('class' => 'message bg-success text-white text-center p-2')
                        );
                    //End    
                } else {
                    $transaction_status='Failure';
                    $title ="Order Status" ;
                    $message ="your order Order#{$order_id} has failed due to PayTm Payment Failure ";
                    
                    $this->push_notification_android($device_id,$message,$title);
                    $this->Session->setFlash(
                        'Transaction status is failure. Please Try Again',
                        'default', array('class' => 'message bg-danger text-white text-center p-2')
                    ); 

                }
            }else if($order['Order']['order_type'] == 'razorpay'){
                    $payment_status = true;
                    $title ="Order Status" ;
                    $message ="your order Order#{$order_id} has been  placed successfully ";
                    
                    $this->push_notification_android($device_id,$message,$title);
                    $this->Session->setFlash(
                            'Thank you for shopping with us. Transaction status is success.',
                            'default', array('class' => 'message bg-success text-white text-center p-2')
                        );
                    //End   
                
            }else if($order['Order']['order_type'] == 'ccavenue'){
                $workingKey='';     //Working Key should be provided here.
                $encResponse=$_POST["encResp"];         //This is the response sent by the CCAvenue Server
                $rcvdString=$this->CCAvenue->decrypt($encResponse,$workingKey);     //Crypto Decryption used as per the specified working key.
                $order_status="";
                $decryptValues=explode('&', $rcvdString);
                $dataSize=sizeof($decryptValues);
                echo "<center>";
                for($i = 0; $i < $dataSize; $i++) {
                    $information=explode('=',$decryptValues[$i]);
                    if($i==3)   $order_status=$information[1];
                }

                if($order_status==="Success"){
                    $title ="Order Status" ;
                    $message ="your order Order#{$order_id} has been  placed successfully ";
                    
                    $this->push_notification_android($device_id,$message,$title);
                    
                    $payment_status = true;
                    $this->Session->setFlash(
                            'Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.',
                            'default', array('class' => 'message bg-success text-white text-center p-2')
                        );
                } else if($order_status==="Aborted") {
                    $this->Session->setFlash(
                            'Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail. Please Try Again',
                            'default', array('class' => 'message bg-success text-white text-center p-2')
                        );
                } else if($order_status==="Failure") {
                    $this->Session->setFlash(
                        'Thank you for shopping with us.However,the transaction has been declined.Please Try Again',
                        'default', array('class' => 'message bg-danger text-white text-center p-2')
                    ); 
                } else {
                    echo "<br>Security Error. Illegal access detected";
                    echo "<br><br>";
                    echo "<table cellspacing=4 cellpadding=4>";
                    for($i = 0; $i < $dataSize; $i++) 
                    {
                        $information=explode('=',$decryptValues[$i]);
                            echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
                    }

                    echo "</table><br>";
                    echo "</center>";
                    $this->Session->setFlash(
                        'Thank you for shopping with us. Security Error. Illegal access detected. Please Try Again',
                        'default', array('class' => 'message bg-danger text-white text-center p-2')
                    );
                } 
                
            } else if($order['Order']['order_type'] == 'cod'){
                    $this->Session->delete('CouponCode');
                    $title ="Order Status" ;
                    $message ="your order Order#{$order_id} has been  placed successfully ";
                    $this->push_notification_android($device_id,$message,$title);
                    $payment_status = true;
                    $this->Session->setFlash(
                        'Thank you for shopping with us. Order Placed Successfully.',
                        'default', array('class' => 'message bg-success text-white text-center p-2')
                    ); 
            }

        }
        if($payment_status == false){
        $this->Order->id=$id;
        $this->Order->saveField('status','Failed');
        return $this->redirect(['action' => 'review']); 
        }
        $shop = $this->Session->read('Shop');
        $this->Cart->clear();
        //Cart Clear
        $id=$this->get_current_user_id();
        $options = array('CartSession.user_id' => $id);
        if (empty($id)) {
            $id = $this->Session->id();
            $options = array('CartSession.session_id' => $id);
        }
        $cart = $this->CartSession->find('all', $options);
        
        //Update Stock of product
        foreach ($cart as $key => $value) {
            # code...
            $findproductmeta = $this->VendorProductMeta->find('first', array('recursive' => -1,
                'conditions' => array(
                    'product_id' => $value['CartSession']['product_id'],
                    'meta_key' => '_stock',
                )
                )
            );
            if($findproductmeta['VendorProductMeta']['meta_value'] > 0):
            $this->VendorProductMeta->id = $findproductmeta['VendorProductMeta']['id'];
            $this->VendorProductMeta->saveField('meta_value', $findproductmeta['VendorProductMeta']['meta_value'] - $value['CartSession']['quantity']);
            endif;
        }
            
          
            //Send Email to Merchant &  Customer After Order Placed.
            
            //$this->sendEmailMerchantOrder($order,$customer_info);
            //$this->sendEmailCustomerOrder($order,$customer_info);
        
            //Call the function for coupon codes
            $CouponCodes = new CouponCodesController;
            $CouponCodes->generate_user_specfic_coupon($customer_info['Customer']['user_id']);

            //Create Notifications for user
            $notifications_type='Order Notification';
            $this->create_notification_customer($order,$notifications_type);
            $this->create_notification_merchant($order,$notifications_type);
            
            //Send Message Confirmation to Customer & Merchant.
            // $status_change_to='OrderReceived';
            // $this->sendMessageMerchantOrder($order);
            // $this->sendMessageCustomerStatusUpdate($order,$status_change_to);   
        
            //Delete User Cart After Place Order
            $shop = $this->CartSession->deleteAll($options);
            $this->Session->write('cart_count', 0);
            if (empty($shop)) {
                return $this->redirect('/');
            }
            $this->set(compact('shop','customer_info','transaction_status'));
    }
    
    public function paytm_Response(){
        
        if ($order['Order']['order_type'] == 'paytm') {
                $paytmChecksum = "";
                $paramList = array();
                $isValidChecksum = "FALSE";
                $paramList = $_POST;
                
                $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; 
                //Sent by Paytm pg
                //Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
                //$params =$this->Paytm->getPaytmSettings('test');
                $isValidChecksum = $this->Paytm->verifychecksum_e($paramList, $this->Paytm->merchantKey, $paytmChecksum); //will return TRUE or FALSE string.
                // print_r($_POST["STATUS"]);
                // die('here');
                if ($_POST["STATUS"] == "TXN_SUCCESS") {
                    //Process your transaction here as success transaction.
                    //Verify amount & order id received from Payment gateway with your application's order id and amount.
                    //Save payment details in User_Transaction table
                    $UserTransaction['UserTransaction']=array();
                    $UserTransaction['UserTransaction']['user_id']=$this->get_current_user_id();
                    $UserTransaction['UserTransaction']['order_id']=$order['Order']['id'];
                    $UserTransaction['UserTransaction']['merchant_id']=$order['Order']['merchant_id'];
                    $UserTransaction['UserTransaction']['amount']=$order['Order']['total'];
                    $UserTransaction['UserTransaction']['payment_method']=$order['Order']['order_type'];
                    $UserTransaction['UserTransaction']['transactionID']=$_POST['TXNID'];
                    $UserTransaction['UserTransaction']['payment_status']=1;
                    $UserTransaction['UserTransaction']['payment_date']=$_POST['TXNDATE'];
                    $this->UserTransaction->save($UserTransaction);
                    $this->Session->setFlash(
                            'Transaction status is success.',
                            'default', array('class' => 'message bg-success text-white text-center p-2')
                        );
                    //End    
                } else {
                    $transaction_status='Failure';
                    $this->Session->setFlash(
                        'Transaction status is failure.',
                        'default', array('class' => 'message bg-danger text-white text-center p-2')
                    ); 

                }
            }
        
    }
    
    public function ccavenue_response(){
        if($order['Order']['order_type'] == 'ccavenue'){
                $workingKey='';     //Working Key should be provided here.
                $encResponse=$_POST["encResp"];         //This is the response sent by the CCAvenue Server
                $rcvdString=$this->CCAvenue->decrypt($encResponse,$workingKey);     //Crypto Decryption used as per the specified working key.
                $order_status="";
                $decryptValues=explode('&', $rcvdString);
                $dataSize=sizeof($decryptValues);
                echo "<center>";

                for($i = 0; $i < $dataSize; $i++) {
                    $information=explode('=',$decryptValues[$i]);
                    if($i==3)   $order_status=$information[1];
                }

                if($order_status==="Success"){
                    $this->Session->setFlash(
                            'Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.',
                            'default', array('class' => 'message bg-success text-white text-center p-2')
                        );
                } else if($order_status==="Aborted") {
                    $this->Session->setFlash(
                            'Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail.',
                            'default', array('class' => 'message bg-success text-white text-center p-2')
                        );
                } else if($order_status==="Failure") {
                    $this->Session->setFlash(
                        'Thank you for shopping with us.However,the transaction has been declined.',
                        'default', array('class' => 'message bg-danger text-white text-center p-2')
                    ); 
                } else {
                    echo "<br>Security Error. Illegal access detected";
                } echo "<br><br>";
                echo "<table cellspacing=4 cellpadding=4>";
                for($i = 0; $i < $dataSize; $i++) {
                    $information=explode('=',$decryptValues[$i]);
                        echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
                }

                echo "</table><br>";
                echo "</center>";
            }
        
    }
    
    
    public function order_success() {
        
       
        $this->layout = 'customer';
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        $transaction_status='';
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
        $order = $this->Order->find('first', $options);
        $customer_id=$order['Order']['customer_id'];
        
        $this->set('order', $order);
        if ($order) {
              if($order['Order']['order_type'] == 'cod'){
                $this->Session->setFlash(
                        'Order Placed Successfully.',
                        'default', array('class' => 'message bg-success text-white text-center p-2')
                    ); 
            }
        }
        if($success){
                $shop = $this->Session->read('Shop');
                $merchant_id=$shop['Merchant']['id'];
                $merchant_meta=$this->MerchantMeta->find('all',array('conditions'=>array('merchant_id'=>$merchant_id)));
                $coupon = $this->Session->read('CouponCode');
                $estimate_del_time=$this->estimate_delivery_time($merchant_id); 
                //Read Current User
                $current_user = $this->Session->read('current_user');
                $id = $current_user['User']['id'];
                $options = array('conditions' => array('user_id' => $id));
                $Cart = $this->CartSession->find('all', $options);
                if (empty($shop)) {
                    return $this->redirect('/');
                }          
                    //Load Model Order
                    $this->loadModel('Order');


                    $this->Order->set($this->request->data);
                    if ($this->Order->validates()) {    
                       
                        $order['Order'] = $shop['Order'];
                        $order['Order']['order_mode']='online';
                        $order['Order']['customer_id']=$shop['Order']['customer_id'];
                        $loop_count=$item_subtotal = $cart_subtotal = $cart_quantity = 0;
                        
                        //Get Orderitem Data
                        foreach ($Cart as $key => $value) {
                            $cart_quantity = $cart_quantity + $value['CartSession']['quantity'];
                            $item_subtotal = $value['CartSession']['price'] * $value['CartSession']['quantity'];
                            $order['OrderItem'][] = $value['CartSession'];
                            foreach ($value as $OrderItem_key => $OrderItem_value) {
                                
                                $tax_details=json_decode($OrderItem_value['tax_details'],true);
                                // Condition for tax caluclations
                                    #If product is taxable
                                    if($tax_details['_is_taxable']=='Yes'){
                                        # If tax is already added in the product price
                                        if($tax_details['_tax_inclusive']=='Yes') {
                                        // Formula: Price * ( Tax / (Tax+100) )
                                            $cgst=round($item_subtotal * ($tax_details['_cgst'] /($tax_details['_cgst']+100)),2); 
                                            $sgst=round($item_subtotal * ($tax_details['_sgst'] /($tax_details['_sgst']+100)),2); 
                                            $igst=round($item_subtotal * ($tax_details['_igst'] /($tax_details['_igst']+100)),2); 
                                        # If tax is not already added in the product price    
                                        } else {
                                        //Formula: Price * ( ( Tax + 100) / 100 )    
                                            $cgst=round($item_subtotal *(($tax_details['_cgst']+100)/100),2); 
                                            $cgst=$cgst-$item_subtotal;
                                            $sgst=round($item_subtotal *(($tax_details['_sgst']+100)/100),2); 
                                            $sgst=$sgst-$item_subtotal;
                                            $igst=round($item_subtotal *(($tax_details['_igst']+100)/100),2); 
                                            $igst=$igst-$item_subtotal;
                                        }
                                    #If product is not taxable
                                    } else {
                                        $cgst=$igst=$sgst=0;
                                    }
                                // End
                            }
                            $order['OrderItem'][$loop_count]['cgst']=$cgst;
                            $order['OrderItem'][$loop_count]['sgst']=$sgst;
                            $order['OrderItem'][$loop_count]['igst']=$igst;

                            $totalgst=$cgst+$sgst+$igst;    
                            
                            if($tax_details['_tax_inclusive']=='Yes') {
                                $single_prodcut_total = $item_subtotal-$totalgst;
                            } else {
                                $single_prodcut_total=$item_subtotal;
                            } 
                            $order['OrderItem'][$loop_count]['subtotal']= $single_prodcut_total;
                            $order['OrderItem'][$loop_count]['total']= $single_prodcut_total+$totalgst;
                            
                            if($tax_details['_tax_inclusive']=='Yes') {
                                $cart_subtotal = $cart_subtotal + $single_prodcut_total ;
                            } else {
                                $cart_subtotal = $cart_subtotal + $single_prodcut_total-$totalgst;
                            } 
                            $loop_count++;
                        }

                        $order['Order']['status'] = 'Processing';
                        $order['Order']['merchant_id'] = $shop['Merchant']['id'];
                        $order['Order']['user_id'] = $id;
                        $order['Order']['quantity'] = $cart_quantity;
                        $order['Order']['subtotal'] = $cart_subtotal;
                        $order['Order']['order_type'] = $this->request->data['Order']['order_type'];
                        
                        //Order Delivery time
                            $order_delivery_time=$this->order_delivery_time($merchant_id);   
                            $order['Order']['delivery_time']=$order_delivery_time;
                        //End

                        //Save coupon code to order table    
                            if($coupon) {
                                $data = $coupon['coupon_info'];
                                $couponCode = substr($data, strpos($data, "-") + 1);     
                                $arr = explode("/", $couponCode, 2);
                                $couponCodeprice = $arr[0];
                                $coupon_discount=filter_var($couponCodeprice, FILTER_SANITIZE_NUMBER_INT);
                                $order['Order']['coupon_id']=$coupon['coupon_code'];
                                $order['Order']['coupon_discount']=$coupon_discount; 
                            }
                        //Add Tax rates in Order
                        $shipping_charge=$order['Order']['shipping']=$this->request->data['Order']['_delivery_charges'];
                        $order['Order']['cgst']=$this->request->data['Order']['_cgst'];
                        $order['Order']['sgst']=$this->request->data['Order']['_sgst'];
                        $order['Order']['igst']=$this->request->data['Order']['_igst'];
                        $tax=$order['Order']['tax']=$this->request->data['Order']['_cgst']+ $this->request->data['Order']['_igst'] + $this->request->data['Order']['_sgst'];                    
                        //End
                                                    
                        //Check if coupon code is applied
                        if ($coupon['coupon_info']) {
                                $order['Order']['total'] = $coupon['price']+$shipping_charge+$tax;
                        } else {
                                $order['Order']['total'] = $cart_subtotal + $shipping_charge+$tax;
                        }
                           
                        //Payment Method CCavenue
                        if ($this->request->data['Order']['order_type'] == 'ccavenue') {
                            $save = $this->Order->saveAll($order, ['validate' => 'first']);
                            $order_id = $this->Order->getLastInsertId();
                            $savedOrder = $this->Order->read();
                            /*
                            $CCAvenue = $this->CCAvenue->ccavenue_charge($savedOrder['Order'],$order['Order']['total'],$order_id);
                            */
                        }

                        //Payment Method Paytm
                        elseif ($this->request->data['Order']['order_type'] == 'paytm') {
                            $save = $this->Order->saveAll($order, ['validate' => 'first']);
                            $order_id = $this->Order->getLastInsertId(); 
                            $savedOrder = $this->Order->read();
                            
                        }
                        //Payment Method Cash On Delivery
                        elseif($this->request->data['Order']['order_type'] == 'cod') {
                            
                            //echo '<pre>'; print_r($order); die();
                            $save = $this->Order->saveAll($order, ['validate' => 'first']);
                            $order_id = $this->Order->getLastInsertId(); 
                            
                        }
                    
                    } else {
                        $errors = $this->Order->invalidFields();
                        $this->set(compact('errors'));
                    }

     
        }
        if($success){
        $shop = $this->Session->read('Shop');
        $this->Cart->clear();
        //Cart Clear
        $id=$this->get_current_user_id();
        $options = array('CartSession.user_id' => $id);
        if (empty($id)) {
            $id = $this->Session->id();
            $options = array('CartSession.session_id' => $id);
        }
        $cart = $this->CartSession->find('all', $options);
        
        //Update Stock of product
        foreach ($cart as $key => $value) {
            # code...
            $findproductmeta = $this->VendorProductMeta->find('first', array('recursive' => -1,
                'conditions' => array(
                    'product_id' => $value['CartSession']['product_id'],
                    'meta_key' => '_stock',
                )
                )
            );
            if($findproductmeta['VendorProductMeta']['meta_value'] > 0):
            $this->VendorProductMeta->id = $findproductmeta['VendorProductMeta']['id'];
            $this->VendorProductMeta->saveField('meta_value', $findproductmeta['VendorProductMeta']['meta_value'] - $value['CartSession']['quantity']);
            endif;
        }
            
            $customer_info=$this->Customer->findByid($customer_id);
            //Send Email to Merchant &  Customer After Order Placed.
            $this->sendEmailMerchantOrder($order,$customer_info);
            $this->sendEmailCustomerOrder($order,$customer_info);
        
            //Create Notifications for user
            $notifications_type='Order Notification';
            $this->create_notification_customer($order,$notifications_type);
            $this->create_notification_merchant($order,$notifications_type);
            
            //Send Message Confirmation to Customer & Merchant.
            // $status_change_to='OrderReceived';
            // $this->sendMessageMerchantOrder($order);
            // $this->sendMessageCustomerStatusUpdate($order,$status_change_to);   
        
            //Delete User Cart After Place Order
            $shop = $this->CartSession->deleteAll($options);

            if (empty($shop)) {
                return $this->redirect('/');
            }
            
            $customer_info=$this->Customer->findByid($customer_id);
            $this->set(compact('shop','customer_info','transaction_status'));
        }
    }
    
    public function order_tax_calculate($Cart){
                   $tax = array();
                    $Subtotal=0;
                    $count=1;
                    $total__cgst =0;
                    $total__igst =0;
                    $total__sgst =0;                
                    foreach ($Cart as $key => $item){ 
                        $item_subtotal = $item['CartSession']['price']*$item['CartSession']['quantity']; 
                        $tax_details=json_decode($item['CartSession']['tax_details'],true);
                        // Condition for tax caluclations
                            #If product is taxable
                            if($tax_details['_is_taxable']=='Yes'){
                                # If tax is already added in the product price
                                if($tax_details['_tax_inclusive']=='Yes') {
                                // Formula: Price * ( Tax / (Tax+100) )
                                    $cgst=round($item_subtotal * ($tax_details['_cgst'] /($tax_details['_cgst']+100)),2); 
                                    $sgst=round($item_subtotal * ($tax_details['_sgst'] /($tax_details['_sgst']+100)),2); 
                                    $igst=round($item_subtotal * ($tax_details['_igst'] /($tax_details['_igst']+100)),2); 
                                # If tax is not already added in the product price    
                                } else {
                                //Formula: Price * ( ( Tax + 100) / 100 )    
                                    $cgst=round($item_subtotal *(($tax_details['_cgst']+100)/100),2); 
                                    $cgst=$cgst-$item_subtotal;
                                    $sgst=round($item_subtotal *(($tax_details['_sgst']+100)/100),2); 
                                    $sgst=$sgst-$item_subtotal;
                                    $igst=round($item_subtotal *(($tax_details['_igst']+100)/100),2); 
                                    $igst=$igst-$item_subtotal;
                                }
                            #If product is not taxable
                            } else {
                                $cgst=$igst=$sgst=0;
                            }
                        // End
                           $totalGst=$cgst + $igst + $sgst; 
                    
                        
                            $count++; 
                            $total__cgst=$total__cgst+$cgst;
                            $total__igst=$total__igst+$igst;
                            $total__sgst=$total__sgst+$sgst;
                            
                    }
                    $total_tax = $total__cgst + $total__sgst+ $total__igst;
                        $tax =array(
                            'total__cgst' => $total__cgst,
                            'total__sgst' => $total__sgst,
                            'total__igst' => $total__igst,
                            'total_tax'   => $total_tax
                               );
                   return $tax;
        
    }
}
