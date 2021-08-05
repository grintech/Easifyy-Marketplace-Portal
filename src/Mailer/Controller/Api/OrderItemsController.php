<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * OrderItems Controller
 *
 * @property \App\Model\Table\OrderItemsTable $OrderItems
 *
 * @method \App\Model\Entity\OrderItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderItemsController extends AppController
{

    public function getAllOrderItems()
    {
        

        $this->request->allowMethod(['post', 'put']);
        $order_id = $this->request->getData('order_id');
        $orderItems = $this->OrderItems->find('all', [
                    'contain' => ['MerchantProducts'],
                    'conditions' => ['OrderItems.order_id' => $order_id ] ,
                    'fields' => [ 
                        'OrderItems.id','OrderItems.quantity', 'OrderItems.price','OrderItems.igst','OrderItems.cgst','OrderItems.cgst','OrderItems.subtotal','OrderItems.total','OrderItems.status',
                        'MerchantProducts.id','MerchantProducts.merchant_id','MerchantProducts.product_id','MerchantProducts.product_type_id','MerchantProducts.parent_id','MerchantProducts.title','MerchantProducts.slug','MerchantProducts.description','MerchantProducts._price','MerchantProducts._sale_price','MerchantProducts._weight','MerchantProducts.product_unit_id','MerchantProducts._stock','MerchantProducts._bar_code','MerchantProducts._hsn_code','MerchantProducts._item_code','MerchantProducts._sku','MerchantProducts._cgst','MerchantProducts._igst','MerchantProducts._sgst','MerchantProducts._tax_inclusive','MerchantProducts._is_taxable','MerchantProducts.published_on','MerchantProducts.status','MerchantProducts.created','MerchantProducts.modified'
                        
                    ]
                 ]);
        
        $this->set([
            'orderItems' => $orderItems,  
             'status' => 1,
            '_serialize' => ['status','orderItems']
        ]);
    }

    public function setOutOfStock(){
        $this->request->allowMethod(['post', 'put']);
        if( $this->request->is('post') ){
          
          $order_item_id = base64_decode($this->request->getData('item_id'));
          $order_id = base64_decode($this->request->getData('order_id'));
          $merchant_id = base64_decode($this->request->getData('merchant_id'));

          $this->loadModel('Orders');
          $order = $this->Orders->find('all')
          ->where(['id' => $order_id, 'merchant_id' => $merchant_id])
          ->select(['id', 'user_id', 'refund'])
          ->first();

          if( !$order ) {
            $this->set([
                'status' => 0,
                '_serialize' => ['status']
            ]);
            die();
          }

          $order_items = $this->OrderItems->find('all')
          ->select(['id', 'total'])
          ->where(['OrderItems.order_id' => $order_id, 'OrderItems.id' => $order_item_id])
          ->first();

          if( $order_items ){
            
            $orderItemsTable = TableRegistry::getTableLocator()->get('OrderItems');
            $orderItem = $orderItemsTable->newEntity();

            $orderItem->id = $order_items->id;
            $orderItem->status = 0;

            if ($orderItemsTable->save($orderItem)) {

              $orderTable = TableRegistry::getTableLocator()->get('Orders');
              $orderRow = $orderTable->newEntity();
              $orderRow->id = $order->id;
              $orderRow->refund = $order->refund + $order_items->total;
              $orderTable->save($orderRow);

              $merchant_user_id = $this->getUserIdByMerchantId($merchant_id);
              $merchant_fcm_token = $this->getFcmToken($merchant_user_id);
              if( $merchant_fcm_token !== false ) {
                $merchant_notification = [
                  'fcm_token' => $merchant_fcm_token,
                  'type' => 'Item out of stock',
                  'title' => "OID #{$order_id} Item out of stock",
                  'body' => 'You marked a item as out of stock. If it was not you then contact support.'
                ];
                $this->sendNotification($merchant_notification);  
              } else {
                // Log here
              }
              
              $user_fcm_token = $this->getFcmToken($order->user_id);
              if ( $user_fcm_token !== false ) {
                $user_notification = [
                  'fcm_token' => $user_fcm_token,
                  'type' => 'Item out of stock',
                  'title' => "OID #{$order_id} Item out of stock",
                  'body' => 'One of your items has been marked as out of stock. Ask for refund when receiving your products.'
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
