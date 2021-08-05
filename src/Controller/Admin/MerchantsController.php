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

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

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


    public function useravailabilty(){
        $this->viewBuilder()->setLayout(false);
        $merchant = $this->getMerchantId();
        $id = $merchant->id;

        $merchant = $this->Merchants->get($id, [
            'contain' => [],
        ]);
        //dd("hello in userAvailable");
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchant = $this->Merchants->patchEntity($merchant, $this->request->getData());
            $merchant->status=$this->request->getData('userAvailable');
            if ($this->Merchants->save($merchant)) {
                //$this->Flash->success(__('The Profie has been saved.'));
                //return $this->redirect(['action' => 'profileSetup']);
                echo "success";
            }
        }        
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

    public function sopAgree()
    {
        $this->viewBuilder()->setLayout(false);
        $merchant = $this->getMerchantId();
        $id = $merchant->id;

        $merchant = $this->Merchants->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchant = $this->Merchants->patchEntity($merchant, $this->request->getData());
            $merchant->sop=1;
            if ($this->Merchants->save($merchant)) {
                $merchantUserId=$merchant->user_id;
                $user = $this->Users->get($merchantUserId);
                //echo '<pre>'; print_r($user); echo '</pre>';
                //die();
                if($user->user_profile_updated==75){
                    $user->user_profile_updated=100;
                    $this->Users->save($user);
                }
                $this->Flash->success(__('The Profie has been saved.'));
                return $this->redirect(['action' => 'profileSetup']);
            }
        }
    }
    public function profileSetup($id = null)
    {
        $this->loadModel('BankAccounts');
        $this->loadModel('MerchantKycs');

        $merchant = $this->getMerchantId();
        $id = $merchant->id;

        $merchantKyc = $this->MerchantKycs->find()->where(['merchant_id' =>$id])->first();
        $bankAccount = $this->BankAccounts->find()->where(['merchant_id' =>$id])->first();
        $merchant=$this->Merchants->get($id,['contain'=>[]]);
        $states = $this->Merchants->States->find('list', ['limit' => 200]);
        $cities = $this->Merchants->Cities->find('list', ['limit' => 200]);
        $this->set(compact('merchant','bankAccount','merchantKyc','states', 'cities'));

    }

    public function profilePreview($id = null)
    {
        $this->loadModel('BankAccounts');
        $this->loadModel('MerchantKycs');

        $merchant = $this->getMerchantId();
        $id = $merchant->id;

        $merchantKyc = $this->MerchantKycs->find()->where(['merchant_id' =>$id])->first();
        $bankAccount = $this->BankAccounts->find()->where(['merchant_id' =>$id])->first();
        $merchant=$this->Merchants->get($id,['contain'=>[]]);
        $states = $this->Merchants->States->find('list', ['limit' => 200]);
        $cities = $this->Merchants->Cities->find('list', ['limit' => 200]);
        $this->set(compact('merchant','bankAccount','merchantKyc','states', 'cities'));

    }

    public function profileModify($id = null)
    {
        $this->loadModel('BankAccounts');
        $this->loadModel('MerchantKycs');

        $merchant = $this->getMerchantId();
        $id = $merchant->id;

        $merchantKyc = $this->MerchantKycs->find()->where(['merchant_id' =>$id])->first();
        $bankAccount = $this->BankAccounts->find()->where(['merchant_id' =>$id])->first();
        $merchant=$this->Merchants->get($id,['contain'=>[]]);
        //dd($merchant);
        $states = $this->Merchants->States->find('list', ['limit' => 200]);
        $cities = $this->Merchants->Cities->find('list', ['limit' => 200])->where(['statecode' =>$merchant->state_id]);
        $this->set(compact('merchant','bankAccount','merchantKyc','states', 'cities'));

    }

    public function storeSettings($id = null)
    {
        $this->loadModel('Users');
        if(isset($_POST['type'])) {
            $merchant = $this->Merchants->get($_POST['id'], [
            'contain' => [],
            ]);
            $id = $merchant->id;    
        } else {
            $merchant = $this->getMerchantId(); $id = $merchant->id;    
        }
        //echo '<pre>'; print_r($merchant); echo '</pre>';
        //die();
        if ($this->request->is(['patch', 'post', 'put'])) {
            //dd( $this->request->getData());

            $merchant = $this->Merchants->patchEntity($merchant, $this->request->getData());
            if ($this->Merchants->save($merchant)) {
                $merchantUserId=$merchant->user_id;
                $user = $this->Users->get($merchantUserId);
                //echo '<pre>'; print_r($user); echo '</pre>';
                //die();
                if($user->user_profile_updated==0){
                    $user->user_profile_updated=25;
                    $this->Users->save($user);
                }
                //$this->Flash->success(__('The merchant has been saved.'));
                //return $this->redirect( $this->referer() );
                //return $this->redirect(['action' => 'profileSetup']);
                //return "data saved successfully";
            }
            
        }
        //$users = $this->Merchants->Users->find('list', ['limit' => 200]);
        $states = $this->Merchants->States->find('list', ['limit' => 200]);
        $cities = $this->Merchants->Cities->find('list')
        ->where(['statecode' => $merchant->state_id ])
        ->toArray();
        $this->set(compact('merchant', 'states', 'cities'));
    }

    public function bankDetails()
    {
        $this->loadModel('Users');
        $this->loadModel('BankAccounts');
        if(isset($_POST['type'])) {
            $merchant = $this->Merchants->get($_POST['id'], [
                'contain' => [],]);
            $id = $merchant->id;    
        } else {
            $merchant = $this->getMerchantId(); $id = $merchant->id;    
        }
        $bankAccount = $this->BankAccounts->find()->where(['merchant_id' =>$id])->first();
        //dd( $bankAccount);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //dd( $this->request->getData());

            if( $bankAccount ){
                $bankAccount = $this->BankAccounts->patchEntity($bankAccount, $this->request->getData());    
                $bankAccount->merchant_id = $id;
            } else {
                $bankAccount = $this->BankAccounts->newEntity($this->request->getData());    
                $bankAccount->merchant_id = $id;
                // $bankAccount = $this->BankAccounts->patchEntity($bankAccount, $this->request->getData());    
            }
            $merchantUserId=$merchant->user_id;
            $user = $this->Users->get($merchantUserId);
            //echo '<pre>'; print_r($user); echo '</pre>';
            //die();
            if($user->user_profile_updated==25){
                $user->user_profile_updated=50;
                $this->Users->save($user);
            }
            if ($this->BankAccounts->save($bankAccount)) {
                $this->Flash->success(__('The bank account has been saved.'));
                return $this->redirect( $this->referer() );
            }
            dd($bankAccount->getErrors());
            $this->Flash->error(__('The bank account could not be saved. Please, try again.'));
        }
        //$merchants = $this->BankAccounts->Merchants->find('list', ['limit' => 200]);
        $this->set(compact('bankAccount'));
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
        $merchant = $this->getMerchantId();
        $id = $merchant->id;
        $kyc = $this->Kyc->find()->where(['merchant_id' =>$id])->first();
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
            $merchantUserId=$merchant->user_id;
            $user = $this->Users->get($merchantUserId);
            //echo '<pre>'; print_r($user); echo '</pre>';
            //die();
            if($user->user_profile_updated==50){
                $user->user_profile_updated=75;
                $this->Users->save($user);
            }       
            if ($this->Kyc->save($kyc)) {
                $this->Flash->success(__('The kyc Details has been saved.'));
                $this->uploadImageStore();
                return $this->redirect( $this->referer() );
            }
            $this->Flash->error(__('The bank account could not be saved. Please, try again.'));
        }
        $this->set(compact('kyc'));
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
