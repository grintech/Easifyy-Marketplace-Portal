<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Utility\Security; 
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
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    public function dashboard()
    {
        $this->loadModel('Merchants');
        $this->loadModel('Orders');
        $this->loadModel('Notifications');
        $user_id = $this->Auth->user('id');

        $messages_total = $this->Notifications->find('all',array('conditions'=>array('viewed_status'=>0,'user_id'=>$user_id)))->count();
        //dd($user_id);
        $clients_total=0;$totalPaymnt=0;
        $merchant_id= $this->getMerchantIdByUserId($user_id);
        $order_total = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'merchant_id'=>$merchant_id)))->count();
        //$clients_total = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'merchant_id'=>$merchant_id)))->group(['Orders.user_id'])->count();

        $order = $this->Orders->find('all')
            ->where([ 'Orders.merchant_id' => $merchant_id,'order_status_id' => 3,'Orders.delete_status' => 1 ])
            ->contain([
                'Products' => [],
                'OrderModes' => [],
                'Users' => [],
                'OrderItems' => [],
                'OrderStatuses' => [],
                'Coupons' => [],
            ])
            ->order(['Orders.created' => 'DESC'])
            ->all();

        $payment = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'merchant_id'=>$merchant_id)));
        $payment->select( ['totalpmnt' => $payment->func()->sum('gross_total') ]);
        $totalPaymntArr= $payment->toArray();
        $totalPaymnt=$totalPaymntArr[0]->totalpmnt;


        $query = $this->Orders->find();
        $query->select(['Orders.user_id', $query->func()->count('Orders.id')])
                ->where(['delete_status'=>1,'merchant_id'=>$merchant_id])
                ->group(['Orders.user_id']);
        $clients_total = $query->count();

        $refundedOrders = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'order_status_id'=>7,'merchant_id'=>$merchant_id)))->count();
        $cancelOrders = $this->Orders->find('all',array('conditions'=>array('delete_status'=>1,'order_status_id'=>6,'merchant_id'=>$merchant_id)))->count();

        $merchant = $this->Merchants->find('all', [
            'contain' => ['Users', 'States', 'Cities', 'BankAccounts', 'CartItems', 'Coupons', 'MerchantPayouts', 'MerchantProducts', 'MerchantTransactions', 'OrderPayments', 'Orders', 'Purchases', 'Reviews'],
            'conditions' =>['user_id' => $user_id]
        ])->first();
        //dd($merchant);
        //dd($merchant->user->first_name." ".$merchant->user->last_name);
        $profile_updated = $merchant->user->user_profile_updated;
        $this->set('merchant', $merchant);
        $this->set('order_total', $order_total);        
        $this->set('clients_total', $clients_total);
        $this->set('profile_updated', $profile_updated);
        $this->set('totalPaymnt',$totalPaymnt);
        $this->set('messages_total',$messages_total);
        $this->set('order',$order);
        $this->set('refundedOrders',$refundedOrders);
        $this->set('cancelOrders',$cancelOrders);
    }

    public function helpCenter()
    {
        $this->loadModel('Merchants');
        $this->loadModel('Faq');
        $this->loadModel('Articles');
        $this->loadModel('YoutubeVideos');

        $user_id = $this->Auth->user('id');
        $merchant = $this->Merchants->find('all', [
            'contain' => ['Users', 'States', 'Cities', 'BankAccounts', 'CartItems', 'Coupons', 'MerchantPayouts', 'MerchantProducts', 'MerchantTransactions', 'OrderPayments', 'Orders', 'Purchases', 'Reviews'],
            'conditions' =>['user_id' => $user_id]
        ])->first();
        //dd($merchant);
        //dd($merchant->user->first_name." ".$merchant->user->last_name);


        $faqs =$this->Faq->find()->all();
        $articles =$this->Articles->find()->all();
        $YoutubeVideos =$this->YoutubeVideos->find()->all();

        $this->set(compact('faqs','articles','merchant','YoutubeVideos'));
        //$this->set('merchant', $merchant);
    }


    public function referralCode()
    {

    }

    public function becomeAnAffiliate()
    {

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

    public function changePassword(){
        //dd("asb");
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
