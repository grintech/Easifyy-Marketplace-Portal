<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{

    public function getallStoreOrdersByStatus()
    {
        

        $this->request->allowMethod(['post', 'put']);
        $merchant_id = base64_decode( $this->request->getData('merchant_id') );
        $status = $this->request->getData('status');
        
        $orders = $this->Orders->find('all', [
            'contain' => ['Merchants', 'Addresses', 'OrderStatuses'],
            'conditions' => ['Orders.merchant_id' => $merchant_id, 'OrderStatuses.name' => $status ] ,
            'fields' => [ 
                'Orders.id', 'Orders.created', 
                'OrderStatuses.name', 
                'Merchants.store_name', 'Merchants.store_pic'
                
            ],
            'order' => [ 'Orders.created' => 'DESC' ]
        ]);

        if( $orders ) {
            $this->set([
                'orders' => $orders,  
                 'status' => 1,
                '_serialize' => ['status','orders']
            ]);    
        } else {
            $this->set([
                'orders' => $orders,  
                 'status' => 0,
                '_serialize' => ['status','orders']
            ]);    
        }
        
    }

    public function updateOrderStatus(){

        $this->request->allowMethod(['post', 'put']);
        $merchant_id = base64_decode( $this->request->getData('merchant_id') );
        $order_id = base64_decode( $this->request->getData('order_id') );
        $user_type = base64_decode( $this->request->getData('user_type') );

        $old_status = $this->request->getData('old_status');
        $new_status = $this->request->getData('new_status');
        $notes = @$this->request->getData('notes');
        
        $this->loadModel('OrderStatuses');
        $orders = $this->Orders->find('all', [
            'contain'=> ['OrderStatuses'],
            'conditions' => ['Orders.id' => $order_id, 'Orders.merchant_id' => $merchant_id, 'OrderStatuses.name' => $old_status ]
        ])->first();

        if( $orders ) {

            $order_status = $this->OrderStatuses->find('all')
            ->where(['OrderStatuses.name' => $new_status ])
            ->first();
            
            if( $order_status ) {
                $orders = $this->Orders->patchEntity($orders, $this->request->getData());
                $orders->id = $order_id;
                $orders->merchant_id = $merchant_id;
                $orders->order_status_id = $order_status->id;
                $orders->order_notes = $notes;

                $order = $this->Orders->save($orders);

                if( $order ){

                    $merchant_user_id = $this->getUserIdByMerchantId($merchant_id);
                    $merchant_fcm_token = $this->getFcmToken($merchant_user_id);
                    $merchant_body = "";
                    if( $user_type == 'Merchant' && $new_status == 'Cancel' ) {
                        $merchant_body = "You have cancelled an order. With message: {$notes}";
                    } else if( $user_type == 'User' && $new_status == 'Cancel' ) {
                        $merchant_body = "User has cancelled the order. With message: {$notes}";
                    } else {
                        $merchant_body = "Order status has been update from {$old_status} to {$new_status}.";
                    }
                    if( $merchant_fcm_token !== false ) {
                        $merchant_notification = [
                          'fcm_token' => $merchant_fcm_token,
                          'type' => 'Order status',
                          'title' => "OID #{$order_id} order status update",
                          'body' => $merchant_body
                        ];
                        $this->sendNotification($merchant_notification);  
                    } else {
                        // Log here
                    }

                    $user_fcm_token = $this->getFcmToken($order->user_id);
                    $user_body = "";
                    if( $user_type == 'Merchant' && $new_status == 'Cancel' ) {
                        $user_body = "Store has cancelled the order. With message: {$notes}";
                    } else if( $user_type == 'User' && $new_status == 'Cancel' ) {
                        $user_body = "You have cancelled an order. With message: {$notes}";
                    } else {
                        $user_body = "Order status has been update from {$old_status} to {$new_status}.";
                    }
                    if ( $user_fcm_token !== false ) {
                        $user_notification = [
                          'fcm_token' => $user_fcm_token,
                          'type' => 'Order status',
                          'title' => "OID #{$order_id} order status update",
                          'body' => $user_body
                        ];
                        $this->sendNotification($user_fcm_token);
                    } else {
                        // log
                    }

                    $this->set([
                        'status' => 1,
                        '_serialize' => ['status']
                    ]);
                } else {
                    
                    $this->set([
                        'status' => 2,
                        'data' => $this->request->getData(),
                        '_serialize' => ['status', 'data']
                    ]);
                }
            } else {
                $this->set([
                    'status' => 3,
                    'data' => $this->request->getData(),
                    '_serialize' => ['status', 'data']
                ]);       
            }

            
        } else {
            $this->set([
                'status' => 4,
                'data' => $this->request->getData(),
                '_serialize' => ['status', 'data']
            ]);    
        }

    }

    public function countOrdersByStatus(){
        $this->request->allowMethod(['post', 'put']);
        $merchant_id = base64_decode( $this->request->getData('merchant_id') );
        $status = $this->request->getData('status');
        
        $orders = $this->Orders->find()
        ->contain(['OrderStatuses'])
        ->where(['Orders.merchant_id' => $merchant_id, 'OrderStatuses.name' => $status ])
        ->count();
        
        if( $orders ) {
            $this->set([
                'orders' => $orders,  
                 'status' => 1,
                '_serialize' => ['status','orders']
            ]);    
        } else {
            $this->set([
                'orders' => $orders,  
                 'status' => 0,
                '_serialize' => ['status','orders']
            ]);    
        }
    }
    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function getallorders()
    {
    	

        $this->request->allowMethod(['post', 'put']);
        $user_id = $this->request->getData('user_id');
        $orders = $this->Orders->find('all', [
                    'contain' => ['Merchants', 'Addresses', 'OrderStatuses'],
                    'conditions' => ['Orders.user_id' => $user_id] ,
                    'fields' => [ 
                    	'Orders.id', 'Orders.created', 
                    	'OrderStatuses.name', 
                    	'Merchants.store_name', 'Merchants.store_pic'
                    	
                   	],
                    'order' => [ 'Orders.created' => 'DESC' ]
                 ]);
        
        $this->set([
                    'orders' => $orders,  
                     'status' => 1,
                    '_serialize' => ['status','orders']
                ]);
    }

    
    public function getAOrder()
    {   
        $base_urls =  Router::url('/', true) ;
        $url =  $base_urls. 'img/product-images/';
        $this->request->allowMethod(['post', 'put']);
        $id = $this->request->getData('id');
        $order = $this->Orders->get($id, [
                    'contain' => ['Addresses', 'Coupons','OrderModes', 'OrderStatuses','OrderPayments', 'PaymentMethods', 'Addresses.States', 'Addresses.Cities'],
                    'conditions' => ['Orders.id' => $id],
                    'fields' => [
                    	'Orders.id','Orders.merchant_id', 'Orders.igst', 'Orders.cgst', 'Orders.sgst', 'Orders.shipping', 'Orders.delivery_time', 'Orders.total', 'Orders.gross_total', 'Orders.order_notes','Orders.refund', 
                    	'PaymentMethods.name', 
                    	'OrderPayments.transactionId', 'OrderPayments.created', 
                    	'OrderStatuses.name', 
                    	'OrderModes.name', 
                    	'Coupons.coupon_code','Coupons.discount',
                    	'Addresses.name','Addresses.address_line_1','Addresses.address_line_2','Addresses.zip_code','Addresses.phone_1',
                    	'Cities.name','States.name', 
                    ]
                 ]);
        if ($order) {
            $this->set([
                    'order' => $order,  
                     'status' => 1,
                    'url' => $url,
                    '_serialize' => ['status','order','url']
                ]);
        } else {
            $this->set([
                    'order' => $order,  
                     'status' => 0,
                    '_serialize' => ['status','order']
                ]);
        }
        
    }

    public function createorder()
    {
        $this->request->allowMethod(['post', 'put']);
        $order = $this->Orders->newEntity();

        if ($this->request->is('post')) {
            
            $order = $this->Orders->patchEntity($order, $this->request->getData());

            $this->loadModel('OrderStatuses');
            $this->loadModel('OrderModes');
            $order_status = $this->OrderStatuses->find('all')
            ->where([ 'name' => $this->request->getData('order_status') ])
            ->first();

            $order_status_id = 1;
            if( $order_status ) {
                $order_status_id = $order_status->id;
            }


            $order_mode = $this->OrderModes->find('all')
            ->where([ 'name' => $this->request->getData('order_mode') ])
            ->first();
            $order_mode_id = 3;
            if( $order_mode ) {
                $order_mode_id = $order_mode->id;
            }

            $getData = $this->request; 
            $order->user_id = base64_decode( $getData->getData('user_id') );
            $order->merchant_id = base64_decode( $getData->getData('merchant_id') );
            $order->address_id = base64_decode( $getData->getData('address_id') );
            if( $getData->getData('coupon_id') != "" ){
                $order->coupon_id = base64_decode( $getData->getData('coupon_id') );
                // $order->coupon_discou = base64_decode( $getData->getData('coupon_id') );
            }
            $order->payment_method_id = base64_decode( $getData->getData('payment_method_id') );
            
            $order->order_mode_id = $order_mode_id;
            $order->order_status_id = $order_status_id;
            // print_r($order);s
            $order = $this->Orders->save($order);
            
            if ( $order ) {

                $merchant_user_id = $this->getUserIdByMerchantId($order->merchant_id);
                $merchant_fcm_token = $this->getFcmToken($merchant_user_id);
                if( $merchant_fcm_token !== false ) {
                    $merchant_notification = [
                      'fcm_token' => $merchant_fcm_token,
                      'type' => 'New order',
                      'title' => "New order OID #{$order_id}",
                      'body' => 'You received a new order. Kindly check all the items. Mark the order as processing.'
                    ];
                    $this->sendNotification($merchant_notification);  
                } else {
                    // Log here
                }

                $user_fcm_token = $this->getFcmToken($order->user_id);
                if ( $user_fcm_token !== false ) {
                    $user_notification = [
                      'fcm_token' => $user_fcm_token,
                      'type' => 'New order',
                      'title' => "New order #{$order_id}",
                      'body' => 'Thank you for placing order. We have informed the store. The store will update the order status soon.'
                    ];
                    $this->sendNotification($user_fcm_token);
                } else {
                    // log
                }

                // print_r($order->id);
                $this->clearCartItems( $order->user_id, $order->id );
                $this->createOrderPayment( $order->id, $order->user_id, $order->merchant_id,$order->total, $getData->getData('transaction_id') );

                $this->set([
                    'order' => $order,  
                     'status' => 1,
                    '_serialize' => ['status','order']
                ]);
            } else {
                $this->set([
                    'order' => $order,  
                     'status' => 0,
                    '_serialize' => ['status','order']
                ]);
            }
           
        }
        
    }

    private function createOrderPayment( $order_id, $user_id, $merchant_id, $amount, $transactionId ){

        $this->loadModel('OrderPayments');
        $order_payment = $this->OrderPayments->newEntity();   
        $order_payment->order_id = $order_id;
        $order_payment->user_id = $user_id;
        $order_payment->merchant_id = $merchant_id;
        $order_payment->amount = $amount;
        $order_payment->transactionId = $transactionId;
        $order_payment->transaction_status = 0;
        $order_payment->transaction_date = date('Y-m-d h:i:s');
        if( $this->OrderPayments->save( $order_payment ) ) {
            return 1;
        } else {
            return 0;
            // Create in a file and database
        }
    }

    private function clearCartItems( $user_id, $order_id ){
        
        $this->loadModel('CartItems');
        $this->loadModel('OrderItems');
        $cartItems = $this->CartItems->find()
            ->where([ 'user_id' => $user_id ])
            ->all();
        if($cartItems->count()){
            foreach ($cartItems as $cartItem) {
                $orderItems = $this->OrderItems->newEntity();
                // $orderItems = $this->Orders->patchEntity($orderItems, $this->request->getData());
                $orderItems->order_id = $order_id;
                // $orderItems->product_id = $cartItem->product_id;
                $orderItems->merchant_product_id = $cartItem->merchant_product_id;
                $orderItems->quantity = $cartItem->quantity;
                $orderItems->price = $cartItem->price;
                $orderItems->subtotal = $cartItem->subtotal;
                $orderItems->total = $cartItem->total;

                $order_items = $this->OrderItems->save( $orderItems );
                $deleteCartItem = $this->CartItems->get($cartItem['id']);
                if ($this->CartItems->delete($deleteCartItem) ) {
                   
                }
                
            }
            return 1;
        } else {
            return 0;
        }

    }

}
