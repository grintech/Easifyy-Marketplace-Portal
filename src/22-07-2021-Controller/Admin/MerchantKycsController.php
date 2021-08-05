<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\BaseController;
use Cake\ORM\Query;
use Cake\ORM\Table;
use App\Model\Entity\Role;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * MerchantKycs Controller
 *
 * @property \App\Model\Table\MerchantKycsTable $MerchantKycs
 *
 * @method \App\Model\Entity\MerchantKyc[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantKycsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

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

    public function index()
    {
        $this->paginate = [
            'contain' => ['Merchants'],
        ];
        $merchantKycs = $this->paginate($this->MerchantKycs);

        $this->set(compact('merchantKycs'));
    }

    /**
     * View method
     *
     * @param string|null $id Merchant Kyc id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchantKyc = $this->MerchantKycs->get($id, [
            'contain' => ['Merchants'],
        ]);

        $this->set('merchantKyc', $merchantKyc);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //dd($this->request->getData());
        $merchant = $this->getMerchantId();
        $id = $merchant->id;
        $merchantKyc = $this->MerchantKycs->newEntity();
        //if ($this->request->is('post','put')) {
            $merchantKyc->merchant_id = $id;
            $merchantKyc->govt_Id = $this->request->getData('govt_Id')['name']; 
            $merchantKyc->address_Id = $this->request->getData('address_Id')['name'];
            $merchantKyc->qualification_Id = $this->request->getData('qualification_Id')['name'];
            $merchantKyc->gst_declarartion = $this->request->getData('gst_declarartion')['name']; 
            $merchantKyc->status = 0; 
            if ($this->MerchantKycs->save($merchantKyc)) {
                $this->uploadImageStore();
                //$this->Flash->success(__('The merchant kyc has been saved.'));
                return $this->redirect(['controller' => 'Merchants','action' => 'profileSetup']);
            }
            $this->Flash->error(__('The merchant kyc could not be saved. Please, try again.'));
        //}
        $merchants = $this->MerchantKycs->Merchants->find('list', ['limit' => 200]);
        $this->set(compact('merchantKyc', 'merchants','id'));
    }
    
    public function kyc()
    {
        $this->loadModel('Users');
        $merchant = $this->getMerchantId();
        $MerchantKycs='';
        $id = $merchant->id;
        $user_id = $this->Auth->user('id');
        $MerchantKycs = $this->MerchantKycs->find()->where(['merchant_id' =>$id])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {

            if( $MerchantKycs ){
                $MerchantKycs = $this->MerchantKycs->patchEntity($MerchantKycs, $this->request->getData());    
                $MerchantKycs->merchant_id = $id ; 
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
                $MerchantKycs->merchant_id = $id ; 
                $MerchantKycs->govt_Id = $this->request->getData('govt_Id')['name']; 
                $MerchantKycs->address_Id = $this->request->getData('address_Id')['name'];
                $MerchantKycs->qualification_Id = $this->request->getData('qualification_Id')['name'];
                $MerchantKycs->gst_declarartion = $this->request->getData('gst_declarartion')['name'];
                $MerchantKycs->bank_cheque = $this->request->getData('bank_cheque')['name']; 
                $MerchantKycs->signature = $this->request->getData('signature')['name']; 
                $MerchantKycs->status = 0; 
            } 
            $merchantUserId=$merchant->user_id;
            $user = $this->Users->get($merchantUserId);
            //echo '<pre>'; print_r($user); echo '</pre>';
            //die();
            if($user->user_profile_updated==50){
                $user->user_profile_updated=75;
                $this->Users->save($user);
            } 
            if ($this->MerchantKycs->save($MerchantKycs)) {
                $this->Flash->success(__('The kyc Details has been saved.'));
                $this->uploadImageStore($id);
                if ($this->request->getdata('profile-edit')=='modify-profile'){
                    return $this->redirect(['controller' => 'Merchants','action' => 'profileModify','?'=>['status'=>'kyc-docs']]);
                }else{
                    return $this->redirect(['controller' => 'Merchants','action' => 'profileSetup','?'=>['status'=>'kyc-docs']]);
                }
            }
            //dd($MerchantKycs->errors());
            return $this->redirect(['controller' => 'Merchants','action' => 'profileSetup','?'=>['status'=>'kyc-doc']]);

            //$this->Flash->error(__('The merchant kyc could not be saved. Please, try again.'));
        }
        $this->set(compact('MerchantKycs','user_id','id'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Merchant Kyc id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchantKyc = $this->MerchantKycs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantKyc = $this->MerchantKycs->patchEntity($merchantKyc, $this->request->getData());
            if ($this->MerchantKycs->save($merchantKyc)) {
                $this->uploadImageStore($id);

                $this->Flash->success(__('The merchant KYC has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant KYC could not be saved. Please, try again.'));
        }
        $merchants = $this->MerchantKycs->Merchants->find('list', ['limit' => 200]);
        $this->set(compact('merchantKyc', 'merchants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchant Kyc id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchantKyc = $this->MerchantKycs->get($id);
        if ($this->MerchantKycs->delete($merchantKyc)) {
            $this->Flash->success(__('The merchant kyc has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant kyc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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
