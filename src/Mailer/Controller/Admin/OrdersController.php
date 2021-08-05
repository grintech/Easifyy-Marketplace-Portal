<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\Table;
use App\Model\Entity\Role;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{

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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // $userId = $this->Auth->user('id');
        // $this->loadModel('Merchants');
        // $tableRegObj = TableRegistry::get('Merchants');
        // $getAllResults = $tableRegObj
        //                 ->find()
        //                 ->select(['id'])
        //                 ->where(['user_id' => $userId])
        //                 ->toArray();  
        // $merchant_id= $getAllResults[0]['id'];
        $merchantData = $this->getMerchantId();  
        if(isset($_POST['order_status_id']) || isset($_POST['created']) || isset($_POST['order_mode_id'])) {
            if($_POST['order_status_id'] !='') {
                $conditions= [
                        'Orders.delete_status'=>1,
                        'Orders.order_status_id'=>$_POST['order_status_id'],    
                        'Orders.merchant_id'=>$merchantData->id,
                   ];    
            } else {
                $conditions= [
                        'Orders.delete_status'=>1,
                        'Orders.merchant_id'=>$merchantData->id,
                   ];    
            }

            if($_POST['created'] !='' && $_POST['gross_total']!='') {
                $order=[
                    'Orders.created' => $_POST['created'], 
                    'Orders.created' => $_POST['gross_total'],     
                ];
            } elseif($_POST['created'] !='') {
                $order=[
                    'Orders.created' => $_POST['created'], 
                ];
            } elseif($_POST['gross_total']!='') {
                $order=[
                    'Orders.created' => $_POST['gross_total'],     
                ];
            }
            $this->paginate = [
                'contain' => ['Merchants', 'Users', 'Addresses', 'Coupons', 'Runners', 'OrderModes', 'OrderStatuses'],
                'conditions' => $conditions,
                'order'=>$order,
            ];    
        } else {
            $this->paginate = [
                'contain' => ['Merchants', 'Users', 'Addresses', 'Coupons', 'Runners', 'OrderModes', 'OrderStatuses'],
                'conditions' => [
                                'Orders.delete_status'=>1,
                                'Orders.merchant_id'=>$merchantData->id
                            ],
            ];
        }
        


        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $id = base64_decode($id);
        $merchantData = $this->getMerchantId();

        $order = $this->Orders->find('all')
            ->where([ 'Orders.id' => $id, 'Orders.merchant_id' => $merchantData->id ])
            ->first();
        
        if( !$order ) {
            $this->Flash->error(__('The order could not find. Please, try again.'));
            return $this->redirect( $this->referer() );
        }

        if ($this->request->is(['patch', 'post', 'put'])) {

            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'view', base64_encode($id)]);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));

        }
        
        $order = $this->Orders->get($id, [
            'contain' => ['Merchants', 'Users', 'Addresses', 'DeliveryAddresses', 'Coupons', 'Runners', 'OrderModes', 'PaymentMethods', 'OrderStatuses', 'CouponRedeems', 'MerchantPayouts', 
                'OrderItems' => [
                    'fields' => [
                        'OrderItems.order_id','OrderItems.igst','OrderItems.sgst','OrderItems.cgst','OrderItems.price','OrderItems.subtotal','OrderItems.total','OrderItems.quantity',
                    ]
                ], 
                'OrderItems.MerchantProducts' => [
                    'fields' => [
                        'MerchantProducts.title', 'MerchantProducts._weight','MerchantProducts.id','MerchantProducts.parent_id', 
                    ]
                ],
                'OrderItems.MerchantProducts.ProductUnits' => [
                    'fields' => [
                        'ProductUnits.name',
                    ]
                ],
                'OrderItems.MerchantProducts.ProductTypes' => [
                    'fields' => [
                        'ProductTypes.name',
                    ]
                ], 
                'OrderPayments', 'Addresses.Cities', 'Addresses.States'
            ],
            'fields' => [
                'Users.first_name', 'Users.last_name', 'Users.username',
                'Addresses.name', 'Addresses.address_line_1','Addresses.address_line_2','Addresses.zip_code','Addresses.phone_1',
                'Cities.name',
                'States.name',
                'Coupons.id', 'Coupons.coupon_code',
                'PaymentMethods.name',
                'OrderStatuses.name',
                
                
                
                
                'OrderPayments.id', 'OrderPayments.transactionId', 'OrderPayments.created', 
                'Orders.id', 'Orders.igst', 'Orders.cgst', 'Orders.sgst', 'Orders.igst', 'Orders.coupon_discount', 'Orders.total', 'Orders.gross_total', 'Orders.igst', 'Orders.order_status_id', 'Orders.created', 'Orders.modified'
            ]
        ]);

        $this->loadModel('OrderStatuses');
        $order_statuses = $this->OrderStatuses->find('list');

        $this->set('order', $order);
        $this->set('order_statuses', $order_statuses);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $order = $this->Orders->newEntity();
    //     if ($this->request->is('post')) {
    //         $order = $this->Orders->patchEntity($order, $this->request->getData());
    //         if ($this->Orders->save($order)) {
    //             $this->Flash->success(__('The order has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The order could not be saved. Please, try again.'));
    //     }
    //     $merchants = $this->Orders->Merchants->find('list', ['limit' => 200]);
    //     $users = $this->Orders->Users->find('list', ['limit' => 200]);
    //     $addresses = $this->Orders->Addresses->find('list', ['limit' => 200]);
    //     $coupons = $this->Orders->Coupons->find('list', ['limit' => 200]);
    //     $runners = $this->Orders->Runners->find('list', ['limit' => 200]);
    //     $orderModes = $this->Orders->OrderModes->find('list', ['limit' => 200]);
    //     $orderStatuses = $this->Orders->OrderStatuses->find('list', ['limit' => 200]);
    //     $this->set(compact('order', 'merchants', 'users', 'addresses', 'coupons', 'runners', 'orderModes', 'orderStatuses'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $order = $this->Orders->get($id, [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $order = $this->Orders->patchEntity($order, $this->request->getData());
    //         if ($this->Orders->save($order)) {
    //             $this->Flash->success(__('The order has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The order could not be saved. Please, try again.'));
    //     }
    //     $merchants = $this->Orders->Merchants->find('list', ['limit' => 200]);
    //     $users = $this->Orders->Users->find('list', ['limit' => 200]);
    //     $addresses = $this->Orders->Addresses->find('list', ['limit' => 200]);
    //     $coupons = $this->Orders->Coupons->find('list', ['limit' => 200]);
    //     $runners = $this->Orders->Runners->find('list', ['limit' => 200]);
    //     $orderModes = $this->Orders->OrderModes->find('list', ['limit' => 200]);
    //     $orderStatuses = $this->Orders->OrderStatuses->find('list', ['limit' => 200]);
    //     $this->set(compact('order', 'merchants', 'users', 'addresses', 'coupons', 'runners', 'orderModes', 'orderStatuses'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     //$this->request->allowMethod(['post', 'delete']);
    //     $order = $this->Orders->get($id);
    //     $order->delete_status = 0;
    //     if ($this->Orders->save($order)) {
    //         $this->Flash->success(__('The order has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The order could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
