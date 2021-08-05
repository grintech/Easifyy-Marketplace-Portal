<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
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
    private function updateFcmToken( $user_id, $fcm_token, $old_fcm_token ) {
    	
        if( $old_fcm_token == $fcm_token ) return;

        $user = $this->Users->find('all', [
            'contain' => [],
            'conditions' =>['id' => $user_id ]
        ])->first();

        $usersTable = TableRegistry::getTableLocator()->get('Users');
		$user = $usersTable->newEntity();

		$user->id = $user_id;
		$user->fcm_token = $fcm_token;

		if ($usersTable->save($user)) {
		    // The $article entity contains the id now
		    $id = $user->id;
		}
    }

    public function userlogin()
    {
        $this->request->allowMethod(['post', 'put']);
        if ($this->request->is('post')) {
            $email =$this->request->getData('sign_email');
            $password = $this->request->getData('passwd');
            $user = $this->Users->find('all', [
            'contain' => ['Addresses'],
            'conditions' =>['username' =>$email ]
            ])->first();
            if($user){

                $this->updateFcmToken( $user->id, $this->request->getData('fcm_token'), $user->fcm_token );

                if($this->checkPassword( $password,$user)){
                     $this->set([
                        'user' => $user,
                         'status' => 1,
                        '_serialize' => ['status','user']
                    ]);
                }else{
                   $this->set([
                     'message' => 'password is incorrect',
                     'status' => 0,
                     'passError' => 1,
                     '_serialize' => ['status','message','passError']
                ]);  
                }
            }else{
                $this->set([
                    'message' => 'Username is incorrect!',
                     'status' => 0,
                       'emailError' => 1,
                    '_serialize' => ['status','message','emailError']
                ]);
            }
        }
    }

    public function sociallogin()
    {
        if ($this->request->is('post')) {
            $email =$this->request->getData('sign_email');
            $password = $this->request->getData('passwd');
            $user = $this->Users->find('all', [
            'contain' => ['Addresses'],
            'conditions' =>['username' =>$email ]
            ])->first();
            if($user){

            	$this->updateFcmToken( $user->id, $this->request->getData('fcm_token'), $user->fcm_token );

                if( $user->is_social ){
                     $this->set([
                        'user' => $user,
                         'status' => 1,
                        '_serialize' => ['status','user']
                    ]);
                }else{
                   $this->set([
                     'message' => 'password is incorrect',
                     'status' => 0,
                     'passError' => 1,
                     '_serialize' => ['status','message','passError']
                ]);  
                }
            } else {
                $this->set([
                    'message' => 'Username is incorrect',
                     'status' => 0,
                       'emailError' => 1,
                    '_serialize' => ['status','message','emailError']
                ]);
            }
        }
    }

    public function storelogin()
    {
        if ($this->request->is('post')) {
            $email =$this->request->getData('sign_email');
            $password = $this->request->getData('passwd');
            $user = $this->Users->find('all', [
            'contain' => ['Merchants'],
            'conditions' =>['username' =>$email ]
            ])->first();
            if($user){

                $this->updateFcmToken( $user->id, $this->request->getData('fcm_token'), $user->fcm_token );
                if($this->checkPassword( $password,$user)){
                     $this->set([
                        'user' => $user,
                         'status' => 1,
                        '_serialize' => ['status','user']
                    ]);
                }else{
                   $this->set([
                     'message' => 'password is incorrect',
                     'status' => 0,
                     'passError' => 1,
                     '_serialize' => ['status','message','passError']
                ]);  
                }
            }else{
                $this->set([
                    'message' => 'Username is incorrect',
                     'status' => 0,
                       'emailError' => 1,
                    '_serialize' => ['status','message','emailError']
                ]);
            }
        }
    }

    public function userregister()
    {
       
        if ($this->request->is('post')) {
             $email =$this->request->getData('reg_email');
             $password = $this->request->getData('reg_passwd');
             $user = $this->Users->find('all', [
            'contain' => [],
            'conditions' =>['username' =>$email ]
            ])->first();
             if(!$user){
                 $user = $this->Users->newEntity();
                 $user = $this->Users->patchEntity($user, $this->request->getData());
                 $user->role = 'user';
                if ($this->Users->save($user)) {
                    $user = $this->Users->get($user->id, [
                        'contain' => ['Addresses']
                    ]);
                    $this->set([
                        'user' => $user,
                         'status' => 1,
                        '_serialize' => ['status','user']
                    ]);
                }else{
                   // print_r($user->errors);
                    $this->set([
                        'user' => $this->Users,
                         'status' =>0,
                        '_serialize' => ['status','user']
                    ]);
                }
             } else {
                $this->set([
                     'message' => 'Username is already exists',
                     'status' =>0,
                    '_serialize' => ['status','message']
                ]);
            }
        }
    }

    public function userSocialRegister()
    {
       
        if ($this->request->is('post')) {
             $email = $this->request->getData('username');
             // $password = $this->request->getData('reg_passwd');
             $user = $this->Users->find('all', [
	            'contain' => [],
	            'conditions' =>['username' =>$email ]
            ])->first();
            
            if(!$user){
                
                $user = $this->Users->newEntity();
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->role = 'user';
                //$user->username = $email;
                $user->is_social = $this->request->getData('is_social');


                if ($this->Users->save($user)) {
                    $user = $this->Users->get($user->id, [
                        'contain' => ['Addresses']
                    ]);
                    $this->updateFcmToken( $user->id, $this->request->getData('fcm_token') );
                    $this->set([
                        'user' => $user,
                         'status' => 1,
                        '_serialize' => ['status','user']
                    ]);
                }else{
                   // print_r($user->errors);
                    $this->set([
                        'user' => $user->getErrors(),
                         'status' => 0,
                        '_serialize' => ['status','user']
                    ]);
                }
             } else {
                $this->set([
                     'message' => 'Username is already exists',
                     'status' =>0,
                    '_serialize' => ['status','message']
                ]);
            }
        }
    }

    // public function addAddress()
    // {
    //     $this->loadModel('Addresses');
    //     $this->request->allowMethod(['post', 'put']);
    //     if ($this->request->is('post')) {
    //         if($id = $this->request->getData('id') ){
    //             $address = $this->Addresses->get($id, [
    //                 'contain' => [],
    //             ]);
    //         }else{
    //          $address = $this->Addresses->newEntity();   
    //         }
            
    //         $address = $this->Addresses->patchEntity($address, $this->request->getData());
    //         if ($this->Addresses->save($address)) {
    //              $this->set([
    //                     'address' => $address,
    //                      'status' =>1,
    //                     '_serialize' => ['status','address']
    //                 ]);
    //         }else{
    //              $this->set([
    //                     'address' => $address,
    //                      'status' =>0,
    //                     '_serialize' => ['status','address']
    //                 ]);
    //         }
           
    //     }
       
    // }

    public function updateProfile()
    {
       
        $this->request->allowMethod(['post', 'put']);
        if ($this->request->is('post')) {
            $id = base64_decode($this->request->getData('id'));
            if( $id ){
                $user = $this->Users->get($id, [
                    'contain' => [],
                ]);
            }
            $user->id = $id;
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                 $this->set([
                        'user' => $user,
                         'status' =>1,
                        '_serialize' => ['status','user']
                    ]);
            }else{
                 $this->set([
                        'user' => $user,
                         'status' =>0,
                        '_serialize' => ['status','user']
                    ]);
            }
           
        }
       
    }

    public function referAFriend()
    {
       
        $this->request->allowMethod(['post', 'put']);
        if ($this->request->is('post')) {
            $id = base64_decode($this->request->getData('id'));
            $email = $this->request->getData('user_email');
            if( $id ){
                $user = $this->Users->get($id, [
                    'contain' => [],
                ]);
            } else {
                $this->set([
                    'message' => 'Invalid request!',
                     'status' =>0,
                    '_serialize' => ['status','message']
                ]);
            }   

            if( $user ) {

                $email = new Email('default');
                $email->setFrom(['me@example.com' => 'My Site'])
                    ->setTransport('default')
                    ->setTo('naresh.thakur1987@gmail.com')
                    ->setSubject('About')
                    ->send('My message');

                $this->set([
                    'message' => 'Request sent!',
                     'status' => 1,
                    '_serialize' => ['status','message']
                ]);
            } else {
                $this->set([
                    'message' => 'Invalid request!',
                     'status' => 0,
                    '_serialize' => ['status','message']
                ]);
            }
            
           
        }
       
    }

    public function getProfile()
    {
       
        $this->request->allowMethod(['post', 'put']);
        if ($this->request->is('post')) {
            if($id = $this->request->getData('id') ){
                $user = $this->Users->get($id, [
                    'contain' => ['Addresses'],
                ]);
                if ( $user) {
                 $this->set([
                    'user' => $user,
                     'status' =>1,
                    '_serialize' => ['status','user']
                ]);
                }else{
                     $this->set([
                        'user' => $user,
                         'status' =>0,
                        '_serialize' => ['status','user']
                    ]);
                }
            }
           
            
           
        }
       
    }

    public function checkPassword($inputPassword,$user){
          return (new DefaultPasswordHasher)->check($inputPassword,$user->password);
    }

    public function index()
    {
        $users = $this->paginate($this->Users);

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
            'contain' => ['Addresses', 'CartItems', 'CouponRedeems', 'Merchants', 'OrderNotifications', 'OrderPayments', 'Orders', 'Reviews', 'RewardPoints', 'Runners', 'Suppliers', 'Supports', 'UserLogs', 'UserSocialProfiles'],
        ]);

        $this->set('user', $user);
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
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
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
