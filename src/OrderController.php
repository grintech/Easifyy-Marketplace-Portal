<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;
use App\Model\Table\UsersTable;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class OrderController extends AppController
{
    var $uses = array('Users');
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(array('index','login'));
       // $this->Auth->allow(array('add','login'));
    }
  
    public function index($serviceId=null,$serviceType) {
        $loguser = $this->request->session()->read('Auth.User');

        $this->loadModel('Products');
        //$result = $this->Products->get($id);
        //echo $results = $query->all();
        $query =$this->Products->find()->where(['id' => $serviceId])
                    ->limit(1);
        $service = $query->toArray();
        $this->set('service', $service);
        $this->set('loguser', $loguser);
        $this->set('serviceType',$serviceType);
        $this->viewBuilder()->setLayout('order');
    }

    public function add()
    {
        $this->viewBuilder()->setLayout(false);
        $this->loadModel('orders');
        $this->loadModel('orderItems');
        $order = $this->orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->orders->patchEntity($order, $this->request->getData());
            echo "<br>"; print_r($order);

            if ($this->orders->save($order)) {
                $myData=$this->request->getData();
                $myData["order_id"] = $order->id;
                $myData["subtotal"] = $myData->total;
                $orderItem = $this->orderItems->newEntity();
                echo "<br>";print_r($myData);
                $orderItem = $this->orderItems->patchEntity($orderItem, $myData, ['validate' => false]);
                echo "<br>"; dd($orderItem);die();
                if ($this->orderItems->save($orderItem)) {
                    $this->Flash->success(__('The order has been saved Successfully 1 .'));
                    return $this->redirect(array('controller' => 'Users', 'action' => 'order'));
                }
                $this->Flash->error(__('The order could not be saved. Please, try again 3.'));
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The order could not be saved. Please, try again 4. '));
            return $this->redirect($this->referer());
        }
    }
}
