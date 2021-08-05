<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\Table;
use App\Model\Entity\Role;
use Cake\ORM\TableRegistry;
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
                    'Orders.gross_total' => $_POST['gross_total'],     
                ];
            } elseif($_POST['created'] !='') {
                $order=[
                    'Orders.created' => $_POST['created'], 
                ];
            } elseif($_POST['gross_total']!='') {
                $order=[
                    'Orders.gross_total' => $_POST['gross_total'],     
                ];
            }
            /*$this->paginate = [
                'contain' => ['Merchants', 'Users', 'Coupons', 'Runners', 'OrderModes', 'OrderStatuses'],
                'conditions' => $conditions,
                'order'=>$order,
            ]; */
            $orders = $this->Orders->find('all')
            ->where($conditions)
            ->contain(['Merchants', 'Users', 'Coupons', 'Products','OrderModes', 'OrderStatuses']);   
        } else {
            /*$this->paginate = [
                'contain' => ['Merchants', 'Users', 'Coupons', 'Products','OrderModes', 'OrderStatuses'],
                'conditions' => [
                        'Orders.delete_status'=>1,
                    ],
                'order' => [
                    'Orders.created' => 'desc'
                ]
            ];  */
            $orders = $this->Orders->find('all')
            ->where(['Orders.delete_status'=>1,])
            ->contain(['Merchants', 'Users', 'Coupons', 'Products','OrderModes', 'OrderStatuses']); 
        }
        
        $this->loadModel('Dashboard');
        $query = $this->Dashboard->find('all', [
            'conditions' => ['Dashboard.meta_key' => 'psp_assignment'],
        ]);
        $query->disableHydration();
        $row = $query->first();

        $token = $this->request->getParam('_csrfToken');
        //$orders = $this->paginate($this->Orders);
        //echo '<pre>'; print_r($orders); echo '</pre>';
        //die();
        $this->set(compact('orders','token','row'));
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
        
        $this->loadModel('Products');
        $this->loadModel('Merchants');
        $this->loadModel('Cities');
        $this->loadModel('States');

        $order = $this->Orders->get($id, [
            // 'contain' => ['Merchants', 'Users', 'Coupons', 'Runners', 'OrderModes', 'PaymentMethods', 'OrderStatuses', 'CouponRedeems', 'MerchantPayouts', 'OrderItems', 'OrderNotifications', 'OrderPayments', 'RunnerDeliveryRequests', 'Supports'],
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
                            'OrderInvitation',
                            'OrderInvitation.Users',
                            'Coupons', 'Products','OrderModes', 'OrderItems', 'OrderStatuses','Reviews','OrderPayments'],

        ]);
        if ($this->request->is('post')) {
            $reviews=$this->loadModel('Reviews');
            $orderInv=$this->loadModel('OrderInvitation');
            $order_notifications = $this->loadModel('OrderNotifications');
            $_data=$this->request->getData();
            $users= $this->Orders;
            $user = $users->get($id);
            $user->order_status_id = $_data['order_status_id'];
            if($_data['order_status_id']==6){
                $orderInv->updateAll(
                    [  // fields
                        'view_status' => 2,
                    ],
                    [  // conditions
                        'view_status' => 1,
                        'order_id' => $id
                    ]
                );
                $user->merchant_id=0;
                $user->psp_cancel_msg=NULL;
                $user->user_cancel_msg=NULL;
                // On cancel Order changing status of the review of the field delete_status
                $reviews->updateAll(
                    [  // fields
                        'delete_status' => 0,
                    ],
                    [  // conditions
                        'delete_status' => 1,
                        'order_id' => $id
                    ]
                );

                // On cancel Order changing status of the Order status created by previous PSP of the field delete_status
                $order_notifications->updateAll(
                    [  // fields
                        'delete_status' => 0,
                    ],
                    [  // conditions
                        'delete_status' => 1,
                        'order_id' => $id
                    ]
                );
            }
            else if($_data['order_status_id']==7){
                $refund_amount=$_POST['refund_amount'];
                $info=array('user'=>$order->user->first_name,'id'=>$order->id,'refunded'=>$refund_amount,);
                $this->sendmail($order->user->username,"",$info);
                //$orders= $this->Orders;
                $orders= TableRegistry::get('Orders');
                $order = $orders->get($id);
                $order->refund = $refund_amount;
                $orders->save($order);
            }
            $users->save($user);
        }

        $orderViewd=$_GET['viewed'];
        if(!is_null($orderViewd)){
            $orders= $this->Orders;
            $order = $orders->get($id);
            $order->superadmin_view = 1;
            $orders->save($order);
        }

        $order = $this->Orders->get($id, [
            // 'contain' => ['Merchants', 'Users', 'Coupons', 'Runners', 'OrderModes', 'PaymentMethods', 'OrderStatuses', 'CouponRedeems', 'MerchantPayouts', 'OrderItems', 'OrderNotifications', 'OrderPayments', 'RunnerDeliveryRequests', 'Supports'],
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
                            'OrderInvitation',
                            'OrderInvitation.Users',
                            'Coupons', 'Products','OrderModes', 'OrderItems', 'OrderStatuses','Reviews','OrderPayments'],

        ]);
        //dd($order);
        $serviceID = $order->product_id;
        $reviewId= $order->reviews[0]['id'] ;

        $reviewViewd=$_GET['orderCompleted'];
        if(!is_null($reviewViewd)){
            $reviews=$this->loadModel('Reviews');
            $reviews->updateAll(
                [  // fields
                    'superadmin_view' => 1,
                ],
                [  // conditions
                    //'delete_status' => 1,
                    'order_id' => $id
                ]
            );
        }

        $orderViewd=$_GET['invitationAccepted'];
        if(!is_null($orderViewd)){
            $this->loadModel('Notifications');
            $query = $this->Notifications->query();
            $query->update()
                ->set(['viewed_status' => 1])
                ->where(['order_id' =>  $id,'type'=>'inivation-accepted'])
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

        $orderViewd=$_GET['paymentRequest'];
        if(!is_null($orderViewd)){
            $this->loadModel('Notifications');
            $query = $this->Notifications->query();
            $query->update()
                ->set(['viewed_status' => 1])
                ->where(['order_id' =>  $id,'type'=>'payment-from-easifyy'])
                ->execute();
        }

        $query = $this->Products->find('all', [
            'contain' => [
                'Merchants' => [
                    'fields' => [
                        'Merchants.id',
                        'Merchants.user_id',
                        'Merchants.username',
                        'Merchants.store_name',
                        'Merchants.last_name',
                    ]
                ]
            ],
            'conditions' => ['Products.parent_id' => $serviceID,'Products.delete_status' => 1,'Products.status' => 4],
            'fields' =>['author','title','slug','id','description','service_coverd','service_target','service_process','service_guide']
        ]);
        //dd($query);
        $cityId=$order->user->addresses[0]['city_id'];
        $stateId= $order->user->addresses[0]['state_id'];
        $userCity = $this->Cities->find()->where(['id' =>$cityId])->first();
        $userState = $this->States->find()->where(['id' =>$stateId])->first();
        $query->disableHydration();
        $merchants = $query->all();
        $token = $this->request->getParam('_csrfToken');

        //dd($merchants);
        $orderStatuses = $this->Orders->OrderStatuses->find('list', ['limit' => 200]);
        //dd($order);
        $this->set(compact('order', 'orderStatuses','merchants','userCity','userState','token'));
    }

    public function sendmail($UserEmail,$msg="",$info){
        //dd($UserEmail);
        //$this->viewBuilder()->setLayout(false);
        $email = new Email();
        $email
            ->template('easifyy_order_refunded_successfully','easify') //->template('template','layout')
            ->setViewVars(
                        [
                            'vendor' => $info['user'],
                            'order_id' => $info['id'],
                            'refunded_amounr'=> $info['refunded'],
                        ]
                    )
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to($UserEmail)
            ->cc('vinit.grintech@gmail.com')
            ->subject('Order Refunded successfully - Easifyy')
            ->send('Order Refunded successfully');
            
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

    public function sendInvites(){
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $id = $this->request->getData('orderId');
            $merchants = $this->request->getData('merchants');
            $order = $this->Orders->get($id);
            //dd("sendinvites function");
            $this->assignMerchantManual($order ,$merchants);
        }
    }

    public function disablePSP() {
        $this->loadModel('Dashboard');
        $this->autoRender = false;
        $status = $_POST['status'];
        
        $tablename = TableRegistry::get("Dashboard");
        $conditions = array('meta_key'=>'psp_assignment');
        $fields = array('meta_value'=>$status);
        $tablename->updateAll($fields, $conditions);
        echo 'Updated';
    }

    public function paymentsPSP() {
        $this->autoRender = false;
        // $status = $_POST['status'];
         $users= $this->loadModel('OrderNotifications');
         $user = $users->get($_POST['id']);
         $paymentReply =$_POST['paymentReply'];
         if($_POST['status']=='reject') {
            $payment_status=0;
            $pStatus="Declined";
         } else {
            $payment_status=1;
            $pStatus="Approved";

         }
         $user->payment_status = $payment_status;
         $user->payment_reply = $paymentReply;
         $merchantID=$user->merchant_id;
         //dd($merchantID);
         $merchantData=$this->getUserIdByMerchantData($merchantID);
         //dd($merchantData->username);
         $this->sendPaymentRequestMail($merchantData->username,"Payment Request ".$pStatus." From",$paymentReply);
         //echo '<pre>'; print_r($user); echo '</pre>';
            
         if($users->save($user)) {
            echo 'Save';
         } else {
            echo 'Not Save';
         }
        
    }
    public function summery(){
        //die('here');
        $token = $this->request->getParam('_csrfToken');
        $order_id=base64_decode($_GET['order']);
        $this->loadModel('OrderNotifications');
        $order = $this->OrderNotifications->find('all')->contain(['Merchants', 'Users'])
            ->where(['OrderNotifications.order_id' => $order_id ,'OrderNotifications.type'=>'admin_notes','OrderNotifications.delete_status'=>1])
            ->all();

        $this->set(array('orders' => $order));
        //dd( $order );
    }

    public function sendInvoicePDF() {
		$gvtHeading1=$gvtHeading2=$gvtHeading3=$gvtHeading4=$gvtHeading5="";
        $gvtPrice1=$gvtPrice2=$gvtPrice3=$gvtPrice4=$gvtPrice5="";
        $couponCode="-";$couponDiscount=0;
        $this->loadModel('Cities');
        $this->loadModel('States');
        $userState=$userCity=$userstate_id="";
        $couponDiscount=00.00;
        $this->autoRender = false;
        $order_id=$_POST['status'];

        /* $order = $this->Orders->get($order_id, [
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

        ]); */
		
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
                            ],'OrderModes', 'OrderNotifications','OrderItems', 'OrderStatuses'],

        ]);

        

        $commission=30;
        $planType=$order->order_mode_id;
		switch ($planType) {
            case 1:
                $commission=$order->product['_basic_commission'];
                $commissionOprator=$order->product["b_commssion_oprator"];
                $commissionAdd=$order->product["b_commssion_add"];
				break;
			case 2:
                $commission=$order->product['_standard_commission'];
                $commissionOprator=$order->product["s_commssion_oprator"];
                $commissionAdd=$order->product["s_commssion_add"];
                break;
            case 3:
                $commission=$order->product['_premium_commission'];
                $commissionOprator=$order->product["p_commssion_oprator"];
                $commissionAdd=$order->product["p_commssion_add"];
                break;
        }
        $merchantName=substr($order->merchant->store_name, 0, 5);
        $invoice=str_replace("EASIFYY","",$order->invoice_id);
        $invoiceNo=$invoice."KISTEN/EASIFYY";
        $orderDate=$order->created;
        $oDate=date_create($orderDate);
        $sac_code=$order->product['sac_code'];
        $orderPlacedDate= date_format($oDate,"d/m/Y");

        $grossTotal=$order->gross_total;
		$taxable=$order->taxable_amount;
        $commissionAmt=($taxable * $commission)/100;
        
		$paytoPsp =$grossTotal;
        if($commissionOprator!=""){
            switch ($commissionOprator) {
                case "+":
                    $commissionAmt=$commissionAmt + $commissionAdd;
                    break;
                case "-":
                    $commissionAmt=$commissionAmt - $commissionAdd;
                    break;
                case "*":
                    //echo "in * Case ----".$commissionAdd."-------";
                    if($commissionAdd!=0){
                        $commissionAmt=$commissionAmt * $commissionAdd;
                    }
                    break;
                case "/":
                    if($commissionAdd!=0){
                        $commissionAmt=$commissionAmt / $commissionAdd;
                    }
                    break;
            }
        }
        $paytoPsp=$paytoPsp - $commissionAmt;

        $cityId=$order->merchant->city_id;
        $stateId= $order->merchant->state_id;
        $userstate_id=$order->user->addresses[0]['state_id'];
        $merchantCity = $this->Cities->find()->select(['name'])->where(['id' =>$cityId])->first();
        $merchantStateArr = $this->States->find()->select(['name','gst_code'])->where(['id' =>$stateId])->first();
        $userState = $this->States->find()->select(['name'])->where(['id' =>$userstate_id])->first();
        $merchantCity=$merchantCity['name'];
        $merchantState=$merchantStateArr['name'];
        $merchantStateGstCode=$merchantStateArr['gst_code'];

		
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
        } else {
			
		}
        $totalAmount=$professionalFee+$gvtFee;
		
        $transactionFee=$_POST['transactionFee'];
        $serviceFee=$_POST['serviceFee'];
        if($transactionFee==""){
            $transactionFee=0;
        }
        if($serviceFee==""){
            $serviceFee=0;
            $otherCharges=0;
        }
        if($transactionFee>0){
        $transactionFee= ($grossTotal * $transactionFee)/100;
        $transactionFee=number_format((float)$transactionFee, 2, '.', '');
        }
        if($serviceFee>0){
            $otherCharges= ($grossTotal * $serviceFee)/100;
            $otherCharges=number_format((float)$otherCharges, 2, '.', '');
        }
        $tcs= ($order->gross_total)/100;

        $totalbill=$commissionAmt +$transactionFee+ $otherCharges;
        $totalbillwithTcs=$totalbill + $tcs;

        $sGst=0;$cGst=0;$iGst=0;
        $sGstPercntage=0;$cGstPercntage=0;$iGstPercntage=0;
        if($merchantStateGstCode=="07"){
            $sGstPercntage=$cGstPercntage=0.5;
            $sGst=($order->gross_total * 0.5)/100;
            $cGst=($order->gross_total * 0.5)/100;
        }else{
            $iGstPercntage=1;
            $iGst=($order->gross_total)/100;
        }
		
        $totalfee=$transactionFee + $otherCharges;
        $taxcal=$commissionAmt -$totalfee + $couponDiscount;
		if($merchantStateGstCode=="07"){
            $sGst=($taxcal * 9 )/100;
            $cGst=($taxcal * 9 )/100;
            $sGst=number_format((float)$sGst, 2, '.', '');
            $cGst=number_format((float)$cGst, 2, '.', '');
            $totalTax=$sGst + $cGst;
            
        }else{
            $iGst=($taxcal * 18 )/100;
            $iGst=number_format((float)$iGst, 2, '.', '');
            $totalTax=$iGst;
        }
		$totalTax=number_format((float)$totalTax, 2, '.', '');
        
        $paidAmount=00.00;
        foreach($order->order_notifications as $OrderNotification) {
            $data=unserialize($OrderNotification->message);
            $paidAmount=$paidAmount+$data['amount'];
        }
        
        $totalbill=$commissionAmt + $gvtFee;
        $totalbill=number_format((float)$totalbill, 2, '.', '');
        //$totalbill=$commissionAmt +$transactionFee+ $otherCharges + $gvtFee;
        
        $totalbillaftertax=$totalbill-$totalfee;
        $totalbillaftertax=number_format((float)$totalbillaftertax, 2, '.', '');
        $totalbillwithTcs=$totalbill + $tcs;
        $totalbillwithGstn=$totalbill + $sGst + $cGst + $iGst;
        $totalTax= $sGst + $cGst + $iGst;
        $totalPayinWords = ucwords($this->displaywords($totalbillwithGstn));

        

        
        if($order->gst_state) {
            $totalaftertax=$totalbillaftertax+$totalTax;
            $totalaftertax=number_format((float)$totalaftertax, 2, '.', '');
        } else {
            $totalaftertax=$totalbillaftertax;
            $totalaftertax=number_format((float)$totalaftertax, 2, '.', '');
        }
        
        $totalPaidAmount= $paidAmount;
        $totalPendingAmount= $totalaftertax - $totalPaidAmount;
        
        $totalAmount=$professionalFee+$gvtFee-$totalTax;
		$totalAmtwithGst=$totalAmount+$totalTax;
				$totalAmountwithDiscount=$totalAmtwithGst;
				if($order->coupon_id!=""){
					$couponCode=$order->coupon->coupon_code;
					$couponDiscount=$order->coupon_discount;
					$totalAmountwithDiscount=$totalAmtwithGst-$couponDiscount;
				}
		//die();
		
        $totalPay=$paytoPsp-$transactionFee-$otherCharges-$tcs;
        $serviceName= $order->product->title.'(Plan ID:MIN-PLC-'.$order->product->id.'-'.$sType.')';
        $userState=$userState['name'];
        if($order->gst_no==""){
            $totalPayinWords = ucwords($this->displaywords($totalaftertax));
            //die('working without gst');
            include '/var/www/easifyy.com/html/easifyy/src/Template/Users/generate_pdf_superadmin_without_gst.ctp';
        }else{
            //die('working with gst');
            include '/var/www/easifyy.com/html/easifyy/src/Template/Users/generate_pdf_superadmin.ctp';
        }
        $output=str_replace("1/","",$output);
        $output=$output;
        $myArr=explode("/",$output);
        echo $pdfName = $myArr[count($myArr)-1];

        $order->order_pdf = $pdfName;
        $order->transaction_charges = $transactionFee;
        $order->other_charges = $otherCharges;
        $order->total_tax = $totalTax;
        $order->fee_to_psp = $totalaftertax;
        $order->fee_to_kisten = $order->gross_total-$totalaftertax;

        $this->Orders->save($order);

        //$this->viewBuilder()->setLayout(false);
        $msg='';
        /*$email = new Email();
        $email
            ->template('easify_order_complete_email','easify') //->template('template','layout')
            ->setViewVars(
                        [
                            'vendor' => 'test',
                        ]
                    )
            ->attachments($output)
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to($order->merchant->username)
            ->cc('sdgrintech@gmail.com')
            ->subject('Order Completed successfully - Easifyy')
            ->send($msg);*/
    }

    

    public function sendInvoicePDFtoPSP() {
        $gvtHeading1=$gvtHeading2=$gvtHeading3=$gvtHeading4=$gvtHeading5="";
        $gvtPrice1=$gvtPrice2=$gvtPrice3=$gvtPrice4=$gvtPrice5="";
        $couponCode="-";$couponDiscount=0;
        $this->loadModel('Cities');
        $this->loadModel('States');
        $userState=$userCity=$userstate_id="";
        $couponDiscount=00.00;
        $this->autoRender = false;
        $order_id=$_POST['status'];

        /* $order = $this->Orders->get($order_id, [
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

        ]); */
		
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
                            ],'OrderModes', 'OrderNotifications','OrderItems', 'OrderStatuses'],

        ]);

        

        $commission=30;
        $planType=$order->order_mode_id;
		switch ($planType) {
            case 1:
                $commission=$order->product['_basic_commission'];
                $commissionOprator=$order->product["b_commssion_oprator"];
                $commissionAdd=$order->product["b_commssion_add"];
				break;
			case 2:
                $commission=$order->product['_standard_commission'];
                $commissionOprator=$order->product["s_commssion_oprator"];
                $commissionAdd=$order->product["s_commssion_add"];
                break;
            case 3:
                $commission=$order->product['_premium_commission'];
                $commissionOprator=$order->product["p_commssion_oprator"];
                $commissionAdd=$order->product["p_commssion_add"];
                break;
        }
        $merchantName=substr($order->merchant->store_name, 0, 5);
        $invoice=str_replace("EASIFYY","",$order->invoice_id);
        $invoiceNo=$invoice."KISTEN/EASIFYY";
        $orderDate=$order->created;
        $oDate=date_create($orderDate);
        $sac_code=$order->product['sac_code'];
        $orderPlacedDate= date_format($oDate,"d/m/Y");

        $grossTotal=$order->gross_total;
		$taxable=$order->taxable_amount;
        $commissionAmt=($taxable * $commission)/100;
        
		$paytoPsp =$grossTotal;
        if($commissionOprator!=""){
            switch ($commissionOprator) {
                case "+":
                    $commissionAmt=$commissionAmt + $commissionAdd;
                    break;
                case "-":
                    $commissionAmt=$commissionAmt - $commissionAdd;
                    break;
                case "*":
                    //echo "in * Case ----".$commissionAdd."-------";
                    if($commissionAdd!=0){
                        $commissionAmt=$commissionAmt * $commissionAdd;
                    }
                    break;
                case "/":
                    if($commissionAdd!=0){
                        $commissionAmt=$commissionAmt / $commissionAdd;
                    }
                    break;
            }
        }
        $paytoPsp=$paytoPsp - $commissionAmt;

        $cityId=$order->merchant->city_id;
        $stateId= $order->merchant->state_id;
        $userstate_id=$order->user->addresses[0]['state_id'];
        $merchantCity = $this->Cities->find()->select(['name'])->where(['id' =>$cityId])->first();
        $merchantStateArr = $this->States->find()->select(['name','gst_code'])->where(['id' =>$stateId])->first();
        $userState = $this->States->find()->select(['name'])->where(['id' =>$userstate_id])->first();
        $merchantCity=$merchantCity['name'];
        $merchantState=$merchantStateArr['name'];
        $merchantStateGstCode=$merchantStateArr['gst_code'];

		
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
        } else {
			
		}
        $totalAmount=$professionalFee+$gvtFee;
		
        $transactionFee=$_POST['transactionFee'];
        $serviceFee=$_POST['serviceFee'];
        if($transactionFee==""){
            $transactionFee=0;
        }
        if($serviceFee==""){
            $serviceFee=0;
            $otherCharges=0;
        }
        if($transactionFee>0){
        $transactionFee= ($grossTotal * $transactionFee)/100;
        $transactionFee=number_format((float)$transactionFee, 2, '.', '');
        }
        if($serviceFee>0){
            $otherCharges= ($grossTotal * $serviceFee)/100;
            $otherCharges=number_format((float)$otherCharges, 2, '.', '');
        }
        $tcs= ($order->gross_total)/100;

        $totalbill=$commissionAmt +$transactionFee+ $otherCharges;
        $totalbillwithTcs=$totalbill + $tcs;

        $sGst=0;$cGst=0;$iGst=0;
        $sGstPercntage=0;$cGstPercntage=0;$iGstPercntage=0;
        if($merchantStateGstCode=="07"){
            $sGstPercntage=$cGstPercntage=0.5;
            $sGst=($order->gross_total * 0.5)/100;
            $cGst=($order->gross_total * 0.5)/100;
        }else{
            $iGstPercntage=1;
            $iGst=($order->gross_total)/100;
        }
		
        $totalfee=$transactionFee + $otherCharges;
        $taxcal=$commissionAmt -$totalfee + $couponDiscount;
		if($merchantStateGstCode=="07"){
            $sGst=($taxcal * 9 )/100;
            $cGst=($taxcal * 9 )/100;
            $sGst=number_format((float)$sGst, 2, '.', '');
            $cGst=number_format((float)$cGst, 2, '.', '');
            $totalTax=$sGst + $cGst;
            
        }else{
            $iGst=($taxcal * 18 )/100;
            $iGst=number_format((float)$iGst, 2, '.', '');
            $totalTax=$iGst;
        }
		$totalTax=number_format((float)$totalTax, 2, '.', '');
        
        $paidAmount=00.00;
        foreach($order->order_notifications as $OrderNotification) {
            $data=unserialize($OrderNotification->message);
            $paidAmount=$paidAmount+$data['amount'];
        }
        
        $totalbill=$commissionAmt + $gvtFee;
        $totalbill=number_format((float)$totalbill, 2, '.', '');
        //$totalbill=$commissionAmt +$transactionFee+ $otherCharges + $gvtFee;
        
        $totalbillaftertax=$totalbill-$totalfee;
        $totalbillaftertax=number_format((float)$totalbillaftertax, 2, '.', '');
        $totalbillwithTcs=$totalbill + $tcs;
        $totalbillwithGstn=$totalbill + $sGst + $cGst + $iGst;
        $totalTax= $sGst + $cGst + $iGst;
        $totalPayinWords = ucwords($this->displaywords($totalbillwithGstn));

        

        
        if($order->gst_state) {
            $totalaftertax=$totalbillaftertax+$totalTax;
            $totalaftertax=number_format((float)$totalaftertax, 2, '.', '');
        } else {
            $totalaftertax=$totalbillaftertax;
            $totalaftertax=number_format((float)$totalaftertax, 2, '.', '');
        }
        
        $totalPaidAmount= $paidAmount;
        $totalPendingAmount= $totalaftertax - $totalPaidAmount;
        
        $totalAmount=$professionalFee+$gvtFee-$totalTax;
		$totalAmtwithGst=$totalAmount+$totalTax;
				$totalAmountwithDiscount=$totalAmtwithGst;
				if($order->coupon_id!=""){
					$couponCode=$order->coupon->coupon_code;
					$couponDiscount=$order->coupon_discount;
					$totalAmountwithDiscount=$totalAmtwithGst-$couponDiscount;
				}
		//die();
		
        $totalPay=$paytoPsp-$transactionFee-$otherCharges-$tcs;
        $serviceName= $order->product->title.'(Plan ID:MIN-PLC-'.$order->product->id.'-'.$sType.')';
        $userState=$userState['name'];
        if($order->gst_no==""){
            $totalPayinWords = ucwords($this->displaywords($totalaftertax));
            //die('working without gst');
            include '/var/www/easifyy.com/html/easifyy/src/Template/Users/generate_pdf_superadmin_without_gst.ctp';
        }else{
            //die('working with gst');
            include '/var/www/easifyy.com/html/easifyy/src/Template/Users/generate_pdf_superadmin.ctp';
        }
        $output=str_replace("1/","",$output);
        $output=$output;
        $myArr=explode("/",$output);
        echo $pdfName = $myArr[count($myArr)-1];

        $msg='';
        $email = new Email();
        $email
            ->template('easify_order_complete_email','easify') //->template('template','layout')
            ->setViewVars(
                        [
                            'vendor' => 'PSP',
                        ]
                    )
            ->attachments($output)
            ->emailFormat('html')
            ->from(['connect@easifyy.com' => 'Easifyy'])
            ->to($order->merchant->username)
            ->cc('sdgrintech@gmail.com')
            ->subject('Order Completed successfully - Easifyy')
            ->send($msg);
    }

    public function sendInvoicePDFCustomer() {
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

        if ($order->gst_no == '') {
            // Without GST
            //die('without gst');
            $this->customernongstpdf();
        } else {
            // Without GST 
            //die('with gst');
            $this->customergstpdf();
        }
    }

    public function customernongstpdf() {
        $gvtHeading1=$gvtHeading2=$gvtHeading3=$gvtHeading4=$gvtHeading5="";
        $gvtPrice1=$gvtPrice2=$gvtPrice3=$gvtPrice4=$gvtPrice5="";
        $sGst=0.00;$cGst=0.00;$iGst=0.00;
        $sGstPercntage=0.0;$cGstPercntage=0.0;$iGstPercntage=0.0;
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
        $invoiceNo=$invoice."/KISTEN/EASIFYY";
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
        $userStateArr = $this->States->find()->select(['name','gst_code'])->where(['id' =>$userState_id])->first();

        $merchantCity=$merchantCity['name'];
        $merchantState=$merchantStateArr['name'];
        $userState=$userStateArr['name'];
		$userStateCode=$userStateArr['gst_code'];
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

        $totalAmountInwords=ucwords($this->displaywords($totalAmountwithDiscount));
        include '/var/www/easifyy.com/html/easifyy/src/Template/Admin/Orders/generate_pdf_to_user_without_gst.ctp';
        $output=str_replace("1/","",$output);
        $output=$output;
        $myArr=explode("/",$output);
        $pdfName = $myArr[count($myArr)-1];
        $order->user_invoice_pdf = $pdfName;
        $this->Orders->save($order);
        $downloadableLink="https://easifyy.com".explode("webroot",$output)[1];

        echo $downloadableLink=str_replace("https://easifyy.com/pdf/","",$downloadableLink);

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
            ->cc('sdgrintech@gmail.com')
            ->subject('Order Completed successfully - Easifyy')
            ->send($msg);
            echo $downloadLink;*/
    }
    // Send Link for GST
    public function customergstpdf() {
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
        $invoiceNo=$invoice."/KISTEN/EASIFYY";
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
		$userStateArrName = $this->States->find()->select(['id','gst_code'])->where(['name' =>$userGstState])->first();
		
		
		
		
        $merchantCity=$merchantCity['name'];
        $merchantState=$merchantStateArr['name'];
        $userState=$userStateArr['name'];
        $userCity=$userCityArr['name'];

        $userGstStateId=$userCityArr['gst_code'];
        $merchantGstStateId=$merchantStateArr['gst_code'];
        $sGst=$cGst=$iGst=0;
        //if($userGstStateId==$merchantGstStateId){
        
		$userState_id= $userStateArrName['id'];
        $userGstStatecode= $userStateArrName['gst_code'];
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
            ->cc('sdgrintech@gmail.com')
            ->subject('Order Completed successfully - Easifyy')
            ->send($msg);*/
            $downloadableLink=str_replace("https://easifyy.com/pdf/","",$downloadableLink);
            echo $downloadableLink;
    }

    //VIEW LINK
    public function sendmailcustomergstpdf() {
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
        $invoiceNo=$invoice."/KISTEN/EASIFYY";
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
            ->cc('sdgrintech@gmail.com')
            ->subject('Order Completed successfully - Easifyy')
            ->send($msg);
            echo $downloadableLink;
    }

    public function sendInvoicePDFtoCustomer() {
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

        if ($order->gst_no == '') {
            // Without GST
            //die('without gst');
            $this->sendmailcustomernongstpdf();
        } else {
            // Without GST 
            //die('with gst');
            $this->sendmailcustomergstpdf();
        }
    }

    public function sendmailcustomernongstpdf() {
        $gvtHeading1=$gvtHeading2=$gvtHeading3=$gvtHeading4=$gvtHeading5="";
        $gvtPrice1=$gvtPrice2=$gvtPrice3=$gvtPrice4=$gvtPrice5="";
        $sGst=0.00;$cGst=0.00;$iGst=0.00;
        $sGstPercntage=0.0;$cGstPercntage=0.0;$iGstPercntage=0.0;
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
        $invoiceNo=$invoice."/KISTEN/EASIFYY";
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

        $totalAmountInwords=ucwords($this->displaywords($totalAmountwithDiscount));
        include '/var/www/easifyy.com/html/easifyy/src/Template/Admin/Orders/generate_pdf_to_user_without_gst.ctp';
        $output=str_replace("1/","",$output);
        $output=$output;
        $myArr=explode("/",$output);
        $pdfName = $myArr[count($myArr)-1];
        $order->user_invoice_pdf = $pdfName;
        $this->Orders->save($order);
        $downloadableLink="https://easifyy.com".explode("webroot",$output)[1];

        echo $downloadableLink=str_replace("https://easifyy.com/pdf/","",$downloadableLink);

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
            ->cc('vinit.grintech@gmail.com')
            ->subject('Order Completed successfully - Easifyy')
            ->send($msg);
            echo $downloadLink;
    }
}
