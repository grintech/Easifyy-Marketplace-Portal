<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;

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
    public function index()
    {
        //$this->loadModel('Users');
        /*$this->paginate = [
            'contain' => ['Users', 'States', 'Cities'],
            'conditions' => [
                    'Merchants.delete_status'=>1,
                ],
        ];*/
        $token = $this->request->getParam('_csrfToken');
        $merchants = $this->Merchants->find('all')
                ->where(['Merchants.delete_status' => 1])
                ->contain(['Users', 'States', 'Cities']);

        //$merchants = $this->paginate($this->Merchants);
        $this->set(compact('merchants','token'));
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
        $this->loadModel('Users');
        $this->loadModel('BankAccounts');
        $this->loadModel('Products');

        $user_id=$id;
        $merchant = $this->Merchants->find('all')->where(['id' => $id])->first();
        $id = $merchant->id;
        $merchant = $this->Merchants->get($id, [
            'contain' => ['Orders','Reviews','BankAccounts','MerchantKycs'],
        ]);
        //dd($merchant);
        $user_id = $merchant->user_id;
        $services=$this->Products->find()->where(['author' =>$user_id,'delete_status'=>1])->all();
        //dd($services);
        $this->set(compact('merchant','services'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Users');
        $this->loadModel('Merchants');
        $psp = $this->Users->newEntity();
        if ($this->request->is('post')) {
            //dd('here1');
            $data=$this->request->getData();
            $data['role']='admin';
            $psp = $this->Users->patchEntity($psp, $data);
            $psp->email_verify_status=1;
            if ($this->Users->save($psp)) {
                $user_id=$psp->id;
                $merchant = $this->Merchants->newEntity();
                $merchant = $this->Merchants->patchEntity($merchant, $this->request->getData());
                $merchant->user_id = $user_id;
                $merchant->store_name = $this->request->getData('first_name'); 
                $myPhone=$this->request->getData('phone_Code_1').$this->request->getData('phone');
                $merchant->phone_1 =$myPhone;
                $merchant->name_prefix =$this->request->getData('name_prefix');
                //$merchant->service_profession = $this->request->getData('service_profession');
                if ($this->Merchants->save($merchant)) {
                    $this->Flash->success(__('The PSP has been saved.'));
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('psp'));

        /*$merchant = $this->Merchants->newEntity();
        if ($this->request->is('post')) {
            $merchant = $this->Merchants->patchEntity($merchant, $this->request->getData());
            if ($this->Merchants->save($merchant)) {
                $this->Flash->success(__('The merchant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            //print_r($merchant->errors());
            $this->Flash->error(__('The merchant could not be saved. Please, try again.'));
        }
        $users = $this->Merchants->Users->find('list', ['limit' => 200]);
        $states = $this->Merchants->States->find('list', ['limit' => 200]);
        $cities = $this->Merchants->Cities->find('list', ['limit' => 200]);
        $this->set(compact('merchant', 'users', 'states', 'cities'));*/
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
        $this->loadModel('Users');
        //$id= $this->getUserIdByMerchantId($id);
        // $merchant = $this->Users->get($id, [
        //     'contain' => [],
        // ]);
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $merchant = $this->Merchants->patchEntity($merchant, $this->request->getData());
        //     if ($this->Merchants->save($merchant)) {
        //         $this->Flash->success(__('The merchant has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The merchant could not be saved. Please, try again.'));
        // }
        // $users = $this->Merchants->Users->find('list', ['limit' => 200]);
        // $states = $this->Merchants->States->find('list', ['limit' => 200]);
        // $cities = $this->Merchants->Cities->find('list', ['limit' => 200]);
        // $this->set(compact('merchant', 'users', 'states', 'cities'));

        $this->loadModel('BankAccounts');
        $this->loadModel('MerchantKycs');

        //$merchant = $this->getUserIdByMerchantId($id);
        //$id = $merchant->id;

        $merchantKyc = $this->MerchantKycs->find()->where(['merchant_id' =>$id])->first();
        $bankAccount = $this->BankAccounts->find()->where(['merchant_id' =>$id])->first();
        $merchant=$this->Merchants->get($id,['contain'=>[]]);
        //dd($merchant);
        $states = $this->Merchants->States->find('list', ['limit' => 200]);
        $cities = $this->Merchants->Cities->find('list', ['limit' => 200])->where(['statecode' =>$merchant->state_id]);
        $this->set(compact('merchant','bankAccount','merchantKyc','states', 'cities'));
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
        //$this->request->allowMethod(['post', 'delete']);
        $merchant = $this->Merchants->get($id);
        $merchant->delete_status = 0;
        if ($this->Merchants->save($merchant)) {
            $this->Flash->success(__('The merchant has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function notes($id = null) {
        
        $this->loadModel('Notifications');

        $merchant_id= $this->getMerchantIdByUserId($id);
        $this->loadModel('OrderNotifications');
        $OrderNotifications = $this->OrderNotifications->find('all')
            ->where([ 'OrderNotifications.merchant_id' => base64_decode($_GET['merchant_id']),
                'OrderNotifications.order_id' => base64_decode($_GET['order_id']),
                'OrderNotifications.type' => 'superadmin_notes',
        ])->all();

        
        $query = $this->Notifications->query();
        $query->update()
            ->set(['viewed_status' => 1])
            ->where(['order_id' =>  base64_decode($_GET['order_id']),'type'=>'payment-from-easifyy'])
            ->execute();

        $this->set(compact('OrderNotifications'));
            
    }

    public function disableMerchant() {
        $this->autoRender = false;
        $status = $_POST['status'];
        $id = $_POST['mid'];
        
        $user = $this->Merchants->get($id); 
        $user->status = $status;
        if( $this->Merchants->save($user)){
           echo 'Saved';
        } else {
           echo 'Not Saved';
        }
    }

    public function disableuserMerchant() {
        $this->autoRender = false;
        $status = $_POST['status'];
        $id = $_POST['mid'];
        
        $user = $this->Merchants->get($id); 
        $user->user_status = $status;
        if( $this->Merchants->save($user)){
           echo 'Saved';
        } else {
           echo 'Not Saved';
        }
    }

    public function updateMerchantKyc(){
        $this->autoRender = false;
        $this->loadModel('MerchantKycs');
        if ($this->request->is(['patch', 'post', 'put'])) {
            //dd($this->request->getData());
            $merchant_id =$this->request->getData('id');
            $MerchantKycs = $this->MerchantKycs->find()->where(['merchant_id' =>$merchant_id])->first();
            if( $MerchantKycs ){
                $MerchantKycs = $this->MerchantKycs->patchEntity($MerchantKycs, $this->request->getData());    
                $MerchantKycs->merchant_id = $merchant_id ; 
                if($this->request->getData('govt_Id')['name']!=""){
                    $MerchantKycs->govt_Id = $this->request->getData('govt_Id')['name']; 
                }else{
                    $MerchantKycs->govt_Id=$MerchantKycs->govt_Id;
                }
                if($this->request->getData('address_Id')['name']!=""){
                    $MerchantKycs->address_Id = $this->request->getData('address_Id')['name'];
                }else{
                    $MerchantKycs->address_Id=$MerchantKycs->address_Id;
                }
                if($this->request->getData('qualification_Id')['name']!=""){
                    $MerchantKycs->qualification_Id = $this->request->getData('qualification_Id')['name'];}
                else{
                    $MerchantKycs->qualification_Id=$MerchantKycs->qualification_Id;
                }
                if($this->request->getData('gst_declarartion')['name']!=""){
                    $MerchantKycs->gst_declarartion = $this->request->getData('gst_declarartion')['name']; }
                else{
                    $MerchantKycs->gst_declarartion=$MerchantKycs->gst_declarartion;
                }
                if($this->request->getData('bank_cheque')['name']!=""){
                    $MerchantKycs->bank_cheque = $this->request->getData('bank_cheque')['name']; }
                else{
                    $MerchantKycs->bank_cheque=$MerchantKycs->bank_cheque;
                }
                if($this->request->getData('signature')['name']!=""){
                    $MerchantKycs->signature = $this->request->getData('signature')['name']; }
                else{
                    $MerchantKycs->signature=$MerchantKycs->signature;
                }
                $MerchantKycs->status = 0; 
            } else {
                $MerchantKycs = $this->MerchantKycs->newEntity($this->request->getData());
                $MerchantKycs->merchant_id = $merchant_id ; 
                $MerchantKycs->govt_Id = $this->request->getData('govt_Id')['name']; 
                $MerchantKycs->address_Id = $this->request->getData('address_Id')['name'];
                $MerchantKycs->qualification_Id = $this->request->getData('qualification_Id')['name'];
                $MerchantKycs->gst_declarartion = $this->request->getData('gst_declarartion')['name'];
                $MerchantKycs->bank_cheque = $this->request->getData('bank_cheque')['name']; 
                $MerchantKycs->signature = $this->request->getData('signature')['name']; 
                $MerchantKycs->status = 0; 
            }

            //$this->MerchantKycs->save($MerchantKycs);
            if ($this->MerchantKycs->save($MerchantKycs)) {
                $this->Flash->success(__('The KYC Details has been saved.'));
                $this->uploadImageStore($merchant_id);
                    
                return $this->redirect(['controller' => 'Merchants','action' => 'edit', $merchant_id ,'?'=>['status'=>'kyc-docs']]);
            }
            
        
            //dd("In a merchant Update kyc");
        }
    }

    public function uploadImageStore($id) {

        $path=WWW_ROOT ."img/kyc-documents/$id/";
        $this->autoRender = false;

        if (!empty($_FILES)) {
            $extension=array("jpeg","jpg","png","gif","pdf","txt",'.doc');
            foreach($_FILES as $key=>$tmp_name) {
                $file_name=$_FILES[$key]["name"];
                $file_tmp=$_FILES[$key]["tmp_name"];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                
                if (is_dir($path)==false){
                  mkdir($path);
                }

                if(in_array($ext,$extension)) {
                    /*if(!file_exists(WWW_ROOT ."img/kyc-documents/".$file_name)) {
                        move_uploaded_file($file_tmp, WWW_ROOT . 'img/kyc-documents/'.$file_name);
                    }
                    else {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp, WWW_ROOT . 'img/kyc-documents/'.$newFileName);
                    }*/
                    if(!file_exists($path.$file_name)) {
                        move_uploaded_file($file_tmp, $path.$file_name);
                    }
                    else {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp, $path.$newFileName);
                    }
                }
                else {
                    array_push($error,"$file_name, ");
                }
            }
        }
    }
}
