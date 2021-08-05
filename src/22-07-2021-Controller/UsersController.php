<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\BaseController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Utility\Security; 
use Cake\Routing\Router;
use Cake\Mailer\Email;
//App::import('Controller', 'Base'); // mention at top
//use Vendor\tecnickcom\tcpdf\tcpdf;
//App::import('','/tecnickcom/tcpdf/tcpdf');
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class UsersController extends AppController
{

    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function beforeFilter(Event $event)
    {
        $this->loadComponent('Csrf');
        parent::beforeFilter($event);

        //if ($this->request->getParam('action') == 'loginWithGoogle') {
           $this->getEventManager()->off($this->Csrf);
        //}

        $this->loadComponent('Auth');
        $this->Auth->allow( ['newsletterSubscribe','callBackRequest','googleloginmain','googlelogin','googleloginpsp','login','sendmail','add','signout','chklogin','forgotPassword','resetPassword','seller','signup','jobInvitaion','jobReject','viewPdf','validateEmailVerificationToken','verifyEmail']);
    }

    // public function __generateEmailVerificationToken() {
    //     // Generate a random string 100 chars in length.
    //     $token = "";
    //     for ($i = 0; $i < 100; $i++) {
    //         $d = rand(1, 100000) % 2;
    //         $d ? $token .= chr(rand(33, 79)) : $token .= chr(rand(80, 126));
    //     }
    //     (rand(1, 100000) % 2) ? $token = strrev($token) : $token = $token;
    //     // Generate hash of random string
    //     $hash = Security::hash($token, 'sha256', true);
    //     ;
    //     for ($i = 0; $i < 20; $i++) {
    //         $hash = Security::hash($hash, 'sha256', true);
    //     }
    //     return $hash;
    // }

    public function add()
    {
        $BaseController = new \App\Controller\BaseController();  
        $this->viewBuilder()->setLayout(false);
        $this->loadModel('Users');
        
        if ($this->request->is('post')) {
            
        	$user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => false]);
            $user->user_profile_image='';
            $user->role='user';
            $user->status=0;
            $hash = $BaseController->__generateEmailVerificationToken() ;  

            $user->email_verification_token=$hash;
            $user->email_token_created_at=date('Y-m-d H:i:s');

            if ($result = $this->Users->save($user)) {
                // Retrieve user from DB
                $authUser = $this->Users->get($result->id)->toArray();
                //$this->Auth->setUser($authUser);
                
                $BaseController->sendEmailVerificationEmail($authUser);
                $msg='';
                $email = new Email();
                $email
                  ->template('easify_new_user_register','easify') //->template('template','layout')
                  ->setViewVars(
                              [
                                'first_name' => $user->first_name,
                                'last_name' => $user->last_name,
                                'username' => $user->username,
                                'phone_no' => $user->phone,
                                'user' => "User",
                              ]
                          )
                  ->emailFormat('html')
                  ->from(['connect@easifyy.com' => 'Easifyy'])
                  ->to('easifyy@gmail.com')
                  ->subject('New User Registered Successfully - Easifyy')
                  ->send($msg);

                return $this->redirect(['controller' => 'Users','action' => 'verifyEmail']);
                //return $this->redirect(['controller' => 'Users','action' => 'profile']);
                //return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The user could not be saved. Please, try again with different Email Address.'));
            return $this->redirect($this->referer());
        }
    }

    public function verifyEmail() {
        $this->viewBuilder()->setLayout('frontend');
    }

    public function validateEmailVerificationToken() {
        $this->viewBuilder()->setLayout('frontend');
        $actual_link = "$_SERVER[REQUEST_URI]";
        $arr = explode('validate-email-verification-token/', $actual_link);
        $token = $arr[1];
        $user = $this->Users->find()->where(['email_verification_token' =>$token])->first();
        
        if(isset($user)) {
            //echo '<pre>'; print_r($user); echo '</pre>';
            // if($user->email_verify_status==1) {
            //     die('Invalid Link / Email already Verfied');
            // } else {
                $users= $this->Users;
                $user = $users->get($user->id);
                $user->status = 1;
                $user->email_verify_status = 1;
                $users->save($user);

                $msg='';
                $email = new Email();
                $email
                  ->template('easify-user-register','easify') //->template('template','layout')
                  ->setViewVars(
                              [
                                'first_name' => $user->first_name,
                              ]
                          )
                  ->emailFormat('html')
                  ->from(['connect@easifyy.com' => 'Easifyy'])
                  ->to($user->username)
                  ->bcc('easifyy@gmail.com')
                  ->subject('Email Registered Successfully - Easifyy')
                  ->send($msg);
            // }
                if ($user) {
                    $this->Auth->setUser($user);
                    if($user['role'] =='user'){
                        $this->Flash->success(__('Logged In Successfully!'));
                        //return $this->redirect($this->referer());
                        return $this->redirect(['controller' => 'Users','action' => 'profile']);
                    }elseif($user['role'] =='admin'){
                        return $this->redirect(['controller' => 'Merchants','action' => 'profileSetup', 'prefix' =>'admin']);
                        //return $this->redirect(['controller' => 'Users','action' => 'dashboard', 'prefix' =>'admin']);
                    }           
                }    
        } else {
            die('Invalid Token / Token Expired');    
        }
        //die();
        
    }
    public function login()
    {
        // $this->layout = 'login';
        $this->viewBuilder()->setLayout('login');
        //$this->sendmail('dhimansahil610@gmail.com');

        // $this->sendNotification();

        if ( $this->request->is('post') ) {
            $user = $this->Auth->identify();
            //dd($user->email_verify_status);
            if ($user) {
                if($user['email_verify_status']==1){
                    $userMail=$user['username'];
                    //dd($userMail);
                    $this->Auth->setUser($user);
                    //$this->sendmail($userMail,'Welcome , Logged In Successfully');

                    if($user['role'] =='admin'){
                        if($user['user_profile_updated']==0){
                            return $this->redirect(['controller' => 'Merchants','action' => 'profileSetup', 'prefix' =>'admin']);
                        }else{
                            return $this->redirect(['controller' => 'Users','action' => 'dashboard', 'prefix' =>'admin']);
                        }
                    }elseif($user['role'] =='superadmin'){
                        return $this->redirect(['controller' => 'Users','action' => 'dashboard','prefix' =>'superadmin']);
                    }elseif($user['role'] =='user'){
                        //return $this->redirect(['controller' => 'Users','action' => 'profile']);
                        if($user['user_profile_updated']==0){
                            return $this->redirect(['controller' => 'Users','action' => 'profile']);
                        }else{
                            return $this->redirect(['controller' => 'Pages','action' => 'index']);
                        }
                    }  
                }else{
                    $this->set('loggedIn',false);
                    $this->Flash->error(__('Please Verify your email to login !!!'));
                    return $this->redirect($this->referer());
                }            
                //return $this->redirect(['controller' => 'Customers','action' => 'index']);
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function chklogin()
    {
        $this->viewBuilder()->setLayout(false);
        if ( $this->request->is('post') ) {
            $user = $this->Auth->identify();
            if ($user) {
                if($user['status']==1){
                    if($user['email_verify_status']==1){
                        $this->Auth->setUser($user);
                        if($user['role'] =='user'){
                            if($user['user_profile_updated']==0){
                                return $this->redirect(['controller' => 'Users','action' => 'profile']);
                            }else{
                                return $this->redirect($this->referer());
                            }
                            $this->Flash->success(__('Logged In Successfully!'));
                        }elseif($user['role'] =='superadmin'){
                            return $this->redirect(['controller' => 'Users','action' => 'dashboard', 'prefix' =>'superadmin']);
                        }elseif($user['role'] =='admin'){
                            if($user['user_profile_updated']!=100){
                                return $this->redirect(['controller' => 'Merchants','action' => 'profileSetup', 'prefix' =>'admin']);
                            }else{
                                return $this->redirect(['controller' => 'Users','action' => 'dashboard', 'prefix' =>'admin']);
                            }
                        }     
                    }else{
                        $this->set('loggedIn',false);
                        $this->Flash->error(__('Please Verify your email to login !!!'));
                        return $this->redirect($this->referer());
                    }  
                }else{
                    $this->set('loggedIn',false);
                    $this->Flash->error(__('You are not authorized.PleaseContact Easifyy.com !!!'));
                    return $this->redirect($this->referer());
                }    
            }
            $this->set('loggedIn',false);
            $this->Flash->error(__('Invalid username or password, try again'));
            return $this->redirect($this->referer());
        }
    }

    public function signout()
    {
        $this->viewBuilder()->setLayout(false);
        $this->Flash->set('Logged Out Successfully!', [
            'element' => 'success'
        ]);
        $this->Auth->logout();
        return $this->redirect($this->referer());

    }

    public function logout()
    {
        $this->Auth->logout();
        $this->Flash->set('Logged Out Successfully!', [
            'element' => 'success'
        ]);
        return $this->redirect('https://easifyy.com');
       // return $this->redirect($this->Auth->logout());
    }


    public function forgotPassword(){

    	$this->viewBuilder()->setLayout('login');	
    	if ($this->request->is('post')) {
		    
		    if (!empty($this->request->getData())) {
		        $email = $this->request->getData('username');
		        $userData = $this->Users->findByUsername($email)->first();
		     	if (!empty($userData)) {
					
					$password = sha1(Text::uuid());

					$password_token = Security::hash($password, 'sha256', true);

					$hashval = sha1($userData->username . rand(1, 100));
					$reset_token_link = Router::url(['controller' => 'Users', 'action' => 'resetPassword'], TRUE) . '/' . $password_token . '#' . $hashval;
					$emaildata = [$userData->username, $reset_token_link];

					//$this->getMailer('SendEmail')->send('forgotPasswordEmail', [$emaildata]);

                    $email = new Email();
                    $email
                        ->template('default','easify') //->template('template','layout')
                        ->setViewVars(
                                    [
                                    ]
                                )
                        ->emailFormat('html')
                        ->from(['connect@easifyy.com' => 'Easifyy'])
                        ->to($userData->username)
                        ->subject('Forgot Password Email - Easifyy')
                        ->send($emaildata);  

					$usersTable = TableRegistry::getTableLocator()->get('Users');
					$user = $usersTable->newEntity();
					$user->reset_password_token = $password_token;
					$user->hashval = $hashval;
					$user->id = $userData->id;

					if( $usersTable->save($user) ) {
						$this->Flash->success('Please click on password reset link, sent in your email address to reset password. '.$reset_token_link);
					} else {
						$this->Flash->error('Sorry! Email address is not available here.');	
					}
				} else {
		            $this->Flash->error('Sorry! Email address is not available here.');
		        }
		     }
		 }

    }

    public function resetPassword($token = null) {

    	$this->viewBuilder()->setLayout('login');
        if (!empty($token)) {

            $user = $this->Users->findByResetPasswordToken($token)->first();

            if ($user) {
                
                if ( !empty( $this->request->getData() ) ) {
                    $user = $this->Users->patchEntity($user, [
                        'password' => $this->request->getData('new_password'),
                        'new_password' => $this->request->getData('new_password'),
                        'confirm_password' => $this->request->getData('confirm_password')
                            ], ['validate' => 'password']
                    );

                    $hashval_new = sha1($user->username . rand( 1, 100));
                    $user->password_reset_token = $hashval_new;

                    if ($this->Users->save($user)) {
                        $this->Flash->success('Your password has been changed successfully');
                        $emaildata = ['name' => $user->first_name, 'email' => $user->email];
                        
                        //$this->getMailer('SendEmail')->send('changePasswordEmail', [$emaildata]); //Send Email functionality

                        $this->redirect(['action' => 'login']);
                    } else {
                        $this->Flash->error('Error changing password. Please try again!');
                    }
                }
            } else {
                $this->Flash->error('Sorry your password token has been expired.');
            }
        } else {
            $this->Flash->error('Error loading password reset.');
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function order(){
        $this->loadModel('orders');
        $loguser = $this->request->session()->read('Auth.User');
        //print_r($loguser);die();
        $query =$this->orders->find()->where(['user_id' => $loguser['id']])
                    ->contain(['OrderItems','OrderStatuses',
                        'OrderItems.Products' => [
                            'fields' => [
                                'Products.title',
                            ]
                        ]
                    ])->limit(12);

        $result = $query->toArray();
        //dd($result);
        $this->set('pServices', $result);
        $this->viewBuilder()->setLayout('frontend');

    }
    public function service(){
        $this->viewBuilder()->setLayout('frontend');
    }

    public function signup(){
        $this->loadModel('Merchants');        
        $categories = $this->Merchants->Categories->find('list', ['limit' => 200])->where(['parent_id IS' => null,'user_id IS' => null ]);
        $this->set(compact('categories'));
        $this->viewBuilder()->setLayout('frontend');
    }

    public function seller(){
        $this->loadModel('Merchants');

        // Captcha Validations
        if (empty($this->request->getData('g-recaptcha-response'))){
            $this->Flash->error(__('Please Fill the captcha'));
            return $this->redirect(['action' => 'signup']);
        }

        //$states = $this->Merchants->States->find('list', ['limit' => 200]);
        $cities = $this->Merchants->Cities->find('list', ['limit' => 200]);
        //$categories = $this->Merchants->Categories->find()->where(['parent_id IS' => null ])->limit(12);
        $categories = $this->Merchants->Categories->find('list', ['limit' => 200])->where(['parent_id IS' => null,'user_id IS' => null ]);
        $this->set(compact('cities','categories'));
        $this->viewBuilder()->setLayout('frontend');
        if ( $this->request->is('post') ) {
            if ($this->request->getData('password') !== $this->request->getData('password_confirm')){
                $this->Flash->error(__('Please fill the Password Same in both Inputs!!!'));
                return $this->redirect(['action' => 'signup']);
            }
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => true]);
            $BaseController = new \App\Controller\BaseController();  
            $user->email_verification_token=$BaseController->__generateEmailVerificationToken() ;
            $user->email_token_created_at = date('Y-m-d H:i:s');

            $user->user_profile_image='';
            $user->status=0;
            $user->role='admin';
            //dd($this->request->getData());
            if ($result = $this->Users->save($user)) {
                $user_id=$user->id;
                $merchant = $this->Merchants->newEntity();
                $merchant = $this->Merchants->patchEntity($merchant, $this->request->getData());
                $merchant->user_id = $user_id;
                $merchant->store_name = $this->request->getData('first_name'); 
                $myPhone=$this->request->getData('phone_Code_1').$this->request->getData('phone');
                $merchant->phone_1 =$myPhone;
                $merchant->name_prefix =$this->request->getData('name_prefix');
                $merchant->phone_2 ='';
                $merchant->service_profession = $this->request->getData('service_profession');
                if ($this->Merchants->save($merchant)) {
                    $authUser = $this->Users->get($result->id)->toArray();
                    //$this->Auth->setUser($authUser);
                    $emaildata = ['name' => $user->first_name, 'email' => $user->username];
                    $email=$user->username;

                    $BaseController->sendEmailVerificationEmail($authUser);

                    $msg='';
                    $email = new Email();
                    $email
                      ->template('easify_new_user_register','easify') //->template('template','layout')
                      ->setViewVars(
                                  [
                                    'first_name' => $user->first_name,
                                    'last_name' => $user->last_name,
                                    'username' => $user->username,
                                    'phone_no' => $user->phone,
                                    'user' => "PSP",
                                  ]
                              )
                      ->emailFormat('html')
                      ->from(['connect@easifyy.com' => 'Easifyy'])
                      ->to('easifyy@gmail.com')
                      ->bcc('vinit.grintech@gmail.com')
                      ->subject('New PSP Registered Successfully - Easifyy')
                      ->send($msg);

                    // $this->sendmail($email,'Account Setup Successfully!!!');
                    // $msg=" Seller Name :".$user->first_name.', Phone No. :'.$user->phone;
                    // $this->sendmail('easifyy@gmail.com','User Siggned In Succesffuly With the email address :'.$email.$msg);
                    //$this->getMailer('SendEmail')->send('changePasswordEmail', [$emaildata]); //Send Email functionality
                    //$this->Flash->success(__('The merchant has been saved.'));
                    return $this->redirect(['controller' => 'Users','action' => 'verifyEmail']);
                    // return $this->redirect(['controller' => 'Merchants','action' => 'profileSetup', 'prefix' =>'admin']);
                }else{
                    $this->Flash->error(__('The UserName Already In used .'));
                    return $this->redirect(['action' => 'signup',"type" => "psp"]);
                }
            }else{
                //print_r($user->errors());
                $this->Flash->error(__('The UserName Already In used .'));
                return $this->redirect(['action' => 'signup',"type" => "psp"]);
            }
        }
    }
    public function thankyou(){
        $this->viewBuilder()->setLayout('frontend');
    }

    public function dashboard(){
        $this->loadModel('Orders');
        $this->loadModel('Categories');
        
        $totalPaymnt=0;
        $loguser = $this->request->session()->read('Auth.User');
        $user_id = $this->Auth->user('id');
        $User = $this->Users->get($user_id);
        $order_total = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'user_id'=>$user_id)))->count();

        // $order_total = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'user_id'=>$user_id)))->count();
        $virtualFields = array('total' => 'SUM(gross_total)');
        $total = $this->Orders->find('all', 
            array(
                array('fields' => array('total'), 
                      'conditions'=>array('user_id'=>$user_id),
                      'group' => array('user_id')
                    )
                )
        )->all();
        
        $payment = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'user_id'=>$user_id)));
        $payment->select( ['totalpmnt' => $payment->func()->sum('gross_total') ]);
        $totalPaymntArr= $payment->toArray();
        $totalPaymnt=$totalPaymntArr[0]->totalpmnt;
        //dd( $total);

        $refundedOrders = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'user_id'=>$user_id,'order_status_id'=>7)))->count();
        $cancelOrders = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'user_id'=>$user_id,'order_status_id'=>6)))->count();
        $completeOrders = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'user_id'=>$user_id,'order_status_id'=>3)))->count();

        $categories = $this->Categories->find('all',array('conditions'=>array('delete_status'=>1,'user_id'=>$user_id)));
        $profileStatus=$User->user_profile_updated;
        //echo '<pre>';
            //print_r($User->user_profile_updated);
        //echo '</pre>';
        //dd($order_total);
        $this->set('loguser', $loguser);
        $this->set('order_total', $order_total); 
        $this->set('categories', $categories); 
        $this->set('profileStatus', $profileStatus);
        $this->set('totalPaymnt', $totalPaymnt);
        $this->set('refundedOrders', $refundedOrders);
        $this->set('cancelOrders', $cancelOrders);
        $this->set('completeOrders', $completeOrders);
        
        //dd($loguser);
        
        $this->viewBuilder()->setLayout('user');
    }

    public function profile(){
        $this->loadModel('Addresses');
        $this->loadModel('Users');

        $loguser = $this->request->session()->read('Auth.User');
        $userId =$loguser['id'];
        $User = $this->Users->find()->where(['id' =>$userId])->first();
        $Address= $this->Addresses->find()->where(['user_id' =>$userId])->first();
        //dd($address);
        $profileStatus="new";
        if(!is_null($Address)){
            $profileStatus="old";
        }
        //dd($profileStatus);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //dd($this->request->getData());
            if( $Address ){
                $Address = $this->Addresses->patchEntity($Address, $this->request->getData());
                $Address->user_id=$userId;
                $Address->name= $this->request->getData('first_name'); 
                $Address->cmp_name= $this->request->getData('cmp_name'); 
                $Address->address_line_1= $this->request->getData('address_line_1'); 
                $Address->address_line_2= $this->request->getData('address_line_2'); 
                $Address->pan_number= $this->request->getData('pan_number'); 
                $Address->gst_number= $this->request->getData('gst_number'); 

                if ($this->Addresses->save($Address)) {
                    $profilePercentage=100;
                    if($this->request->getData('cmp_name')==""){
                        $profilePercentage=$profilePercentage-10;
                    }
                    if($this->request->getData('pan_number')==""){
                        $profilePercentage=$profilePercentage-10;
                    }
                    if($this->request->getData('gst_number')==""){
                        $profilePercentage=$profilePercentage-10;
                    }
                    /*if($this->request->getData('gst_number')=="" && $this->request->getData('pan_number')==""){
                        $profilePercentage=75;
                    }*/
                    $User->user_profile_updated=$profilePercentage;
                    $this->Users->save($User);
                    //$this->Flash->success(__('The User has been updated Successfully.'));
                    return $this->redirect(['action' => 'dashboard']);
                }else{
                    print_r($userAddress->errors());
                }
            }else{
                $userAddress = $this->Addresses->newEntity();
                $userAddress = $this->Addresses->patchEntity($userAddress, $this->request->getData());
                $userAddress->user_id=$userId;
                $userAddress->name= $this->request->getData('first_name'); 
                if ($this->Addresses->save($userAddress)) {
                    $this->Flash->success(__('The User has been updated Successfully.'));
                }else{
                    print_r($userAddress->errors());
                }
            }
        }
        $states = $this->Users->Addresses->States->find('list', ['limit' => 200]);
        $cities = $this->Users->Addresses->Cities->find('list', ['limit' => 200]);
        $User = $this->Users->get($userId, [
            'contain' => ['Addresses'],
        ]);
        $this->set(compact('User','Addresses','states', 'cities','profileStatus'));

        //dd($Addresses);
        $this->viewBuilder()->setLayout('user');
    }

    public function profileView(){
        $this->loadModel('Addresses');
        $this->loadModel('Users');

        $loguser = $this->request->session()->read('Auth.User');
        $userId =$loguser['id'];
        $User = $this->Users->find()->where(['id' =>$userId])->first();

        $Addresses = $this->Addresses->find()->where(['user_id' =>$userId])->first();
        $states = $this->Users->Addresses->States->find('list', ['limit' => 200]);
        $cities = $this->Users->Addresses->Cities->find('list', ['limit' => 200]);
        

        $User = $this->Users->get($userId, [
            'contain' => ['Addresses'],
        ]);
        $this->set(compact('User','Addresses','states', 'cities'));

        $this->viewBuilder()->setLayout('user');
    }

    public function helpCenter(){
        $this->loadModel('Faq');
        $this->loadModel('Articles');
        $this->loadModel('YoutubeVideos');

        $faqs =$this->Faq->find()->all();

        $articles =$this->Articles->find()->all();
        $YoutubeVideos =$this->YoutubeVideos->find()->all();

        $this->set(compact('faqs','articles','YoutubeVideos'));
        $this->viewBuilder()->setLayout('user');
    }
    public function sendmail($UserEmail,$msg){
        $this->viewBuilder()->setLayout(false);
        $email = new Email('default');
        $email->from(['connect@easifyy.com' => 'Easifyy'])
        ->to($UserEmail)
        ->subject('Welcome')
        ->send($msg);
    }

    public function jobInvitaion() {
        $this->loadModel('Orders');
        $this->loadModel('Notifications');
        $this->loadModel('Merchants');
        $this->loadModel('OrderInvitation');

        $this->viewBuilder()->setLayout('user');
        //$this->autoRender = false;
        $serviceid=base64_decode($_GET['serviceid']);
        $merchant_id=base64_decode($_GET['mid']);
        $orderid=base64_decode($_GET['oid']);

        $merchant = $this->Merchants->find('all')
        ->where(['Merchants.id' => $merchant_id])
        ->select(['user_id'])
        ->first();
        if( $merchant ){
            $pspUserId= $merchant->user_id;
        }

        $query = $this->Orders->find('all', [
            'conditions' => ['Orders.id' => $orderid],
            'fields' =>['merchant_id'], 
        ]);
        //$this->Orders->id = $orderid;
        //$this->Orders->saveField('order_status_id', 2);

        $users= TableRegistry::get('Orders'); 
        $user = $users->get($orderid); // Return article with id = $id (primary_key of row which need to get updated)
        $user->order_status_id = 2;
        $users->save($user);
         

        $query->disableHydration();
        $row = $query->first();
        //dd($orderid);
        //dd($row);
        $orderInvitationID = $this->OrderInvitation->find('all')
        ->where(['OrderInvitation.order_id' => $orderid,
                'OrderInvitation.user_id' => $merchant->user_id,
                'OrderInvitation.view_status' => 0])
        ->select(['id'])
        ->first();
        
        //dd($orderInvitationID);
        if($orderInvitationID!=NULL){
            if($row['merchant_id'] == 0) {
                $user = $this->Orders->get($orderid); // Return article with id = $id (primary_key of row which need to get updated)
                $user->merchant_id = $merchant_id;
                $user->order_status_id = 2;
                // $user->email= abc@gmail.com; // other fields if necessary
                if($this->Orders->save($user)){
                    //dd($orderid);
                    $orderInv = $this->OrderInvitation->get($orderInvitationID->id); 
                    $orderInv->view_status = 1;//Accepted
                    $orderNotification = $this->Notifications->newEntity();
                    $orderNotification->user_id=$pspUserId;
                    $orderNotification->order_id=$orderid;
                    $orderNotification->type="inivation-accepted";
                    $orderNotification->message="PSP Accepted the Order ";
                    $orderNotification->viewed_status= 0; 
                    $this->Notifications->save($orderNotification);
                    $message='Job Accepted Successfully';
                } else {
                    //$user->errors();
                    // something went wrong
                    $orderInv = $this->OrderInvitation->get($orderInvitationID->id); 
                    $orderInv->view_status = -1;//Rejected

                    $orderNotification = $this->Notifications->newEntity();
                    $orderNotification->user_id=$pspUserId;
                    $orderNotification->order_id=$orderid;
                    $orderNotification->type="inivation-rejected";
                    $orderNotification->message="PSP Rejected the Order ";
                    $orderNotification->viewed_status= 0; 
                    $this->Notifications->save($orderNotification);

                    $message='Job No Longer available';
                }
                $this->OrderInvitation->save($orderInv);
            } else {
                $message='Job No Longer available';
            }
        }else{
            $message='Thanks For your Interest But you Can\'t Accept the Order after Rejecting the Invitation';
        }
        $this->set(compact('message'));
    }

    public function jobReject() {
        $this->loadModel('Notifications');
        $this->loadModel('Merchants');
        $this->loadModel('OrderInvitation');

        $this->viewBuilder()->setLayout('user');
        $serviceid=base64_decode($_GET['serviceid']);
        $merchant_id=base64_decode($_GET['mid']);
        $orderid=base64_decode($_GET['oid']);

        /* order notification entry in notifcations table */
        $merchant = $this->Merchants->find('all')
        ->where(['Merchants.id' => $merchant_id])
        ->select(['user_id'])
        ->first();
        if( $merchant ){
            $pspUserId= $merchant->user_id;
        }

        $orderInvitationID = $this->OrderInvitation->find('all')
        ->where(['OrderInvitation.order_id' => $orderid,
                'OrderInvitation.user_id' => $merchant->user_id,
                'OrderInvitation.view_status' => 0])
        ->select(['id'])
        ->first();
        if($orderInvitationID!=NULL){
            //dd($orderInvitationID->id);
            $orderInv = $this->OrderInvitation->get($orderInvitationID->id); 
            $orderInv->view_status = -1;//Rejected
            $this->OrderInvitation->save($orderInv);

            $orderNotification = $this->Notifications->newEntity();
            $orderNotification->user_id=$pspUserId;
            $orderNotification->order_id=$orderid;
            $orderNotification->type="inivation-declined";
            $orderNotification->message="PSP declined the Order ";
            $orderNotification->viewed_status= 0; 
            $this->Notifications->save($orderNotification);

            $message='Service offer rejected. We look forward with you to work in future.';
        }else{
            $message='Service offer Already rejected by You. We look forward with you to work in future.';

        }
        $this->set(compact('message'));
    }

    public function callBackRequest(){
        $this->viewBuilder()->setLayout(false);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->loadModel('ContactUs');
            $contact_us = $this->ContactUs->newEntity();
            $contact['first_name'] = trim($this->request->getData('emailInput'));
            $contact['last_name'] = "";
            $contact['email'] = trim($this->request->getData('emailInput'));
            $contact['Phone'] = trim($this->request->getData('phoneInput'));
            $contact['message'] = "Call back request From the Customer ";
            $contact_us = $this->ContactUs->patchEntity($contact_us,$contact);
            if($this->ContactUs->save($contact_us)){
                echo "Query Raised Succesffully , We will Contact you Soon !";
            }else{
                echo "Error while saving Data";
            }
            die();
        }
    }

    public function newsletterSubscribe(){
        $this->viewBuilder()->setLayout(false);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->loadModel('Newsletter');
            $newsletter_data = $this->Newsletter->newEntity();
            $newsletter['email'] = trim($this->request->getData('emailInput'));
            $newsletter_data = $this->Newsletter->patchEntity($newsletter_data,$newsletter);
            if($this->Newsletter->save($newsletter_data)){
                echo "Subscribed To Newsletter Successfully !";
            }else{
                //print_r($newsletter_data->errors());
                echo "You Alreday Subscribed To Newsletter Successfully !";
            }
            die();
        }
    }

    public function viewPdf() {
        
    }

    public function generatePdfSuperadmin() {
        
    }

    public function googlelogin(){
        
        $this->viewBuilder()->setLayout(false);
        
        $this->loadModel('Users');
        
        $user="";
        if ($this->request->is(['patch', 'post', 'put'])) {
            //dd($this->request->getData());
            $myName=$this->request->getData('first_name');
            $myEmail=$this->request->getData('username');

            $user = $this->Users->find()->where(['username' =>$myEmail])->first();
            if(isset($user)) {
                if($user->is_social==0) {
                    echo 'Already';
                    die();
                } else {
                    if($user->role=='user') {
                        $authUser = $this->Users->get($user->id)->toArray();
                        $this->Auth->setUser($authUser);
                        echo 'success';
                        die();
                    } else {
                        echo 'Already';
                        die();
                    }
                   
                }
                
            }else {
                $BaseController = new \App\Controller\BaseController();  
                $user = $this->Users->newEntity();
                $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => false]);
                $user->user_profile_image='';
                $user->role='user';
                $user->status=0;
                $user->is_social=1;
                $hash = $BaseController->__generateEmailVerificationToken() ;  
                $user->email_verification_token=$hash;
                $user->email_verify_status=1;
                $user->status=1;
                $user->email_token_created_at=date('Y-m-d H:i:s');
                $result = $this->Users->save($user);
                $authUser = $this->Users->get($result->id)->toArray();
                $this->Auth->setUser($authUser);
                
                echo 'new user';
                die();
            }
        }
        
    }   

    public function googleloginmain(){
        
        $this->viewBuilder()->setLayout(false);
        
        $this->loadModel('Users');
        
        $user="";
        if ($this->request->is(['patch', 'post', 'put'])) {
            //dd($this->request->getData());
            $myName=$this->request->getData('first_name');
            $myEmail=$this->request->getData('username');

            $user = $this->Users->find()->where(['username' =>$myEmail])->first();
            if(isset($user)) {
                if($user->is_social==0) {
                    echo 'Not Registered';
                    die();
                } else {
                    if($user->role=='user') {
                        $authUser = $this->Users->get($user->id)->toArray();
                        $this->Auth->setUser($authUser);
                        echo 'success';
                        die();
                    } elseif($user->role == 'admin') {
                        $authUser = $this->Users->get($user->id)->toArray();
                        $this->Auth->setUser($authUser);
                        echo 'admin';
                        die();
                    } else {
                        echo 'Already';
                        die();
                    }
                   
                }
                
            }else {
                // $BaseController = new \App\Controller\BaseController();  
                // $user = $this->Users->newEntity();
                // $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => false]);
                // $user->user_profile_image='';
                // $user->role='user';
                // $user->status=0;
                // $user->is_social=1;
                // $hash = $BaseController->__generateEmailVerificationToken() ;  
                // $user->email_verification_token=$hash;
                // $user->email_verify_status=1;
                // $user->status=1;
                // $user->email_token_created_at=date('Y-m-d H:i:s');
                // $result = $this->Users->save($user);
                // $authUser = $this->Users->get($result->id)->toArray();
                // $this->Auth->setUser($authUser);
                
                echo 'new user';
                die();
            }
        }
        
    } 

    public function googleloginpsp(){
        $this->viewBuilder()->setLayout(false);
        
        $this->loadModel('Users');
        
        $user="";
        if ($this->request->is(['patch', 'post', 'put'])) {
            //dd($this->request->getData());
            $myName=$this->request->getData('first_name');
            $myEmail=$this->request->getData('username');

            $user = $this->Users->find()->where(['username' =>$myEmail])->first();
            if(isset($user)) {
                if($user->is_social==0) {
                    echo 'Already';
                    die();
                } else {
                    if($user->role == 'admin') {
                        $authUser = $this->Users->get($user->id)->toArray();
                        $this->Auth->setUser($authUser);
                        echo 'success';
                        die();
                    } else {
                        echo 'Already';
                        die();
                    }
                    
                }
                
            } else {
                $BaseController = new \App\Controller\BaseController();  
                $user = $this->Users->newEntity();
                $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => false]);
                $user->user_profile_image='';
                $user->role='admin';
                $user->status=0;
                $user->is_social=1;
                $hash = $BaseController->__generateEmailVerificationToken() ;  
                $user->email_verification_token=$hash;
                $user->email_verify_status=1;
                $user->status=1;
                $user->email_token_created_at=date('Y-m-d H:i:s');
                $result = $this->Users->save($user);
                
                $this->loadModel('Merchants');

                $user_id=$result->id;
                $merchant = $this->Merchants->newEntity();
                $merchant = $this->Merchants->patchEntity($merchant, $this->request->getData());
                $merchant->user_id = $user_id;
                $merchant->name_prefix =$this->request->getData('first_name');
                $merchant->username =$this->request->getData('username');
                $merchant->store_name =$this->request->getData('first_name');
                $merchant->status =1;
                $merchant->delete_status = 1;
                if($this->Merchants->save($merchant)) {
                    
                } else {
                    
                }
                
                $authUser = $this->Users->get($result->id)->toArray();
                $this->Auth->setUser($authUser);

                echo 'new user';
                die();
            }
        }
        
    }

    public function changePassword(){
        //dd("asb");
        $this->viewBuilder()->setLayout('user');

        if ($this->request->is(['patch', 'post', 'put'])) {
            //dd("as");
            $user_id = $this->Auth->user('id');
            $user = $this->Users->get($user_id);
            //$user = $this->Users->patchEntity($user, [
            //    'password' => $this->request->data['newPassword']]);

            if ($user) {
            
                if($this->request->getData('newPassword')!=$this->request->getData('confirmPassword')){
                    $this->Flash->error('New Password and confirm password doesnot Match!!!');
                    $this->redirect(['action' => 'changePassword']);
                }
                //$hash = Security::hash($this->request->getData('prePassword'), 'sha256', true);
                //echo $hash;
                //dd($user->password);
                //dd(check($this->request->getData('prePassword'),$user->password));
                if ( !empty( $this->request->getData() ) ) {
                    $user = $this->Users->patchEntity($user, [
                        'password' => $this->request->getData('newPassword'),
                        'new_password' => $this->request->getData('newPassword'),
                        'confirm_password' => $this->request->getData('confirmPassword')
                        ]
                    );

                    $hashval_new = sha1($user->username . rand( 1, 100));
                    $user->reset_password_token = $hashval_new;

                    if ($this->Users->save($user)) {
                        $this->Flash->success('Your password has been changed successfully');
                        $emaildata = ['name' => $user->first_name, 'email' => $user->email];
                        
                        //$this->getMailer('SendEmail')->send('changePasswordEmail', [$emaildata]); //Send Email functionality

                        $this->redirect(['action' => 'changePassword']);
                    } else {
                        $this->Flash->error('Error changing password. Please try again!');
                    }
                }
            } else {
                $this->Flash->error('Sorry your password token has been expired.');
            }
        }
    }
}
