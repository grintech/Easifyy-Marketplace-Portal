<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Merchants Controller
 *
 * @property \App\Model\Table\MerchantsTable $Merchants
 *
 * @method \App\Model\Entity\Merchant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantsController extends AppController
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
        $this->paginate = [
            'contain' => ['Users', 'States', 'Cities'],
        ];
        $merchants = $this->paginate($this->Merchants);

        $this->set(compact('merchants'));
    }

    /**
     * View method
     *
     * @param string|null $id Merchant id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchant = $this->Merchants->get($id, [
            'contain' => ['Users', 'States', 'Cities', 'BankAccounts', 'CartItems', 'Coupons', 'MerchantPayouts', 'MerchantProducts', 'MerchantTransactions', 'OrderPayments', 'Orders', 'Purchases', 'Reviews'],
        ]);

        $this->set('merchant', $merchant);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchant = $this->Merchants->newEntity();
        if ($this->request->is('post')) {
            $merchant = $this->Merchants->patchEntity($merchant, $this->request->getData());
            if ($this->Merchants->save($merchant)) {
                $this->Flash->success(__('The merchant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant could not be saved. Please, try again.'));
        }
        $users = $this->Merchants->Users->find('list', ['limit' => 200]);
        $states = $this->Merchants->States->find('list', ['limit' => 200]);
        $cities = $this->Merchants->Cities->find('list', ['limit' => 200]);
        $this->set(compact('merchant', 'users', 'states', 'cities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchant = $this->Merchants->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchant = $this->Merchants->patchEntity($merchant, $this->request->getData());
            if ($this->Merchants->save($merchant)) {
                $this->Flash->success(__('The merchant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant could not be saved. Please, try again.'));
        }
        $users = $this->Merchants->Users->find('list', ['limit' => 200]);
        $states = $this->Merchants->States->find('list', ['limit' => 200]);
        $cities = $this->Merchants->Cities->find('list', ['limit' => 200]);
        $this->set(compact('merchant', 'users', 'states', 'cities'));
    }

    public function storeSettings($id = null)
    {
        $merchant = $this->getMerchantId();
        $id = $merchant->id;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchant = $this->Merchants->patchEntity($merchant, $this->request->getData());
            if ($this->Merchants->save($merchant)) {
                $this->Flash->success(__('The merchant has been saved.'));

                return $this->redirect( $this->referer() );
            }
            
        }
        $users = $this->Merchants->Users->find('list', ['limit' => 200]);
        $states = $this->Merchants->States->find('list', ['limit' => 200]);
        $cities = $this->Merchants->Cities->find('list')
        ->where(['statecode' => $merchant->state_id ])
        ->toArray();
        $this->set(compact('merchant', 'users', 'states','cities'));
    }

    public function bankDetails()
    {
        $merchant = $this->getMerchantId();
        $id = $merchant->id;

        $this->loadModel('BankAccounts');
        $bankAccount = $this->BankAccounts->find()->where(['merchant_id' =>$id])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            if( $bankAccount ){
                $bankAccount = $this->BankAccounts->patchEntity($bankAccount, $this->request->getData());    
                $bankAccount->merchant_id = $id;
            } else {
                $bankAccount = $this->BankAccounts->newEntity($this->request->getData());    
                $bankAccount->merchant_id = $id;
                // $bankAccount = $this->BankAccounts->patchEntity($bankAccount, $this->request->getData());    

            }
            
            if ($this->BankAccounts->save($bankAccount)) {
                $this->Flash->success(__('The bank account has been saved.'));

                return $this->redirect( $this->referer() );
            }
            $this->Flash->error(__('The bank account could not be saved. Please, try again.'));
        }
        $merchants = $this->BankAccounts->Merchants->find('list', ['limit' => 200]);
        $this->set(compact('bankAccount', 'merchants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchant = $this->Merchants->get($id);
        if ($this->Merchants->delete($merchant)) {
            $this->Flash->success(__('The merchant has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // private function getMerchantId()
    // {
    //     $this->loadModel('Users');
    //     $user = $this->Users->get($this->Auth->user('id'));
    //     $id = $user->id;
        
    //     $merchant = $this->Merchants->find('all')
    //     ->where(['user_id' => $id])
    //     ->first();
    //     return $merchant;   
    // }

    public function getCitiesById(){

        $this->loadModel('Cities');
        $city = $this->Cities->find()->extract('name');
        
        return $this->response
        ->withType('application/json')
        ->withStringBody(json_encode([
          'state' => $state,
          'result' => $result
        ]));

    }

    public function guidelines() {
        
    }

    public function kyc() {
        $this->loadModel('Kyc');
        $user_id = $this->Auth->user('id');
        $kyc = $this->Kyc->find()->where(['user_id' =>$user_id])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {

            if( $kyc ){
                $kyc = $this->Kyc->patchEntity($kyc, $this->request->getData());    
            } else {
                $kyc = $this->Kyc->newEntity($this->request->getData());
                $kyc->govt_Id = $this->request->getData('govt_Id')['name']; 
                $kyc->address_Id = $this->request->getData('address_Id')['name'];
                $kyc->qualification_Id = $this->request->getData('qualification_Id')['name'];
                $kyc->gst_declarartion = $this->request->getData('gst_declarartion')['name']; 
                $kyc->status = 0; 
            } 
            $kyc->user_id=$user_id;
          
            if ($this->Kyc->save($kyc)) {
                $this->Flash->success(__('The kyc Details has been saved.'));
                $this->uploadImageStore();
                return $this->redirect( $this->referer() );
            }
            $this->Flash->error(__('The bank account could not be saved. Please, try again.'));
        }
        $this->set(compact('kyc','user_id'));
    }

    public function uploadImageStore() {

        $this->autoRender = false;

        if (!empty($_FILES)) {
            $extension=array("jpeg","jpg","png","gif","pdf","txt");
            foreach($_FILES as $key=>$tmp_name) {
                $file_name=$_FILES[$key]["name"];
                $file_tmp=$_FILES[$key]["tmp_name"];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                
                if(in_array($ext,$extension)) {
                    if(!file_exists(WWW_ROOT ."img/kyc-documents/".$file_name)) {
                        move_uploaded_file($file_tmp, WWW_ROOT . 'img/kyc-documents/'.$file_name);
                    }
                    else {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp, WWW_ROOT . 'img/kyc-documents/'.$newFileName);
                    }
                }
                else {
                    array_push($error,"$file_name, ");
                }
            }
        }
    }
}
