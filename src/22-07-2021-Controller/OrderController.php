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

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Cake\Mailer\Email;

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
        $this->Auth->allow(array('index','add','login','sendpayments','partpayment'));
       // $this->Auth->allow(array('add','login'));
    }
  
    public function getMerchantUserId($merchant_id)
    {
        $this->loadModel('Merchants');
        $merchant = $this->Merchants->get($merchant_id);
        $merchant_user_id = $merchant->user_id;
        return $merchant_user_id;   
    }

    public function index($serviceId=null,$serviceType,$amountType) {
        $this->loadModel('Products');
        $this->loadModel('Faq');
        $loguser = $this->request->session()->read('Auth.User');
        
        $serviceId=base64_decode($serviceId);
        $serviceType=base64_decode($serviceType);
        $amountType=base64_decode($amountType);
        
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
        $faqs =$this->Faq->find()->all();

        $this->set('service', $service);
        $this->set('loguser', $loguser);
        $this->set('serviceType',$serviceType);
        $this->set('amountType',$amountType);
        $this->set('faqs',$faqs);
        $this->viewBuilder()->setLayout('order');
    }

    public function add()
    {
        $this->viewBuilder()->setLayout(false);
        $this->render(false);
        $this->loadModel('Users');
        $this->loadModel('orders');
        $this->loadModel('orderItems');
        $loguser = $this->request->session()->read('Auth.User');
        if ($this->request->is('post')) {
            
            $serviceName=$this->request->getData('serviceName');
            if(!is_null($loguser)){

                $order = $this->orders->newEntity();
                
                $order->merchant_id='0';
                $order->user_id=$loguser['id'];
                $order = $this->orders->patchEntity($order, $this->request->getData(), ['validate' => false]);
                if ($this->orders->save($order)) {
                    
                    $myData=$this->request->getData();
                    $myData["order_id"] = $order->id;
                    $myData["subtotal"] = $myData['total'];
                    $orderItem = $this->orderItems->newEntity();
                    $orderItem = $this->orderItems->patchEntity($orderItem,$myData, ['validate' => false]);

                    if($myData['amountType']== 0){
                        $serviceAmount = base64_encode($myData['booking_amount']);
                    }else{
                        $serviceAmount = base64_encode($myData['gross_total']);
                    }
                    //echo "<pre> in logged in ---- ". $serviceAmount.'----------'.$myData['booking_amount']."  ----";print_r($loguser );
                    //die();
                    if ($this->orderItems->save($orderItem)) {
                        return $this->redirect(['controller' => 'Order','action' => 'checkout','?'=>['userId'=>base64_encode($loguser['id']),'orderId'=>base64_encode($order->id),'p'=> $serviceAmount ,'s'=>base64_encode($serviceName)]]);
                    }else{
                        dd($orderItem->errors()); 
                    }
                    return $this->redirect(['controller' => 'Order','action' => 'checkout','?'=>['userId'=>base64_encode($user->id),'orderId'=>base64_encode($order->id),'p'=> $serviceAmount ,'s'=>base64_encode($serviceName)]]);
                }
            }else{
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);
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
                        if($myData['amountType']==0){
                            $serviceAmount = base64_encode($myData['booking_charges']);
                        }else{
                            $serviceAmount = base64_encode($myData['gross_total']);
                        }
                        if ($this->orderItems->save($orderItem)) {
                            return $this->redirect(['controller' => 'Order','action' => 'checkout','?'=>['userId'=>base64_encode($user->id),'orderId'=>base64_encode($order->id),'p'=>$serviceAmount,'s'=>base64_encode($serviceName)]]);
                        }else{
                            dd($orderItem->errors()); 
                        }
                        return $this->redirect(['controller' => 'Order','action' => 'checkout','?'=>['userId'=>base64_encode($user->id),'orderId'=>base64_encode($order->id),'p'=>$serviceAmount,'s'=>base64_encode($serviceName)]]);
                        $this->Flash->success(__('The order has been saved Successfully .'));
                        return $this->redirect($this->referer());
                    }
                }else{
                    $user = $this->Users->newEntity();
                    $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => true]);
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
                            if($myData['amountType']==0){
                                $serviceAmount = base64_encode($myData['booking_charges']);
                            }else{
                                $serviceAmount = base64_encode($myData['gross_total']);
                            }
                            if ($this->orderItems->save($orderItem)) {
                                $authUser = $this->Users->get($user->id)->toArray();
                                $this->Auth->setUser($authUser);
                                return $this->redirect(['controller' => 'Order','action' => 'checkout','?'=>['userId'=>base64_encode($user->id),'orderId'=>base64_encode($order->id),'p'=>$serviceAmount,'s'=>base64_encode($serviceName)]]);
                            }else{
                                dd($orderItem->errors()); 
                            }
                            $this->Flash->success(__('The order has been saved Successfully .'));
                            return $this->redirect($this->referer());
                        }
                    }
                }
            }

            dd($user->getErrors());
            $this->Flash->error(__('The order could not be saved. Please, try again 5. '));
            return $this->redirect($this->referer());
        }
    }
    
    public function checkout(){
        
        $this->loadModel('orders');
        $authUser = $this->request->session()->read('Auth.User');

        $userId=base64_decode($this->request->query('userId'));
        $orderId=base64_decode($this->request->query('orderId'));
        $price=base64_decode($this->request->query('p'));
        $service=base64_decode($this->request->query('s'));
        
        

        $order = $this->orders->find()->where(['id' =>$orderId])->first();

        $this->set('order', $order);
        $this->set('authUser', $authUser);
        $this->set('price', $price);
        $this->set('service', $service);
        $this->viewBuilder()->setLayout('order');
    }


    public function checkPaymentStatus(){
        $this->loadModel('Orders');
        $this->loadModel('OrderPayments');
        
        $id = $this->request->getData('order_id');
        $api_key='rzp_test_u7RqiXzsDwDofk';
        $api_secret='NYACLkyP2nxkT7g9AVvQNfnj';

        $success = true;
        $error = "Payment Failed";
        if (empty($_POST['razorpay_payment_id']) === false)
        {
            $api = new Api($api_key, $api_secret);
            try
            {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature']
                );
                $api->utility->verifyPaymentSignature($attributes);
            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }
        if ($success === true)
        {
            //$order['']
            $order = $this->Orders->get($id);
            $this->assignMerchant($order);

            $all_order_data = $this->Orders->get($id, [
                'contain' => ['Merchants', 'Users',
                            'Users.Addresses' => [
                                'fields' => [
                                    'Addresses.user_id',
                                    'Addresses.address_line_1',
                                    'Addresses.address_line_2',
                                    'Addresses.city_id',
                                    'Addresses.state_id',
                                    'Addresses.zip_code',
                                ]
                            ], 
                            'Coupons', 'Products','OrderModes', 'OrderItems', 'OrderStatuses','OrderPayments'],

            ]);            
            // echo '<pre>'; print_r($all_order_data); echo '</pre>';
            // die('Here123333');
            $order->razorpay_payment_id = $_POST['razorpay_payment_id'];
            $order->razorpay_order_id = $_SESSION['razorpay_order_id'];
            $order->razorpay_signature = $_POST['razorpay_signature'];
            $session= date("Y",strtotime("-1 year"))."-".$curYear = date("y");

            $order->invoice_id=$id."/".$session."/EASIFYY";
            $order->order_status_id = 1;

            if ($result=$this->Orders->save($order)) {
                $this->sendOrderEmails($all_order_data);
                $id=$result->id;
                $order = $this->Orders->get($id);
                
                $orderPayment = $this->OrderPayments->newEntity();
                $orderPayment->order_id = $id ;
                $orderPayment->user_id = $order->user_id;
                $orderPayment->merchant_id = 6;
                if($order->is_booking == 1) {
                    $orderPayment->amount = $order->booking_amount;
                } else {
                    $orderPayment->amount = $order->gross_total;
                }
                // $orderPayment->razorpay_order_id = $_SESSION['razorpay_order_id'].'.'.$order->razorpay_order_id;
                $orderPayment->razorpay_order_id = $_SESSION['razorpay_order_id'];
                $orderPayment->razorpay_payment_id = $_POST['razorpay_payment_id'] ;
                $orderPayment->razorpay_signature =  $_POST['razorpay_signature'];
                $orderPayment->transactionId = $id ;
                $orderPayment->transaction_date = time();
                $orderPayment->transaction_status = 1 ;
                $orderPayment->delete_status = 1;
                
                $this->OrderPayments->save($orderPayment);
                // if() {
                //     die('SAVED');
                // } else {
                //     debug($orderPayment->errors());
                //     die('NOT SAVED');
                // }
                $this->Flash->success(__('The Payment has been Done Successfully .'));
            }else{
                dd('error while saving data');
            }
        }
        else
        {
            $this->Flash->error(__('Error occured while transaction '));
        }
        //return $this->redirect($this->referer());
        return $this->redirect(['controller' => 'Order', 'action' => 'thankyou']);
    }

    public function recievePendingPayment(){
        $this->loadModel('Orders');
        $this->loadModel('OrderPayments');
        $this->loadModel('Notifications');
        $this->loadModel('Merchants');

        $id = $this->request->getData('order_id');
        /* Order Payment Ends */

        $api_key='rzp_test_u7RqiXzsDwDofk';
        $api_secret='NYACLkyP2nxkT7g9AVvQNfnj';

        $success = true;
        $error = "Payment Failed";
        if (empty($_POST['razorpay_payment_id']) === false)
        {
            $api = new Api($api_key, $api_secret);
            try
            {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature']
                );
                $api->utility->verifyPaymentSignature($attributes);
            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }
        if ($success === true)
        {
            //$order['']
            $order = $this->Orders->get($id);
            $this->assignMerchant($order);

            /* Order Payment Starts */
            $orderPayment = $this->OrderPayments->newEntity();
            $orderPayment->order_id = $id ;
            $orderPayment->user_id = $order->user_id;
            $orderPayment->merchant_id = $order->merchant_id;
            $orderPayment->amount = $order->gross_total - $order->booking_amount;
            // $orderPayment->razorpay_order_id = $_SESSION['razorpay_order_id'].'.'.$order->razorpay_order_id;
            $orderPayment->razorpay_order_id = $_SESSION['razorpay_order_id'];
            $orderPayment->razorpay_payment_id = $_POST['razorpay_payment_id'] ;
            $orderPayment->razorpay_signature =  $_POST['razorpay_signature'];
            $orderPayment->transactionId = $id ;
            $orderPayment->transaction_date = time();;
            $orderPayment->transaction_status = 1 ;
            $orderPayment->delete_status = 1;
            //$this->OrderPayments->save($orderPayment);
            if($this->OrderPayments->save($orderPayment)) {
                //die('SAVED');
            } else {
                //debug($orderPayment->errors());
                //die('NOT SAVED');
            }

            //print_r($orderPayment->errors());

            $merchant = $this->Merchants->find('all')
            ->where(['Merchants.id' => $order->merchant_id])
            ->select(['user_id'])
            ->first();
            if( $merchant ){
                $pspUserId= $merchant->user_id;
            }

            /* order notification starts here*/
            $orderNotification = $this->Notifications->newEntity();
            $orderNotification->user_id=$pspUserId;
            $orderNotification->order_id=$id;
            $orderNotification->type="dues-clear";
            $orderNotification->message="Dues cleared from the client against the OrderID ";
            $orderNotification->viewed_status= 0; 
            $this->Notifications->save($orderNotification);

            $orderNotification = $this->Notifications->newEntity();
            $orderNotification->user_id=1;
            $orderNotification->order_id=$id;
            $orderNotification->type="dues-clear";
            $orderNotification->message="Dues cleared from the client against the OrderID #".$id;
            $orderNotification->viewed_status= 0; 
            $this->Notifications->save($orderNotification);
            /* order notification ends here*/


            $all_order_data = $this->Orders->get($id, [
                'contain' => ['Merchants', 'Users',
                            'Users.Addresses' => [
                                'fields' => [
                                    'Addresses.user_id',
                                    'Addresses.address_line_1',
                                    'Addresses.address_line_2',
                                    'Addresses.city_id',
                                    'Addresses.state_id',
                                    'Addresses.zip_code',
                                ]
                            ], 
                            'Coupons', 'Products','OrderModes', 'OrderItems', 'OrderStatuses'],
            ]);            
            //echo '<pre>'; print_r($all_order_data); echo '</pre>';
            //die('Here123333');
            $order->total = $order->gross_total;
            $order->razorpay_payment_id = $_POST['razorpay_payment_id'];
            $order->razorpay_order_id = $_SESSION['razorpay_order_id'];
            $order->razorpay_signature = $_POST['razorpay_signature'];
            $session= date("Y",strtotime("-1 year"))."-".$curYear = date("y");

            $order->invoice_id=$id."/".$session."/EASIFYY";
            if ($this->Orders->save($order)) {
                $this->paymentNotificationtoPsp($all_order_data);
                $this->Flash->success(__('The Payment has been Done Successfully .'));
            }else{
                dd('error while saving data');
            }
        }
        else
        {
            $this->Flash->error(__('Error occured while transaction '));
        }
        //return $this->redirect($this->referer());
        return $this->redirect(['controller' => 'Order', 'action' => 'thankyou']);
    }

    public function paymentNotificationtoPsp($orderData){
        if($orderData->merchant->username !=""){
            $this->viewBuilder()->setLayout(false);
            $email = new Email();
            $email
                ->template('easify-order-payment-notification','easify') //->template('template','layout')
                ->setViewVars(
                            [
                                'vendor' => $orderData->user->first_name,
                                'job_title' => $orderData->product->title,
                                'job_price' => $orderData->gross_total,
                                'paid_Amt' => $orderData->gross_total,
                                'pending_Amt' => 0,
                            ]
                        )
                ->emailFormat('html')
                ->from(['connect@easifyy.com' => 'Easifyy'])
                ->to($orderData->merchant->username)
                ->bcc('vinit.grintech@gmail.com')
                ->subject('Dues cleared from user - Easifyy')
                ->send($msg);
            //dd($order);
        }
    }

    public function sendpayments(){
        $url="https://api.razorpay.com/v1/payments/pay_GhNJmauOk8vYaa/transfers";
        $fields = array();
        $api_key='rzp_test_u7RqiXzsDwDofk';
        $api_secret='NYACLkyP2nxkT7g9AVvQNfnj';
        $api = new Api($api_key, $api_secret);
        $payment_id="pay_GhNJmauOk8vYaa";
        $transfer = $api->payment->fetch($payment_id)->transfer(array(
            'transfers' => [
                [
                'account' => '31901339801',
                'amount' => 100,
                'currency' => 'INR'
              ]
             ]
            )
        );

        print_r($transfer);
        die();
        $fields=array(
            "transfers" => array(
            'account' => '318901339901',
            'amount' => '2000',
            'currency' => "INR",
            'on_hold' => false,
            "notes"=> array(
                "branch"=> "Acme Corp Bangalore North",
                "name"=> "Gaurav Kumar"
            ),
        ));
        echo "<pre>".print_r($fields)."";
        //$fields = array_merge($fields,$transfers);
        //echo "<hr><hr><pre>".print_r($fields)."</pre>";
        echo "<hr> ---".(json_encode($fields));
        echo "---<hr>";
        $data= $this->getData($url,$fields);
        print_r($data);
        die();
    }

    function getData($myUrl,$data){
        $ch = curl_init();
        $api_key='rzp_test_u7RqiXzsDwDofk';
        $api_secret='NYACLkyP2nxkT7g9AVvQNfnj';

        curl_setopt($ch, CURLOPT_URL,$myUrl );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $api_key.":". $api_secret);
        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($ch);
    
        if (empty($data) OR (curl_getinfo($ch, CURLINFO_HTTP_CODE != 200))) {
           $data = FALSE;
        } else {
            return json_decode($data, TRUE);
        }
        curl_close($ch);
    }

    public function inProgress($id = null)
    {
        $this->viewBuilder()->setLayout('user');
        $user_id = $this->Auth->user('id');

        $this->loadModel('Orders');
        $order = $this->Orders->find('all')
                ->where([ 'Orders.user_id' => $user_id,'Orders.delete_status' => 1,'OR' => [['Orders.order_status_id' => 1], ['Orders.order_status_id' => 2]]])
                ->contain(['Merchants', 'Users','Products','Coupons', 'Products','OrderModes','OrderStatuses'])
                ->order(['Orders.created' => 'DESC'])
                ->all();
        //dd( $order );
        $this->set('order', $order);
    } 

    public function completed($id = null)
    {
        $this->viewBuilder()->setLayout('user');
        $user_id = $this->Auth->user('id');

        $this->loadModel('Orders');
        $order = $this->Orders->find('all')
                ->where([ 'Orders.user_id' => $user_id,'Orders.delete_status' => 1,'OR' => [['Orders.order_status_id' => 3], ['Orders.order_status_id' => 7]]])
                ->contain(['Merchants', 'Users','Products','Coupons', 'Products','OrderModes','OrderStatuses'])
                ->order(['Orders.created' => 'DESC'])
                ->all();
        //dd( $order );
        $this->set('order', $order);
    } 

    public function refunded($id = null)
    {
        $this->viewBuilder()->setLayout('user');
        $user_id = $this->Auth->user('id');

        $this->loadModel('Orders');
        $order = $this->Orders->find('all')
                ->where([ 'Orders.user_id' => $user_id,'Orders.delete_status' => 1,'Orders.order_status_id' => 7])
                ->contain(['Merchants', 'Users','Products','Coupons', 'Products','OrderModes','OrderStatuses'])
                ->order(['Orders.created' => 'DESC'])
                ->all();
        //dd( $order );
        $this->set('order', $order);
    }

    public function partpayment($id = null)
    {
        $this->viewBuilder()->setLayout('user');

        $this->loadModel('orders');
        $this->loadModel('users');

        $orderId=base64_decode($this->request->query('order'));
        $price=base64_decode($this->request->query('p'));
        $service=base64_decode($this->request->query('s'));

        $order = $this->orders->find()->where(['id' =>$orderId])->first();
        $user= $this->users->get($order->user_id);
        //dd($user);
        $this->Auth->setUser($user);

        $authUser = $this->request->session()->read('Auth.User');
        //dd( $order);
        $this->set('order', $order);
        $this->set('authUser', $authUser);
        $this->set('price', $price);
        $this->set('service', $service);

    } 


    public function thankyou() {
        $this->viewBuilder()->setLayout('user');

    }
    public function summery() {
        $this->loadModel('Reviews');
        $this->viewBuilder()->setLayout('user');
        $user_id = $this->Auth->user('id');
        $this->loadModel('Orders');
        $this->loadModel('Notifications');

        $status = $this->Orders->find('all')
                ->where([ 'Orders.id' => base64_decode($_GET['order_id']),'Orders.delete_status' => 1])
                ->contain(['Merchants', 'Users','Products','Coupons', 'Products','OrderModes','OrderStatuses','Reviews'])
                ->first();
        //dd($status);
        $reviews = $this->Reviews->find('all')->contain([
            'Merchants' => [
                'fields' => [
                    'Merchants.store_name',
                    'Merchants.last_name',
                    'Merchants.username',
                ]
            ],
            ])
        ->where([ 'Reviews.order_id'=> base64_decode($_GET['order_id']),'Reviews.delete_status'=> 1])
        ->order(['Reviews.id' => 'DESC'])
        ->all()->toArray();

        $this->loadModel('OrderNotifications');
        $order = $this->OrderNotifications->find('all')
            ->where([ 'OrderNotifications.order_id' => base64_decode($_GET['order_id']),'OrderNotifications.user_id' => $user_id,
                      'OrderNotifications.type' => 'admin_notes','OrderNotifications.delete_status' => 1 ])
            ->all();

        $query = $this->Notifications->query();
        $query->update()
            ->set(['viewed_status' => 1])
            ->where(['order_id' =>  base64_decode($_GET['order_id']),'type'=>'msg-from-psp-to-user'])
            ->execute();

        $query = $this->Notifications->query();
        $query->update()
            ->set(['viewed_status' => 1])
            ->where(['order_id' =>  base64_decode($_GET['order_id']),'type'=>'pending-payment-from-user'])
            ->execute();
    
        //dd($status);
        $this->set('order', $order);
        $this->set('status', $status);
        $this->set('reviews', $reviews);
    } 

    public function review() {
        $this->viewBuilder()->setLayout('user');
        $this->loadModel('Orders');
        $this->loadModel('Reviews');
        //$vendor_user_id = $this->Auth->user('id');
        //$merchant_id= $this->getMerchantIdByUserId($vendor_user_id);
        $user_id=base64_decode($_GET['user']);
        $order_id=base64_decode($_GET['order']);
        if ($this->request->is('post')) {
            //dd($this->request->getData('review_id'));
            //$review = $this->Reviews->newEntity();
            $review =  $this->Reviews->get($this->request->getData('review_id'));

            //echo "<pre>";print_r($this->request->getData());echo "</pre>";
            $review = $this->Reviews->patchEntity($review, $this->request->getData());
            $review->updated=date("Y-m-d H:i:s");
            if ($this->Reviews->save($review)) {

                $user_id=base64_encode($this->request->getData('user_id'));
                $order_id=base64_encode($this->request->getData('order_id'));
                $this->Flash->success(__('The Review has been saved.'));
                return $this->redirect(['action' => 'review', '?' => ['user' =>  $user_id,'order' => $order_id]]);
            }
        }

        $reviews = $this->Reviews->find('all')->contain([
                    'Merchants' => [
                        'fields' => [
                            'Merchants.store_name',
                            'Merchants.last_name',
                            'Merchants.username',
                        ]
                    ],
                    
                    ])
                ->where([ 'Reviews.user_id' => $user_id,'Reviews.order_id'=> $order_id,'Reviews.delete_status'=> 1])
                ->order(['Reviews.id' => 'DESC'])
                ->all()->toArray();
        $PSPreviews = $this->Reviews->find('all')->contain([
                    'Merchants' => [
                        'fields' => [
                            'Merchants.store_name',
                            'Merchants.last_name',
                            'Merchants.username',
                        ]
                    ],
                    'Users' => [],
                    ])
                ->where([ 'Reviews.user_id' => $user_id,'Reviews.order_id'=> $order_id,'Reviews.delete_status'=> 1])
                ->order(['Reviews.id' => 'DESC'])
                ->all()->toArray();
        //dd($reviews);
        $partPaymentView=$_GET['reViewDocs'];
        if(!is_null($partPaymentView)){
            $this->loadModel('Notifications');
            $query = $this->Notifications->query();
            $query->update()
                ->set(['viewed_status' => 1])
                ->where(['order_id' =>  $order_id,'type'=>'order-marked-completed-by-psp'])
                ->execute();
        }
        $order = $this->Orders->get($order_id);

        $this->set(compact('reviews','PSPreviews','order'));

    }

    public function history($id = null)
    {
        $this->viewBuilder()->setLayout('user');
    }



    public function userReply() {
        $this->autoRender = false;
        $this->loadModel('Notifications');
        $user_id = $this->Auth->user('id');

        // $status = $_POST['status'];
        $users= $this->loadModel('OrderNotifications');
        $user = $users->get($_POST['id']);
        $paymentReply =$_POST['payment_reply'];
        $link=$_POST['link'];
        $user->link = $link;
        $user->payment_reply = $paymentReply;
         
        $merchant_id = $user->merchant_id;
        $order_id = $user->order_id;

        //$products= $this->loadModel('Products');
        // echo '<pre>'; print_r($products_data); echo '</pre>';
        // die('Here');   
        
         if($users->save($user)) {
            $merchant_user_id = $this->getMerchantUserId($merchant_id);
            $orderNotification = $this->Notifications->newEntity();
            $orderNotification->user_id= $merchant_user_id;
            $orderNotification->order_id=$order_id;
            $orderNotification->type="msg-from-user-to-psp";
            $orderNotification->message="Admin Notes from User to PSP";
            $orderNotification->viewed_status= 0; 
            $this->Notifications->save($orderNotification);
            
            $userData= $this->get_user_email( $merchant_user_id );
            $userEmail = explode("|", $userData)[0];
            $userName = explode("|", $userData)[1];

            $senderData= $this->get_user_email( $user_id  );
            $senderName = explode("|", $senderData)[1];

            $this->sendOrderNotesEmails($userEmail,$senderName,"New Message From User",trim($_POST['payment_reply']));

            echo 'Save';
         } else {
            echo 'Not Save';
         }
        
    }

    public function uploaddoc(){
        $this->autoRender = false;
        if (!empty($_FILES)) {
            $extension=array("jpeg","jpg","png","gif","pdf","txt",'.doc');
            foreach($_FILES as $key=>$tmp_name) {
                $time= time();
                $file_name=$time."_".$_FILES[$key]["name"];
                $file_tmp=$_FILES[$key]["tmp_name"];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                //echo $file_name;
                if(in_array($ext,$extension)) {
                    if(!file_exists(WWW_ROOT ."order_docs/".$file_name)) {
                        move_uploaded_file($file_tmp, WWW_ROOT . 'order_docs/'.$file_name);
                        echo $file_name;
                    }
                    else {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp, WWW_ROOT . 'order_docs/'.$newFileName);
                        echo $file_name;
                    }
                }
                else {
                    array_push($error,"$file_name, ");
                }
            }
        }
    }

    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('user');

        $this->loadModel('Products');
        $this->loadModel('Orders');
        $token = $this->request->getParam('_csrfToken');
        $sGst=$cGst=$iGst=0;
        $id = base64_decode($id);
        //dd($id);
        $order = $this->Orders->get($id, [
            'contain' => ['Users',
                            'Users.Addresses' => [
                                'fields' => [
                                    'Addresses.user_id',
                                    'Addresses.state_id',
                                ]
                            ],'Coupons','OrderModes','OrderStatuses', 'CouponRedeems', 'MerchantPayouts','OrderPayments'
                        ],
        ]);
        //
        $orderViewd=$_GET['viewed'];
        if(!is_null($orderViewd)){
            $orders= $this->Orders;
            $order = $orders->get($id);
            $order->user_view = 1;
            $orders->save($order);
        }

        $orderViewd=$_GET['isView'];
        if(!is_null($orderViewd)){
            $this->loadModel('Notifications');
            $query = $this->Notifications->query();
            $query->update()
                ->set(['viewed_status' => 1])
                ->where(['order_id' =>  $id,'type'=>'msg-from-psp-to-user'])
                ->execute();
        }

        $duesClear=$_GET['duesClear'];
        if(!is_null($duesClear)){
            $this->loadModel('Notifications');
            $query = $this->Notifications->query();
            $query->update()
                ->set(['viewed_status' => 1])
                ->where(['order_id' =>  $id,'type'=>'dues-clear'])
                ->execute();
        }

        $orderViewd=$_GET['orderAccepted'];
        if(!is_null($orderViewd)){
            $this->loadModel('Notifications');
            $query = $this->Notifications->query();
            $query->update()
                ->set(['viewed_status' => 1])
                ->where(['order_id' =>  $id,'type'=>'inivation-accepted'])
                ->execute();
        }

        $product_id=$order->product_id;
        $order_product = $this->Products->find('all')
                ->where([ 'Products.id' => $product_id ])
                ->first();
              
        $this->set('order_product',$order_product);        
        $this->set('order', $order);
        $this->set('order_statuses', $order_statuses);
        $this->set('token', $token);

    }

    public function cancelRequest(){
        $this->autoRender = false;
        $this->loadModel('Orders');
        if ($this->request->is('post')) {
            //dd($this->request->getData('cancel_request'));
            $orderId = $this->request->getData('orderId');

            $msgfromUser = $this->request->getData('cancel_request'); 
            $order = $this->Orders->get($orderId, [
                'contain' => ['Merchants','Users','Products'],
            ]);
            $order->user_cancel_msg=$msgfromUser;
            $order->user_canceled_at=date("Y-m-d H:i:s");
            $this->Orders->save($order);
            $email = new Email();
            $email
                ->template('easify-order-cancel-request-psp','easify') //->template('template','layout')
                ->setViewVars(
                            [
                                'vendor' => $order->user->first_name,
                                'job_title' => $order->product->title,
                                'job_price' => $order->gross_total,
                                'paid_Amt' => $order->total,
                                'msgfromPSP'=> $msgfromUser,
                                'userType' => 'User',
                            ]
                        )
                ->emailFormat('html')
                ->from(['connect@easifyy.com' => 'Easifyy'])
                ->to($order->merchant->username)
                ->bcc('easifyy@gmail.com')
                ->bcc('vinit.grintech@gmail.com')
                ->subject('Order Cancel Request from User')
                ->send($msg);
                $this->Flash->success(__('Message Sent Successfully To Easiffy!'));
                $orderId = base64_encode($this->request->getData('orderId'));
                $user_id = base64_encode($this->request->getData('user'));

                return $this->redirect(['action' => 'review', '?' => ['user' =>  $user_id,'order' => $orderId]]);
        }
    }
}
