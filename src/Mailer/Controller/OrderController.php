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
        $this->Auth->allow(array('index','add','login'));
       // $this->Auth->allow(array('add','login'));
    }
  
    public function index($serviceId=null,$serviceType) {
        $loguser = $this->request->session()->read('Auth.User');
        //dd(base64_decode($serviceId)."+".base64_decode($serviceType));
        //dd(base64_decode($serviceType));
        $serviceId=base64_decode($serviceId);
        $serviceType=base64_decode($serviceType);
        $this->loadModel('Products');
        //$result = $this->Products->get($id);
        //echo $results = $query->all();
        $query =$this->Products->find()->where(['id' => $serviceId])->contain([
                        'ProductPlans' => [
                            'fields' => [
                                'ProductPlans.product_id',
                                'ProductPlans.heading',
                                'ProductPlans.price',
                                'ProductPlans.taxable',
                                'ProductPlans.price',
                                'ProductPlans.type'
                            ]
                        ]
                    ])->limit(1);
        $service = $query->toArray();
        $this->set('service', $service);
        $this->set('loguser', $loguser);
        $this->set('serviceType',$serviceType);
        $this->viewBuilder()->setLayout('order');
    }

    public function add()
    {
        $this->viewBuilder()->setLayout(false);
        $this->loadModel('Users');
        $this->loadModel('orders');
        $this->loadModel('orderItems');
        if ($this->request->is('post')) {
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => false]);
            $user->user_profile_image='';
            $user->role='user';
            if ($result = $this->Users->save($user)) {
                $order = $this->orders->newEntity();
                $order->merchant_id='0';
                $order->user_id=$user->id;
                $order = $this->orders->patchEntity($order, $this->request->getData(), ['validate' => false]);
                if ($this->orders->save($order)) {
                    $myData=$this->request->getData();
                    $myData["order_id"] = $order->id;
                    $myData["subtotal"] = $myData['total'];
                    $orderItem = $this->orderItems->newEntity();
                    $orderItem = $this->orderItems->patchEntity($orderItem,$myData, ['validate' => false]);
                    if ($this->orderItems->save($orderItem)) {
                        $this->Flash->success(__('The order has been saved Successfully  .'));
                        //return $this->redirect(array('controller' => 'Users', 'action' => 'order'));
                        return $this->redirect($this->referer());
                    }else{
                        dd($orderItem->errors()); 
                    }
                    $this->Flash->success(__('The order has been saved Successfully .'));
                    return $this->redirect($this->referer());
                }
                dd($order->getErrors());
                $this->Flash->error(__('User Saved  '));
            }
            dd($user->getErrors());
            $this->Flash->error(__('The order could not be saved. Please, try again 5. '));
            return $this->redirect($this->referer());
        }
    }
}
