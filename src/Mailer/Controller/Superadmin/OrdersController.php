<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\Table;
use App\Model\Entity\Role;
use Cake\ORM\TableRegistry;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if(isset($_POST['order_status_id']) || isset($_POST['created']) || isset($_POST['order_mode_id'])) {
            if($_POST['order_status_id'] !='') {
                $conditions= [
                        'Orders.delete_status'=>1,
                        'Orders.order_status_id'=>$_POST['order_status_id'],    
                   ];    
            } else {
                $conditions= [
                        'Orders.delete_status'=>1,
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
                'contain' => ['Merchants', 'Users', 'Coupons', 'Runners', 'OrderModes', 'OrderStatuses'],
                'conditions' => $conditions,
                'order'=>$order,
            ];    
        } else {
            $this->paginate = [
                'contain' => ['Merchants', 'Users', 'Coupons', 'Runners', 'OrderModes', 'OrderStatuses'],
                'conditions' => [
                        'Orders.delete_status'=>1,
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
        $order = $this->Orders->get($id, [
            'contain' => ['Merchants', 'Users', 'Coupons', 'Runners', 'OrderModes', 'PaymentMethods', 'OrderStatuses', 'CouponRedeems', 'MerchantPayouts', 'OrderItems', 'OrderNotifications', 'OrderPayments', 'RunnerDeliveryRequests', 'Supports'],
        ]);

        $this->set('order', $order);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $merchants = $this->Orders->Merchants->find('list', ['limit' => 200]);
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        //$addresses = $this->Orders->Addresses->find('list', ['limit' => 200]);
        $coupons = $this->Orders->Coupons->find('list', ['limit' => 200]);
        $runners = $this->Orders->Runners->find('list', ['limit' => 200]);
        $orderModes = $this->Orders->OrderModes->find('list', ['limit' => 200]);
        $orderStatuses = $this->Orders->OrderStatuses->find('list', ['limit' => 200]);
        $this->set(compact('order', 'merchants', 'users', 'coupons', 'runners', 'orderModes', 'orderStatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $merchants = $this->Orders->Merchants->find('list', ['limit' => 200]);
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        //$addresses = $this->Orders->Addresses->find('list', ['limit' => 200]);
        $coupons = $this->Orders->Coupons->find('list', ['limit' => 200]);
        $runners = $this->Orders->Runners->find('list', ['limit' => 200]);
        $orderModes = $this->Orders->OrderModes->find('list', ['limit' => 200]);
        $orderStatuses = $this->Orders->OrderStatuses->find('list', ['limit' => 200]);
        $this->set(compact('order', 'merchants', 'users', 'coupons', 'runners', 'orderModes', 'orderStatuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        $order->delete_status = 0;
        if ($this->Orders->save($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
