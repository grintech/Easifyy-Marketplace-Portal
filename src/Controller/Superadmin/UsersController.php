<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\ORM\TableRegistry;
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
    public function index()
    {
        $this->paginate = [
            'conditions' => [
                    'Users.delete_status'=>1,
                    'Users.role'=>'user',
                ],
        ];
        //$users = $this->paginate($this->Users);
        $users = $this->Users->find('all');
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Addresses',
            'Addresses.Cities'=>[
                'fields' => [
                    'Cities.id',
                    'Cities.name',
                ],
            ],
            'Addresses.States'=>[
                'fields' => [
                    'States.id',
                    'States.name',
                ],
            ], 'CartItems', 'OrderPayments',
            'Orders','Orders.Products' => [
                'fields' => [
                    'Products.id',
                    'Products.title',
                ],
            ], 
            /*'Orders.Merchants' => [
                'fields' => [
                    'Merchants.id',
                    'Merchants.last_name',
                    'Merchants.store_name',
                ],
            ],*/
            'Reviews', 'UserLogs'],
        ]);

        $this->set('user', $user);
    }

    public function dashboard()
    {
        
    	$this->loadModel('Dashboard');
        
        $bannerQuery = $this->Dashboard->find('all', [
            'conditions' => ['Dashboard.meta_key' => 'banner_data'],
        ]);
        $bannerQuery->disableHydration();
        $bannerData = $bannerQuery->first();
        $bannerData = json_decode($bannerData['meta_value'],true);

        $talentQuery = $this->Dashboard->find('all', [
            'conditions' => ['Dashboard.meta_key' => 'talent_data'],
        ]);
        $talentQuery->disableHydration();
        $talentData = $talentQuery->first();
        $talentData = json_decode($talentData['meta_value'],true);

        $workdoneQuery = $this->Dashboard->find('all', [
            'conditions' => ['Dashboard.meta_key' => 'workdone_data'],
        ]);
        $workdoneQuery->disableHydration();
        $workdoneData = $workdoneQuery->first();
        $workdoneData = json_decode($workdoneData['meta_value'],true);


        $affiliateQuery = $this->Dashboard->find('all', [
            'conditions' => ['Dashboard.meta_key' => 'affiliate_data'],
        ]);
        $affiliateQuery->disableHydration();
        $affiliateData = $affiliateQuery->first();
        $affiliateData = json_decode($affiliateData['meta_value'],true);


        $howItWorksQuery = $this->Dashboard->find('all', [
            'conditions' => ['Dashboard.meta_key' => 'how_it_works'],
        ]);
        $howItWorksQuery->disableHydration();
        $howItWorksData = $howItWorksQuery->first();
        $howItWorksData = json_decode($howItWorksData['meta_value'],true);

        $id = $user_id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => ['Addresses', 'CartItems', 'CouponRedeems', 'Merchants', 'OrderNotifications', 'OrderPayments', 'Orders', 'Reviews', 'RewardPoints', 'Runners', 'Supports', 'UserLogs', 'UserSocialProfiles'],
        ]);
        // Get the count of users
        $user_total = $this->Users->find('all', array('conditions'=>array('delete_status'=>1,'role'=>'user')))->count();

        $this->loadModel('Merchants');
        $vendor_total = $this->Merchants->find('all', array(
                            'contain' => ['Users', 'States', 'Cities'],
                            'conditions' => [
                                'Merchants.delete_status'=>1,
                                ],
                            )
                        )->count();
        
        $this->loadModel('Orders');
       
                           
        $order_total = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1)))->count();
        
        $ongoingOrders = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'order_status_id'=>2)))->count();
        $processingOrders = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'order_status_id'=>1)))->count();
        $refundedOrders = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'order_status_id'=>7)))->count();
        $cancelOrders = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'order_status_id'=>6)))->count();
        $completedOrders = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'order_status_id'=>3)))->count();

        $unReadNotifications = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'superadmin_view'=>0,'order_status_id'=>1)))->count();

        $payment = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'order_status_id !='=>7)));
        $payment->select( ['totalpmnt' => $payment->func()->sum('gross_total') ]);
        $totalPaymntArr= $payment->toArray();
        $totalPaymentRecieved=$totalPaymntArr[0]->totalpmnt;

        $cpayment = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'order_status_id'=>6)));
        $cpayment->select( ['totalpmnt' => $payment->func()->sum('gross_total') ]);
        $ctotalPaymntArr= $cpayment->toArray();
        $ctotalPaymentRecieved=$ctotalPaymntArr[0]->totalpmnt;

        $rpayment = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'order_status_id'=>7)));
        $rpayment->select( ['totalpmnt' => $payment->func()->sum('gross_total') ]);
        $rtotalPaymntArr= $rpayment->toArray();
        $rtotalPaymentRecieved=$rtotalPaymntArr[0]->totalpmnt;
        
        // Payment Request Count 
        $this->loadModel('Notifications');
        $OrderNotifications = $this->Notifications->find('all')
            ->where([ 
                'Notifications.type' => 'payment-from-easifyy',
                'viewed_status'=>0,
        ])->count();

        $unReadNotifications =$unReadNotifications + $OrderNotifications;

        // $orderfinal = $this->Orders->find('all')
        //     ->where([ 'Orders.merchant_id' => $merchant_id,'order_status_id' => 3,'Orders.delete_status' => 1 ])
        //     ->contain([
        //         'Products' => [],
        //         'OrderModes' => [],
        //         'Users' => [],
        //         'OrderItems' => [],
        //         'OrderStatuses' => [],
        //         'Coupons' => [],
        //     ])
        //     ->order(['Orders.created' => 'DESC'])
        //     ->all();
        $orderfinal = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'order_status_id'=>3)));

        $this->set(array('user' => $user, 'user_total' => $user_total,'order_total' => $order_total,'vendor_total'=> $vendor_total,
                        'OrderNotifications'=>$OrderNotifications,'talentData'=>$talentData,'bannerData'=>$bannerData,'totalPaymentRecieved'=>$totalPaymentRecieved,
                        'home_page_sectionsData'=>$home_page_sectionsData,'ongoingOrders'=>$ongoingOrders,'unReadNotifications'=>$unReadNotifications,
                        'workdoneData'=>$workdoneData,'affiliateData'=>$affiliateData,'howItWorks'=>$howItWorksData,'processingOrders'=>$processingOrders,'refundedOrders'=>$refundedOrders,'cancelOrders'=>$cancelOrders,'completedOrders'=>$completedOrders,'ctotalPaymentRecieved'=>$ctotalPaymentRecieved,'rtotalPaymentRecieved'=>$rtotalPaymentRecieved,'orderfinal'=>$orderfinal));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->email_verify_status=1;
            $mm_dir = new Folder(WWW_ROOT . 'upload_dir', true, 0755);
            $target_path = $mm_dir->pwd() . DS . $this->request->getData('user_profile_image.name');
            
            if(move_uploaded_file($this->request->getData('user_profile_image.tmp_name'), $target_path)) {
                $user->user_profile_image= $this->request->getData('user_profile_image.name');
                //die('here1');
            } else {
                //die('here');
                $user->user_profile_image= '';
            }
            $user->user_profile_image= $this->request->getData('user_profile_image.name');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $data=$user;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            if($this->request->getData('user_profile_image.name')) {
                $mm_dir = new Folder(WWW_ROOT . 'upload_dir', true, 0755);
                $target_path = $mm_dir->pwd() . DS . $this->request->getData('user_profile_image.name');
                move_uploaded_file($this->request->getData('user_profile_image.tmp_name'), $target_path);
                $user->user_profile_image= $this->request->getData('user_profile_image.name');
            } else {
                $user->user_profile_image=$data->user_profile_image;
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
      
        //$this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleteuserimage($id = null) {
        
        $user = $this->Users->get($id);
        $user->user_profile_image = '';
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been updated.'));
        } else {
            $this->Flash->error(__('The user could not be updated. Please, try again.'));
        }    
        return $this->redirect(['action' => 'edit',$id]);   
    }

    public function saveBanner() {
    	
    	$this->autoRender = false;
    	
    	$bannerData = array(
				
				'heading' => $_POST['heading'],
				
				'description' => $_POST['description'],
				
				'image' =>  $_POST['imgurl'],
			);
    	$bannerData=json_encode($bannerData);

    	$this->loadModel('Dashboard');
        
        $tablename = TableRegistry::get("Dashboard");
        
        $conditions = array('meta_key'=>'banner_data');
        
        $fields = array('meta_value'=>$bannerData);
        
        $tablename->updateAll($fields, $conditions);
        
        echo 'Updated';

    }

        public function saveBannerImage() {
    	    $this->autoRender = false;
			
    	/* Getting file name */
		   $file_name = $_FILES['file']['name'];

		   /* Location */
		   $location = WWW_ROOT . 'banner/'.$file_name;
		   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
		   $imageFileType = strtolower($imageFileType);

		   /* Valid extensions */
		   $valid_extensions = array("jpg","jpeg","png");

		   $response = 0;
		   /* Check file extension */
		   if(in_array(strtolower($imageFileType), $valid_extensions)) {
		      /* Upload file */
		      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
		         $response = 'https://easifyy.com/banner/'.$file_name;
		      } else {
		      	die('upload error');
		      }
		   } else {
		   		die('extension error');
		   }

		   echo $response;
		}


        public function saveTalent() {
            $this->autoRender = false;
            $talentData = array(
                    'talentheading' => $_POST['talentHeading'],
                    'talentButtonLabel' => $_POST['talentButtonLabel'],
                    'talentButtonLink' => $_POST['talentButtonLink'],
                    'image' =>  $_POST['imgurl'],
                );
            $talentData=json_encode($talentData);
            $this->loadModel('Dashboard');
            $tablename = TableRegistry::get("Dashboard");
            $conditions = array('meta_key'=>'talent_data');
            $fields = array('meta_value'=>$talentData);
            $tablename->updateAll($fields, $conditions);
            echo 'Updated';
        }

        public function saveworkdone() {
            $this->autoRender = false;
            $workdoneData = array(
                    'MainHeading' => $_POST['MainHeading'],
                    'SubHeading' => $_POST['SubHeading'],
                    //'description' => $_POST['description'],
                    'workheadsubonehead' => $_POST['workheadsubonehead'],
                    'workheadsubonedesc' => $_POST['workheadsubonedesc'],
                    'workheadsubtwohead' => $_POST['workheadsubtwohead'],
                    'workheadsubtwodesc' => $_POST['workheadsubtwodesc'],
                    'workheadsubthreehead' => $_POST['workheadsubthreehead'],
                    'workheadsubthreedesc' => $_POST['workheadsubthreedesc'],
                    'workheadsubfourhead' => $_POST['workheadsubfourhead'],
                    'workheadsubfourdesc' => $_POST['workheadsubfourdesc'],
                    'image' =>  $_POST['imgsUrl'],
                );
            $workdoneData=json_encode($workdoneData);
            $this->loadModel('Dashboard');
            $tablename = TableRegistry::get("Dashboard");
            $conditions = array('meta_key'=>'workdone_data');
            $fields = array('meta_value'=>$workdoneData);
            $tablename->updateAll($fields, $conditions);
            echo 'Updated';
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

        public function affiliateData() {
            $this->autoRender = false;
            $workdoneData = array(
                    'MainHeading' => $_POST['MainHeading'],
                    'SubHeading' => $_POST['SubHeading'],
                    'description' => $_POST['description'],
                    'image' =>  $_POST['imgurl'],
                );
            $workdoneData=json_encode($workdoneData);
            $this->loadModel('Dashboard');
            $tablename = TableRegistry::get("Dashboard");
            $conditions = array('meta_key'=>'affiliate_data');
            $fields = array('meta_value'=>$workdoneData);
            $tablename->updateAll($fields, $conditions);
            echo 'Updated';
        }

        public function howItWorksData() {
            $this->autoRender = false;
            $howItWorks = array(
                    'mainHeading' => $_POST['mainHeading'],
                    'subHeading1' => $_POST['subHeading1'],
                    'subContainerHeading1' => $_POST['subContainerHeading1'],
                    'subContainerDescription1' =>  $_POST['subContainerDescription1'],
                    'subHeading2' => $_POST['subHeading2'],
                    'subContainerHeading2' => $_POST['subContainerHeading2'],
                    'subContainerDescription2' =>  $_POST['subContainerDescription2'], 
                    'subheading2img' =>  $_POST['subheading2img'], 
                    'subHeading3' => $_POST['subHeading3'],
                    'subContainerHeading3' => $_POST['subContainerHeading3'],
                    'subContainerDescription3' =>  $_POST['subContainerDescription3'], 
                    'subheading3img' =>  $_POST['subheading3img'], 
                    'subHeading4' => $_POST['subHeading4'],
                    'subContainerHeading4' => $_POST['subContainerHeading4'],
                    'subContainerDescription4' =>  $_POST['subContainerDescription4'], 
                    'subheading4img' =>  $_POST['subheading4img'], 
                );
            $howItWorks=json_encode($howItWorks);
            $this->loadModel('Dashboard');
            $tablename = TableRegistry::get("Dashboard");
            $conditions = array('meta_key'=>'how_it_works');
            $fields = array('meta_value'=>$howItWorks);
            $tablename->updateAll($fields, $conditions);
            echo 'Updated';
        }

        public function changePassword(){
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user_id = $this->Auth->user('id');
                $user = $this->Users->get($user_id);
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
