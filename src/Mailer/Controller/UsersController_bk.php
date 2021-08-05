<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Utility\Security; 
use Cake\Routing\Router;
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
        parent::beforeFilter($event);
        $this->loadComponent('Auth');
        $this->Auth->allow( ['login','add','signout','chklogin','forgotPassword','resetPassword','seller']);
    }

    public function add()
    {
        $this->viewBuilder()->setLayout(false);
        $this->loadModel('Users');
        if ($this->request->is('post')) {
            //print_r($this->request);
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => false]);
            $user->user_profile_image='';
            $user->role='user';
            if ($result = $this->Users->save($user)) {
                // Retrieve user from DB
                //$authUser = $this->Users->get($result->id)->toArray();
                //$this->Auth->setUser($authUser);
                $this->Flash->set('Check your mail for account verification.', [
                    'element' => 'success'
                ]);
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The user could not be saved. Please, try again with different Email Address.'));
            return $this->redirect($this->referer());
        }
    }

    public function login()
    {
        // $this->layout = 'login';
        $this->viewBuilder()->setLayout('login');

        // $this->sendNotification();

        if ( $this->request->is('post') ) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if($user['role'] =='admin'){
                    return $this->redirect(['controller' => 'Users','action' => 'dashboard', 'prefix' =>'admin']);
                }elseif($user['role'] =='superadmin'){
                    return $this->redirect(['controller' => 'Users','action' => 'dashboard','prefix' =>'superadmin']);
                }elseif($user['role'] =='user'){
                    return $this->redirect(['controller' => 'Users','action' => 'profile']);
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
                $this->Auth->setUser($user);
                if($user['role'] =='user'){
                    $this->Flash->success(__('Logged In Successfully!'));
                    return $this->redirect($this->referer());
                }elseif($user['role'] =='admin'){
                    return $this->redirect(['controller' => 'Users','action' => 'dashboard','prefix' =>'admin']);
                }elseif($user['role'] =='superadmin'){
                    return $this->redirect(['controller' => 'Users','action' => 'dashboard', 'prefix' =>'superadmin']);
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
        return $this->redirect($this->Auth->logout());
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
					

					// $this->getMailer('SendEmail')->send('forgotPasswordEmail', [$emaildata]);

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
    public function profile(){
        $loguser = $this->request->session()->read('Auth.User');
        $this->set('loguser', $loguser);
        $this->viewBuilder()->setLayout('frontend');
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
    //$this->Auth->allow(array('index','seller')
    public function seller(){

       
        $this->viewBuilder()->setLayout('frontend');

    }
    public function thankyou(){

        
        $this->viewBuilder()->setLayout('frontend');

    }
    public function dashboard(){
        $this->viewBuilder()->setLayout('frontend');

    }
}
