<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\Table;
use App\Model\Entity\Role;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\View\Helper\BreadcrumbsHelper;
use Cake\Mailer\Email;

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
                'contain' => ['Merchants', 'Users', 'Coupons', 'Runners', 'OrderModes', 'OrderStatuses'],
                'conditions' => [
                                'Orders.delete_status'=>1,
                                'Orders.merchant_id'=>$merchantData->id
                            ],
            ];
        }
        


        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }

    public function inProgress($id = null) {
		//die('Here');
        $user_id = $this->Auth->user('id');
        $merchant_id= $this->getMerchantIdByUserId($user_id);

        $order = $this->Orders->find('all')
            ->where([ 'Orders.merchant_id' => $merchant_id,'order_status_id' => 2,'Orders.delete_status' => 1 ])
            ->contain([
                'Products' => [
                    'fields' => [
                        'Products.title',
                        'Products.slug'
                    ]
                ],
                'OrderModes' => [],
                'Users' => [],
                'OrderItems' => [],
                'OrderStatuses' => [],
                'Coupons' => [],
            ])
            ->order(['Orders.created' => 'DESC'])
            ->all();
        //dd($order);
        $this->set('order', $order);
        //echo '<pre>'; print_r($order); echo '</pre>';   
        //die(); 
    } 

    public function completed($id = null)
    {
        $user_id = $this->Auth->user('id');
        $merchant_id= $this->getMerchantIdByUserId($user_id);

        $order = $this->Orders->find('all')
            ->where([ 'Orders.merchant_id' => $merchant_id,'order_status_id' => 3,'Orders.delete_status' => 1, ])
            ->contain([
                'Products' => [
                    'fields' => [
                        'Products.title',
                        'Products.slug'
                    ]
                ],
                'OrderModes' => [],
                'OrderItems' => [],
                'OrderStatuses' => [],
            ])
            ->order(['Orders.created' => 'DESC'])
            ->all();
        $this->set('order', $order);
    } 

    public function history($id = null)
    {
        $user_id = $this->Auth->user('id');
        $merchant_id= $this->getMerchantIdByUserId($user_id);

        $order = $this->Orders->find('all')
            // ->where([ 'Orders.merchant_id' => $merchant_id,'order_status_id' => 7, ])
            ->where([ 'Orders.merchant_id' => $merchant_id,])
            ->contain([
                'Products' => [
                    'fields' => [
                        'Products.title',
                        'Products.slug'
                    ]
                ],
                'OrderModes' => [],
                'OrderItems' => [],
                'OrderStatuses' => [],
            ])
            ->order(['Orders.created' => 'DESC'])
            ->all();
        //dd($order);    
        $this->set('order', $order);
    } 

    public function refunded($id = null)
    {
        $user_id = $this->Auth->user('id');
        $merchant_id= $this->getMerchantIdByUserId($user_id);
        $this->loadModel('Orders');
        $order = $this->Orders->find('all')
                ->where([ 'Orders.merchant_id' => $merchant_id,'Orders.delete_status' => 1,'Orders.order_status_id' => 7])
                ->contain(['Merchants', 'Users','Products','Coupons', 'Products','OrderModes','OrderStatuses'])
                ->order(['Orders.created' => 'DESC'])
                ->all();
        //dd( $order );
        $this->set('order', $order);
    }
    public function review() {
        $this->loadModel('Reviews');
        $this->loadModel('Orders');
        $UserReview="";
        $vendor_user_id = $this->Auth->user('id');
        $merchant_id= $this->getMerchantIdByUserId($vendor_user_id);
        $user_id=base64_decode($_GET['user']);
        $order_id=base64_decode($_GET['order']);
        
        if ($this->request->is('post')) {
            $review = $this->Reviews->newEntity();
            //echo "<pre>";print_r($this->request->getData());echo "</pre>";
            $review = $this->Reviews->patchEntity($review, $this->request->getData());
            $review->reviewer_type='psp';
            $review->project_files=$this->request->getData('project_files');
            if ($this->Reviews->save($review)) {
                $user_id=base64_encode($this->request->getData('user_id'));
                $order_id=base64_encode($this->request->getData('order_id'));
                //$order = $this->Orders->get($order_id);
                $this->loadModel('Notifications');
                $orderNotification = $this->Notifications->newEntity();
                $orderNotification->user_id=$this->request->getData('user_id');
                $orderNotification->order_id=$this->request->getData('order_id');
                $orderNotification->type="order-marked-completed-by-psp";
                $orderNotification->message="Order marked as completed by PSP";
                $orderNotification->viewed_status= 0; 
                $this->Notifications->save($orderNotification);

                $this->Flash->success(__('Order Documents Sent to user Successfully.'));
                return $this->redirect(['action' => 'review', '?' => ['user' =>  $user_id,'order' => $order_id]]);
            }
        }
        $reviews = $this->Reviews->find('all')->contain([
                    'Users' => [
                        'fields' => [
                            'Users.first_name',
                            'Users.last_name',
                            'Users.username',
                        ]
                    ],
                    'Merchants' => [

                    ],
                    ])
                ->where([ 'Reviews.merchant_id' => $merchant_id,'Reviews.order_id'=> $order_id,'Reviews.delete_status'=> 1])
                ->order(['Reviews.id' => 'DESC'])
                ->all()->toArray();
        //dd($reviews);
        $UserReview = $this->Reviews->find('all')->where([ 'Reviews.order_id'=> $order_id])
        ->order(['Reviews.id' => 'ASC'])
        ->first();
        
        
        $order = $this->Orders->get($order_id);
        $total_star=$reviews[0]['rating'];
        
        $this->set(compact('reviews', 'merchant_id','UserReview','order','total_star'));
        //$this->set(array('merchant_id' => $merchant_id));

    }
    
    public function summery(){
        $dueAmount=0;$orderCompleted=false;
        $token = $this->request->getParam('_csrfToken');
        $vendor_user_id = $this->Auth->user('id');
        $merchant_id= $this->getMerchantIdByUserId($vendor_user_id);
        $user_id=base64_decode($_GET['user']);
        $order_id=base64_decode($_GET['order']);

        $orderPayment = $this->Orders->get($order_id);
        // if($orderPayment->coupon_id==""){
        //     $dueAmount = $orderPayment->gross_total-$orderPayment->total;
        // }
        if($orderPayment->order_status_id==3) {
            $orderCompleted=true;
        }
        $this->loadModel('OrderNotifications');
        $order = $this->OrderNotifications->find('all')
            ->where([ 'OrderNotifications.order_id' => $order_id,'OrderNotifications.user_id' => $user_id,
                      'OrderNotifications.type' => 'admin_notes', 'OrderNotifications.merchant_id' => $merchant_id,
                      'OrderNotifications.delete_status' => 1
                      ]
            )->order(['OrderNotifications.id' => 'ASC'])->all();
        if($orderPayment->is_booking==0) {
            $dueAmount =$orderPayment->gross_total-$orderPayment->gross_total ;
        } else {
            $dueAmount =$orderPayment->gross_total-$orderPayment->total;
        }
        
        $this->set(array('merchant_id' => $merchant_id, 'token' => $token, 'orderCompleted'=> $orderCompleted,
                        'order_notes' => $order ,'dueAmount'=> $dueAmount,'order_id'=> $order_id));

    }

    public function ordernotes() {
        $this->autoRender = false;

        $this->loadModel('Notifications');

        $admin_user_id = $this->Auth->user('id');
        $merchant_id= $this->getMerchantIdByUserId($admin_user_id);
        //,'_doc_name'=>$_POST['doc_name']
        $message=array('status'=>$_POST['status'],'comment'=>$_POST['comment'],'doc_name'=>$_POST['doc_name']);
        $message=serialize($message);

        $data = [
            [
                'user_id'=>base64_decode($_POST['user_id']),
                'merchant_id'=>$merchant_id,
                'order_id'=>base64_decode($_POST['order_id']),
                'type'=>'admin_notes',
                'message'=>$message,
            ],
        ];
        
        $articles = TableRegistry::get('OrderNotifications');
        $entities = $articles->newEntities($data);
        
        if($result = $articles->saveMany($entities)) {
            $orderNotification = $this->Notifications->newEntity();
            $orderNotification->user_id=base64_decode($_POST['user_id']);
            $orderNotification->order_id=base64_decode($_POST['order_id']);
            $orderNotification->type="msg-from-psp-to-user";
            $orderNotification->message="Admin Notes from PSP to User";
            $orderNotification->viewed_status= 0; 
            $this->Notifications->save($orderNotification);

            $userData= $this->get_user_email( base64_decode($_POST['user_id']) );
            $userEmail = explode("|", $userData)[0];
            $userName = explode("|", $userData)[1];
            $pspData= $this->get_user_email( $admin_user_id  );
            $senderName = explode("|", $pspData)[1];
            $this->sendOrderNotesEmails($userEmail,$senderName,"New Message From PSP",trim($_POST['comment']));
            echo 'success';
        } else {
            print_r($result);
            //debug($articles->validationErrors); 
            die();
            echo 'error';
        }
        echo $result;
    }

    public function uploadprojectdocs(){
        $this->autoRender = false;
        $i=0;
        $projectFiles='';
        if (!empty($_FILES)) {
            //print_r($_FILES);
            $extension=array("jpeg","jpg","png","gif","pdf","txt",'.doc');
            for($i=0;$i<count($_FILES['file']["name"]);$i++) {
                //echo "fileName--------- ".count($_FILES['file']["name"])." ---------------";
                $time= time();
                $file_name=$time."_".$_FILES['file']["name"][$i];
                $file_tmp=$_FILES['file']["tmp_name"][$i];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                //echo $file_name;
                if(in_array($ext,$extension)) {
                    if(!file_exists(WWW_ROOT ."order_docs/".$file_name)) {
                        move_uploaded_file($file_tmp, WWW_ROOT . 'order_docs/'.$file_name);
                        //echo '----'.$file_name;
                        if($projectFiles!=""){
                            $projectFiles=$projectFiles."|".$file_name;
                        }else{
                            $projectFiles=$file_name;
                        }
                        //array_push($projectFiles,$file_name);
                    }
                }
                else {
                    array_push($error,"$file_name, ");
                }
            }
            echo $projectFiles;
        }
    }

    public function removeprojectdocs(){
        $this->autoRender = false;
        $i=0;
        $projectFiles='';
        unlink($_POST['path']);
    }

    public function uploaddoc(){
        $this->autoRender = false;
        if (!empty($_FILES)) {
            $extension=array("jpeg","jpg","png","gif","pdf","txt",'doc');
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
    
    public function payment() {    	
		$token = $this->request->getParam('_csrfToken');
        $vendor_user_id = $this->Auth->user('id');
        $merchant_id= $this->getMerchantIdByUserId($vendor_user_id);
        $user_id=base64_decode($_GET['user']);
        $this->set(array('merchant_id' => $merchant_id, 'token' => $token));

        $this->loadModel('OrderNotifications');
        $order = $this->OrderNotifications->find('all')
            ->where([ 'OrderNotifications.order_id' => base64_decode($_GET['order']),'OrderNotifications.type' => 'superadmin_notes'])
            ->all();
        
	    $this->set('order',$order);        
    }

    public function superadminnotes() {

        $this->loadModel('Notifications');

        $this->autoRender = false;
        $admin_user_id = $this->Auth->user('id');
        $merchant_id= $this->getMerchantIdByUserId($admin_user_id);
        $dataid=$_POST['dataid']; 

        $message=array('prefix'=>$_POST['prefix'],'amount'=>$_POST['amount']);
        $message=serialize($message);
        $data = [
            [
                'user_id'=>base64_decode($_POST['user_id']),
                'merchant_id'=>$merchant_id,
                'order_id'=>base64_decode($_POST['order_id']),
                'type'=>'superadmin_notes',
                'message'=>$message
            ],
        ];
        $articles = TableRegistry::get('OrderNotifications');
        $entities = $articles->newEntities($data);
        $msg  = 'Hello, Easifyy';
        $msg .= '<br>';
        $msg .= '<br>';
        $msg .= 'Payment Request For Order ID #'.' '.base64_decode($_POST['order_id']);
        $msg .= '<br>';
        $msg .= '<br>';
        $msg .= 'Thanks';

        $email = new Email();
        $email
            ->template('default','easify') //->template('template','layout')
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to('easifyy@gmail.com')
            ->bcc('vinit.grintech@gmail.com')
            ->subject('Please clear the payment '.' '.base64_decode($_POST['order_id']))
            ->send($msg);

        if($result = $articles->saveMany($entities)) {
            $orderNotification = $this->Notifications->newEntity();
            $orderNotification->user_id=$admin_user_id;
            $orderNotification->order_id=base64_decode($_POST['order_id']);
            $orderNotification->type="payment-from-easifyy";
            $orderNotification->message="Please clear the payment ";
            $orderNotification->viewed_status= 0; 
            $this->Notifications->save($orderNotification);

            echo 'success';
        } else {
             echo 'error';
        }
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
        $this->loadModel('States');
        $token = $this->request->getParam('_csrfToken');
        $sGst=$cGst=$iGst=0;
        $id = base64_decode($id);
        $merchantData = $this->getMerchantId();
        //dd($merchantData);
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
            $order->psp_view = 1;
            $orders->save($order);
        }

        $orderViewd=$_GET['isView'];
        if(!is_null($orderViewd)){
            $this->loadModel('Notifications');
            $query = $this->Notifications->query();
            $query->update()
                ->set(['viewed_status' => 1])
                ->where(['order_id' =>  $id,'type'=>'inivation-accepted'])
                ->execute();
        }

        $newMessage=$_GET['newMessage'];
        if(!is_null($newMessage)){
            $this->loadModel('Notifications');
            $query = $this->Notifications->query();
            $query->update()
                ->set(['viewed_status' => 1])
                ->where(['order_id' =>  $id,'type'=>'msg-from-user-to-psp'])
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

        $userstate_id=$order->user->addresses[0]['state_id'];
        $merchantStateId=$merchantData->state_id;
        //$userstate_id=$order->user->addresses[0]['state_id'];
        //dd($userstate_id ."--".$merchantStateId);
        $userGSTStateName = $this->States->find()->select(['name'])->where(['id' =>$userstate_id])->first();
        //dd($userGSTStateName->name);
        $userStateName=$userGSTStateName->name;
        if($userstate_id==$merchantStateId){
            $cGst=($order->taxable_amount * 9)/100;
            $sGst=($order->taxable_amount * 9)/100;
        }else{
            $iGst=($order->taxable_amount * 18)/100;
        }
        $this->loadModel('Products');

        $product_id=$order->product_id;
        $order_product = $this->Products->find('all')
                ->where([ 'Products.id' => $product_id ])
                ->first();
        $this->loadModel('OrderStatuses');
        $order_statuses = $this->OrderStatuses->find('list');
        
        $this->set('order_product',$order_product);        
        $this->set('order', $order);
        $this->set('order_statuses', $order_statuses);
        $this->set('token', $token);
        $this->set('cGst', $cGst);
        $this->set('sGst', $sGst);
        $this->set('iGst', $iGst);
        $this->set('userStateName',$userStateName);
    }

    public function sendReminderMail($id = null){
        $orderId = $_GET['orderId'];
        //dd("a");
        $order = $this->Orders->get($orderId, [
            'contain' => ['Merchants','Users','Products'],
        ]);

        $this->loadModel('Notifications');
        $orderNotification = $this->Notifications->newEntity();
        $orderNotification->user_id=$order->user_id;
        $orderNotification->order_id=$orderId;
        $orderNotification->type="pending-payment-from-user";
        $pendingAmt=$order->gross_total-$order->total;
        $orderNotification->message="Please clear the payment |$pendingAmt";
        $orderNotification->viewed_status= 0; 
        $this->Notifications->save($orderNotification);
        
        $email = new Email();
        $email
            ->template('easify-order-payment-reminder','easify') //->template('template','layout')
            ->setViewVars(
                        [
                            'vendor' => $order->user->first_name,
                            'job_title' => $order->product->title,
                            'job_price' => $order->gross_total,
                            'paid_Amt' => $order->total,
                            'pending_Amt' => $order->gross_total-$order->total,
                            'buttonLink'=>'https://easifyy.com/order/partpayment?order='.base64_encode($orderId).'&p='.base64_encode($pendingAmt).'&s='.base64_encode($order->product->title),
                        ]
                    )
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to($order->user->username)
            ->bcc('easifyy@gmail.com')
            ->subject('Clear Pending Dues - Easifyy')
            ->send($msg);
        //dd($order);
    }

    public function sendInvoicetoUserPDF() {
        $gvtHeading1=$gvtHeading2=$gvtHeading3=$gvtHeading4=$gvtHeading5="";
        $gvtPrice1=$gvtPrice2=$gvtPrice3=$gvtPrice4=$gvtPrice5="";
        $couponCode ="" ;$couponDiscount= 0;
        $this->loadModel('Cities');
        $this->loadModel('States');
        $userState=$userCity=$userstate_id="";
        $this->autoRender = false;
        $order_id=$_POST['status'];

        $order = $this->Orders->get($order_id, [
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
                            'Coupons', 'Products',
                            'Products.ProductPlans' => [
                                'fields' => [
                                    'ProductPlans.product_id',
                                    'ProductPlans.heading',
                                    'ProductPlans.price',
                                    'ProductPlans.taxable',
                                    'ProductPlans.type',
                                ]
                            ],'OrderModes', 'OrderItems', 'OrderStatuses'],

        ]);

        $professionalFee=0;$gvtFee=0;
        //print_r($order->product->product_plans);
        $planType=$order->order_mode_id;
        $g=1;
        if (!is_null($order->product->product_plans)){ 
            foreach ($order->product->product_plans as $plans){
                if($plans->type == $planType){
                    if($plans->taxable==1 ){
                        $professionalFee=$professionalFee + $plans->price;
                    }else{
                        ${"gvtHeading".$g} = $plans->heading;
                        ${"gvtPrice".$g} = $plans->price;
                        $gvtFee=$gvtFee + $plans->price;
                        $g=$g+1;
                    }
                }
            }
        }
        $totalAmount=$professionalFee+$gvtFee;
        $totalAmountwithDiscount=$totalAmount;
        $totalAmtTcs=$totalAmount+$tcs;
        if($order->coupon_id!=""){
            $couponCode=$order->coupon->coupon_code;
            $couponDiscount=$order->coupon_discount;
            $totalAmountwithDiscount=$totalAmount-$couponDiscount;
        }
        
        $totalPayinWords = ucwords($this->displaywords($totalAmtTcs));


        $merchantName=substr($order->merchant->store_name, 0, 5);
        $invoice=str_replace("EASIFYY","",$order->invoice_id);
        $invoiceNo=$invoice.$merchantName."/EASIFYY";
        $orderDate=$order->created;
        $oDate=date_create($orderDate);
        $orderPlacedDate= date_format($oDate,"d/m/Y");

        $serviceName= $order->product->title.'(Plan ID:MIN-PLC-'.$order->product->id.'-'.$sType.')';
        
        //echo "gvt fee --- $gvtFee ------- professional ---- $professionalFee ----- $planType"; 
        //die();
        $merchantCityId=$order->merchant->city_id;
        $merchantStateId= $order->merchant->state_id;
        $merchantCity = $this->Cities->find()->select(['name'])->where(['id' =>$merchantCityId])->first();
        $merchantStateArr = $this->States->find()->select(['name','gst_code'])->where(['id' =>$merchantStateId])->first();

        $userCity_id=$order->user->addresses[0]['city_id'];
        $userState_id=$order->user->addresses[0]['state_id'];
        $userCityArr = $this->States->find()->select(['name'])->where(['id' =>$userCity_id])->first();
        $userStateArr = $this->States->find()->select(['name'])->where(['id' =>$userState_id])->first();

        $merchantCity=$merchantCity['name'];
        $merchantState=$merchantStateArr['name'];
        $userState=$userStateArr['name'];
        $userCity=$userCityArr['name'];

        $orderType=$order->order_mode_id;
        switch ($orderType) {
            case 1:
                $sType="Standard Plan";
              break;
            case 2:
                $sType="Pro Plan";
              break;
            case 3:
                $sType="Premium Plan";
              break;
        } 
        $serviceName= $order->product->title.'(Plan ID:MIN-PLC-'.$order->product->id.'-'.$sType;


        include '/var/www/easifyy.com/html/easifyy/src/Template/Admin/Orders/generate_pdf_to_user_without_gst.ctp';
        $output=str_replace("1/","",$output);
        $output=$output;
        $myArr=explode("/",$output);
        $pdfName = $myArr[count($myArr)-1];
        $order->user_invoice_pdf = $pdfName;
        $this->Orders->save($order);
        echo $downloadableLink="https://easifyy.com".explode("webroot",$output)[1];

        $downloadLink="<a href='".$downloadableLink."' traget='_blank'>Download File</a>";
        //dd($order);
        //$this->viewBuilder()->setLayout(false);
        $msg='';
        /*$email = new Email();
        $email
            ->template('easify_order_complete_email','easify') //->template('template','layout')
            ->setViewVars(
                        [
                            'vendor' => 'User',
                        ]
                    )
            ->attachments($output)
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to($order->user->username,$order->merchant->username)
            ->bcc('sdgrintech@gmail.com')
            ->subject('Order Completed successfully - Easifyy')
            ->send($msg);
            echo $downloadLink;*/
    }

    public function sendInvoicetoUserNonGST() {
        $gvtHeading1=$gvtHeading2=$gvtHeading3=$gvtHeading4=$gvtHeading5="";
        $gvtPrice1=$gvtPrice2=$gvtPrice3=$gvtPrice4=$gvtPrice5="";
        $couponCode ="" ;$couponDiscount= 0;
        $this->loadModel('Cities');
        $this->loadModel('States');
        $userState=$userCity=$userstate_id="";
        $this->autoRender = false;
        $order_id=$_POST['status'];

        $order = $this->Orders->get($order_id, [
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
                            'Coupons', 'Products',
                            'Products.ProductPlans' => [
                                'fields' => [
                                    'ProductPlans.product_id',
                                    'ProductPlans.heading',
                                    'ProductPlans.price',
                                    'ProductPlans.taxable',
                                    'ProductPlans.type',
                                ]
                            ],'OrderModes', 'OrderItems', 'OrderStatuses'],

        ]);

        $professionalFee=0;$gvtFee=0;
        //print_r($order->product->product_plans);
        $planType=$order->order_mode_id;
        $g=1;
        if (!is_null($order->product->product_plans)){ 
            foreach ($order->product->product_plans as $plans){
                if($plans->type == $planType){
                    if($plans->taxable==1 ){
                        $professionalFee=$professionalFee + $plans->price;
                    }else{
                        ${"gvtHeading".$g} = $plans->heading;
                        ${"gvtPrice".$g} = $plans->price;
                        $gvtFee=$gvtFee + $plans->price;
                        $g=$g+1;
                    }
                }
            }
        }
        $totalAmount=$professionalFee+$gvtFee;
        $totalAmountwithDiscount=$totalAmount;
        $totalAmtTcs=$totalAmount+$tcs;
        if($order->coupon_id!=""){
            $couponCode=$order->coupon->coupon_code;
            $couponDiscount=$order->coupon_discount;
            $totalAmountwithDiscount=$totalAmount-$couponDiscount;
        }
        
        $totalPayinWords = ucwords($this->displaywords($totalAmtTcs));


        $merchantName=substr($order->merchant->store_name, 0, 5);
        $invoice=str_replace("EASIFYY","",$order->invoice_id);
        $invoiceNo=$invoice.$merchantName."/EASIFYY";
        $orderDate=$order->created;
        $oDate=date_create($orderDate);
        $orderPlacedDate= date_format($oDate,"d/m/Y");

        $serviceName= $order->product->title.'(Plan ID:MIN-PLC-'.$order->product->id.'-'.$sType.')';
        
        //echo "gvt fee --- $gvtFee ------- professional ---- $professionalFee ----- $planType"; 
        //die();
        $merchantCityId=$order->merchant->city_id;
        $merchantStateId= $order->merchant->state_id;
        $merchantCity = $this->Cities->find()->select(['name'])->where(['id' =>$merchantCityId])->first();
        $merchantStateArr = $this->States->find()->select(['name','gst_code'])->where(['id' =>$merchantStateId])->first();

        $userCity_id=$order->user->addresses[0]['city_id'];
        $userState_id=$order->user->addresses[0]['state_id'];
        $userCityArr = $this->States->find()->select(['name'])->where(['id' =>$userCity_id])->first();
        $userStateArr = $this->States->find()->select(['name'])->where(['id' =>$userState_id])->first();

        $merchantCity=$merchantCity['name'];
        $merchantState=$merchantStateArr['name'];
        $userState=$userStateArr['name'];
        $userCity=$userCityArr['name'];

        $orderType=$order->order_mode_id;
        switch ($orderType) {
            case 1:
                $sType="Standard Plan";
              break;
            case 2:
                $sType="Pro Plan";
              break;
            case 3:
                $sType="Premium Plan";
              break;
        } 
        $serviceName= $order->product->title.'(Plan ID:MIN-PLC-'.$order->product->id.'-'.$sType;


        include '/var/www/easifyy.com/html/easifyy/src/Template/Admin/Orders/generate_pdf_to_user_without_gst.ctp';
        $output=str_replace("1/","",$output);
        $output=$output;
        $downloadableLink="https://easifyy.com".explode("webroot",$output)[1];
        $downloadLink="<a href='".$downloadableLink."' traget='_blank'>Download File</a>";
        //dd($order);
        //$this->viewBuilder()->setLayout(false);
        $msg='';
        $email = new Email();
        $email
            ->template('easify_order_complete_email','easify') //->template('template','layout')
            ->setViewVars(
                        [
                            'vendor' => 'User',
                        ]
                    )
            ->attachments($output)
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to($order->user->username,$order->merchant->username)
            ->bcc('vinit.grintech@gmail.com')
            ->subject('Order Completed successfully - Easifyy')
            ->send($msg);
            echo $downloadLink;
    }

    public function sendInvoicetoUserGstPDF() {
        $gvtHeading1=$gvtHeading2=$gvtHeading3=$gvtHeading4=$gvtHeading5="";
        $gvtPrice1=$gvtPrice2=$gvtPrice3=$gvtPrice4=$gvtPrice5="";
        $couponCode="-";$couponDiscount=0;
        $this->loadModel('Cities');
        $this->loadModel('States');
        $userState=$userCity=$userstate_id="";
        $this->autoRender = false;
        $order_id=$_POST['status'];

        $order = $this->Orders->get($order_id, [
            'contain' => ['Merchants',
                            'Merchants.MerchantKycs' =>[
                                'fields' => [
                                    'MerchantKycs.merchant_id',
                                    'MerchantKycs.signature',
                                ]
                            ], 
                            'Users','Users.Addresses' => [
                                'fields' => [
                                    'Addresses.user_id',
                                    'Addresses.address_line_1',
                                    'Addresses.address_line_2',
                                    'Addresses.city_id',
                                    'Addresses.state_id',
                                    'Addresses.zip_code',
                                ]
                            ], 
                            'Coupons', 'Products',
                            'Products.ProductPlans' => [
                                'fields' => [
                                    'ProductPlans.product_id',
                                    'ProductPlans.heading',
                                    'ProductPlans.price',
                                    'ProductPlans.taxable',
                                    'ProductPlans.type',
                                ]
                            ],'OrderModes', 'OrderItems', 'OrderStatuses'],

        ]);
        $orderType=$order->order_mode_id;
        switch ($orderType) {
            case 1:
                $sType="Standard Plan";
              break;
            case 2:
                $sType="Pro Plan";
              break;
            case 3:
                $sType="Premium Plan";
              break;
        } 
        $serviceName= $order->product->title.'(Plan ID:MIN-PLC-'.$order->product->id.'-'.$sType.')';
        $sac_code= $order->product->sac_code;
        $professionalFee=0;$gvtFee=0;
        //print_r($order->product->product_plans);
        $planType=$order->order_mode_id;
        $g=1;
        if (!is_null($order->product->product_plans)){ 
            foreach ($order->product->product_plans as $plans){
                if($plans->type == $planType){
                    if($plans->taxable==1 ){
                        $professionalFee=$professionalFee + $plans->price;
                    }else{
                        ${"gvtHeading".$g} = $plans->heading;
                        ${"gvtPrice".$g} = $plans->price;
                        $gvtFee=$gvtFee + $plans->price;
                        $g=$g+1;
                    }
                }
            }
        }
        $totalAmount=$professionalFee+$gvtFee;
        //echo "gvt fee --- $gvtFee ------- professional ---- $professionalFee ----- $planType"; 
        //die();
        $merchantCityId=$order->merchant->city_id;
        $merchantStateId= $order->merchant->state_id;

        $merchantName=substr($order->merchant->store_name, 0, 5);
        $invoice=str_replace("EASIFYY","",$order->invoice_id);
        $invoiceNo=$invoice.$merchantName."/EASIFYY";
        $orderDate=$order->created;
        $oDate=date_create($orderDate);
        $orderPlacedDate= date_format($oDate,"d/m/Y");

        $merchantCity = $this->Cities->find()->select(['name'])->where(['id' =>$merchantCityId])->first();
        $merchantStateArr = $this->States->find()->select(['name','gst_code'])->where(['id' =>$merchantStateId])->first();
        $signature="https://easifyy.com/img/kyc-documents/".$order->merchant->merchant_kycs[0]['merchant_id']."/".$order->merchant->merchant_kycs[0]['signature'];
        
        $userCity_id=$order->user->addresses[0]['city_id'];
        $userState_id=$order->user->addresses[0]['state_id'];
        $userGstState=$order->gst_state;

        $userCityArr = $this->States->find()->select(['name','gst_code'])->where(['name' =>$userGstState])->first();
        $userStateArr = $this->States->find()->select(['name','gst_code'])->where(['id' =>$userState_id])->first();

        $merchantCity=$merchantCity['name'];
        $merchantState=$merchantStateArr['name'];
        $userState=$userStateArr['name'];
        $userCity=$userCityArr['name'];

        $userGstStateId=$userCityArr['gst_code'];
        $merchantGstStateId=$merchantStateArr['gst_code'];
        $sGst=$cGst=$iGst=0;
        //if($userGstStateId==$merchantGstStateId){
        if($merchantStateId==$userState_id){
            $sGst=($professionalFee * 9 )/100;
            $cGst=($professionalFee * 9 )/100;
            $totalTax=$sGst + $cGst;
        }else{
            $iGst=($professionalFee * 18 )/100;
            $totalTax=$iGst;
        }

        //echo $totalTax;
        //die($totalTax);
        $totalAmtwithGst=$totalAmount+$totalTax;
        $totalAmountwithDiscount=$totalAmtwithGst;
        if($order->coupon_id!=""){
            $couponCode=$order->coupon->coupon_code;
            $couponDiscount=$order->coupon_discount;
            $totalAmountwithDiscount=$totalAmtwithGst-$couponDiscount;
        }

        $totalAmountInwords=ucwords($this->displaywords($totalAmountwithDiscount));
        include '/var/www/easifyy.com/html/easifyy/src/Template/Admin/Orders/generate_pdf_to_user_with_gst.ctp';
        $output=str_replace("1/","",$output);
        $output=$output;
        $myArr=explode("/",$output);
        $pdfName = $myArr[count($myArr)-1];
        $order->user_invoice_pdf = $pdfName;
        $this->Orders->save($order);
        $downloadableLink="https://easifyy.com".explode("webroot",$output)[1];
        //$downloadLink="<a href='".$downloadableLink."' traget='_blank'>Download File</a>";
        //dd($order);
        //$this->viewBuilder()->setLayout(false);
        $msg='';
        /*$email = new Email();
        $email
            ->template('easify-order-email','easify') //->template('template','layout')
            ->setViewVars(
                        [
                            'vendor' => 'PSP',
                            'job_title' => $order->product->title,
                            'job_price' => $totalAmtwithGst,
                            'job_link' => BASE_URL.'/service-details/'.$order->product->slug ,
                            'job_description' => $order->product->description,
                        ]
                    )
            ->attachments($output)
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to($order->user->username,$order->merchant->username)
            ->bcc('sdgrintech@gmail.com')
            ->subject('Order Completed successfully - Easifyy')
            ->send($msg);*/
            echo $downloadableLink;
    }

    public function sendInvoicetoUserGst(){
        $gvtHeading1=$gvtHeading2=$gvtHeading3=$gvtHeading4=$gvtHeading5="";
        $gvtPrice1=$gvtPrice2=$gvtPrice3=$gvtPrice4=$gvtPrice5="";
        $couponCode="-";$couponDiscount=0;
        $this->loadModel('Cities');
        $this->loadModel('States');
        $userState=$userCity=$userstate_id="";
        $this->autoRender = false;
        $order_id=$_POST['status'];

        $order = $this->Orders->get($order_id, [
            'contain' => ['Merchants',
                            'Merchants.MerchantKycs' =>[
                                'fields' => [
                                    'MerchantKycs.merchant_id',
                                    'MerchantKycs.signature',
                                ]
                            ], 
                            'Users','Users.Addresses' => [
                                'fields' => [
                                    'Addresses.user_id',
                                    'Addresses.address_line_1',
                                    'Addresses.address_line_2',
                                    'Addresses.city_id',
                                    'Addresses.state_id',
                                    'Addresses.zip_code',
                                ]
                            ], 
                            'Coupons', 'Products',
                            'Products.ProductPlans' => [
                                'fields' => [
                                    'ProductPlans.product_id',
                                    'ProductPlans.heading',
                                    'ProductPlans.price',
                                    'ProductPlans.taxable',
                                    'ProductPlans.type',
                                ]
                            ],'OrderModes', 'OrderItems', 'OrderStatuses'],

        ]);
        $orderType=$order->order_mode_id;
        switch ($orderType) {
            case 1:
                $sType="Standard Plan";
              break;
            case 2:
                $sType="Pro Plan";
              break;
            case 3:
                $sType="Premium Plan";
              break;
        } 
        $serviceName= $order->product->title.'(Plan ID:MIN-PLC-'.$order->product->id.'-'.$sType.')';
        $sac_code= $order->product->sac_code;
        $professionalFee=0;$gvtFee=0;
        //print_r($order->product->product_plans);
        $planType=$order->order_mode_id;
        $g=1;
        if (!is_null($order->product->product_plans)){ 
            foreach ($order->product->product_plans as $plans){
                if($plans->type == $planType){
                    if($plans->taxable==1 ){
                        $professionalFee=$professionalFee + $plans->price;
                    }else{
                        ${"gvtHeading".$g} = $plans->heading;
                        ${"gvtPrice".$g} = $plans->price;
                        $gvtFee=$gvtFee + $plans->price;
                        $g=$g+1;
                    }
                }
            }
        }
        $totalAmount=$professionalFee+$gvtFee;
        //echo "gvt fee --- $gvtFee ------- professional ---- $professionalFee ----- $planType"; 
        //die();
        $merchantCityId=$order->merchant->city_id;
        $merchantStateId= $order->merchant->state_id;

        $merchantName=substr($order->merchant->store_name, 0, 5);
        $invoice=str_replace("EASIFYY","",$order->invoice_id);
        $invoiceNo=$invoice.$merchantName."/EASIFYY";
        $orderDate=$order->created;
        $oDate=date_create($orderDate);
        $orderPlacedDate= date_format($oDate,"d/m/Y");

        $merchantCity = $this->Cities->find()->select(['name'])->where(['id' =>$merchantCityId])->first();
        $merchantStateArr = $this->States->find()->select(['name','gst_code'])->where(['id' =>$merchantStateId])->first();
        $signature="https://easifyy.com/img/kyc-documents/".$order->merchant->merchant_kycs[0]['merchant_id']."/".$order->merchant->merchant_kycs[0]['signature'];
        
        $userCity_id=$order->user->addresses[0]['city_id'];
        $userState_id=$order->user->addresses[0]['state_id'];
        $userGstState=$order->gst_state;

        $userCityArr = $this->States->find()->select(['name','gst_code'])->where(['name' =>$userGstState])->first();
        $userStateArr = $this->States->find()->select(['name','gst_code'])->where(['id' =>$userState_id])->first();

        $merchantCity=$merchantCity['name'];
        $merchantState=$merchantStateArr['name'];
        $userState=$userStateArr['name'];
        $userCity=$userCityArr['name'];

        $userGstStateId=$userCityArr['gst_code'];
        $merchantGstStateId=$merchantStateArr['gst_code'];
        $sGst=$cGst=$iGst=0;
        //if($userGstStateId==$merchantGstStateId){
        if($merchantStateId==$userState_id){
            $sGst=($professionalFee * 9 )/100;
            $cGst=($professionalFee * 9 )/100;
            $totalTax=$sGst + $cGst;
        }else{
            $iGst=($professionalFee * 18 )/100;
            $totalTax=$iGst;
        }

        //echo $totalTax;
        //die($totalTax);
        $totalAmtwithGst=$totalAmount+$totalTax;
        $totalAmountwithDiscount=$totalAmtwithGst;
        if($order->coupon_id!=""){
            $couponCode=$order->coupon->coupon_code;
            $couponDiscount=$order->coupon_discount;
            $totalAmountwithDiscount=$totalAmtwithGst-$couponDiscount;
        }

        $totalAmountInwords=ucwords($this->displaywords($totalAmountwithDiscount));
        include '/var/www/easifyy.com/html/easifyy/src/Template/Admin/Orders/generate_pdf_to_user_with_gst.ctp';
        $output=str_replace("1/","",$output);
        $output=$output;
        $myArr=explode("/",$output);
        $pdfName = $myArr[count($myArr)-1];
        $order->user_invoice_pdf = $pdfName;
        $this->Orders->save($order);
        $downloadableLink="https://easifyy.com".explode("webroot",$output)[1];
        //$downloadLink="<a href='".$downloadableLink."' traget='_blank'>Download File</a>";
        //dd($order);
        //$this->viewBuilder()->setLayout(false);
        $msg='';
        $email = new Email();
        $email
            ->template('easify-order-email','easify') //->template('template','layout')
            ->setViewVars(
                        [
                            'vendor' => 'PSP',
                            'job_title' => $order->product->title,
                            'job_price' => $totalAmtwithGst,
                            'job_link' => BASE_URL.'/service-details/'.$order->product->slug ,
                            'job_description' => $order->product->description,
                        ]
                    )
            ->attachments($output)
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to($order->user->username,$order->merchant->username)
            ->bcc('vinit.grintech@gmail.com')
            ->subject('Order Completed successfully - Easifyy')
            ->send($msg);
            echo $downloadableLink;
    }
    public function cancelRequest(){
        $this->autoRender = false;
        if ($this->request->is('post')) {
            //dd($this->request->getData('cancel_request'));
            $orderId = $this->request->getData('orderId');

            $msgfromPSP = $this->request->getData('cancel_request');
            $order = $this->Orders->get($orderId, [
                'contain' => ['Merchants','Users','Products'],
            ]);
            $order->psp_cancel_msg=$msgfromPSP;
            $order->psp_canceled_at=date("Y-m-d H:i:s");
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
                                'msgfromPSP'=> $msgfromPSP,
                                'userType' => 'PSP',
                            ]
                        )
                ->emailFormat('html')
                ->from(['connect@easifyy.com' => 'Easifyy'])
                ->to($order->merchant->username)
                ->bcc('easifyy@gmail.com')
                ->subject('Order Cancel Request from PSP')
                ->send($msg);
                $this->Flash->success(__('Message Sent Successfully To Easiffy!'));
                $orderId = base64_encode($this->request->getData('orderId'));
                $user_id = base64_encode($this->request->getData('user'));

                return $this->redirect(['action' => 'review', '?' => ['user' =>  $user_id,'order' => $orderId]]);
        }
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
