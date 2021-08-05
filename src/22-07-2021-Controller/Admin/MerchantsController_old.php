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
        //$merchant = $this->getMerchantId();
        //$id = $merchant->id;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchant = $this->Merchants->patchEntity($merchant, $this->request->getData());
            if ($this->Merchants->save($merchant)) {
                $this->Flash->success(__('The merchant has been saved.'));

                return $this->redirect( $this->referer() );
            }
            
        }
        $users = $this->Merchants->Users->find('list', ['limit' => 200]);
        $states = $this->Merchants->States->find('list', ['limit' => 200]);
        //$cities = $this->Merchants->Cities->find('list')
        //->where(['statecode' => $merchant->state_id ])
        //->toArray();

        $this->set(compact('users', 'states'));
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

    public function uploadImageStore() {

        $this->autoRender = false;

        if (!empty($_FILES)) {


            $file_name = $_FILES['file']['name'];

            $path_parts = pathinfo($file_name);     
            $this->loadModel('Users');  
            $user = $this->Users->get($this->Auth->user('id'));
            $id = $user->id;
            $file_name = $id.".".$path_parts['extension'];
            
            //Upload image for Web Site
            $destination = WWW_ROOT . DS . 'images' . DS . 'store_pics' . DS . $file_name;
            move_uploaded_file($_FILES['file']['tmp_name'], $destination);
            //Upload Images for App
            $destination_app = WWW_ROOT . DS . 'images' . DS . 'store_pics' . DS . 'app-images'. DS . $file_name;
            $size=getimagesize($destination);
            copy ( $destination , $destination_app );
            
            //Resixe image to 125*75 resolution
            $new_width=125;
            $new_height=75;
            $width=$size[0];
            $height=$size[1];

            $new_width = 125;
            $ratio = $new_width / $size[0];
            $new_height = $size[1] * $ratio;



            // App Image
            $image_p = imagecreatetruecolor($new_width, $new_height);
            $whiteBackground = imagecolorallocate($image_p, 255, 255, 255); 
            
            imagefill($image_p,0,0,$whiteBackground); // fill the background with white
            if ($path_parts['extension'] == 'jpg') {
                $image = imagecreatefromjpeg($destination_app);
            } elseif ($path_parts['extension'] == 'gif') {
                $image = imageCreateFromGif($destination_app);
            } elseif ($path_parts['extension'] == 'png') {
                $image = imageCreateFromPng($destination_app);
            }

            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            if ($path_parts['extension'] == 'jpg') {
                imagejpeg($image_p, $destination_app);
            } elseif ($path_parts['extension'] == 'gif') {
                imagegif($image_p, $destination_app);
            } elseif ($path_parts['extension'] == 'png') {
                imagepng($image_p, $destination_app);
            }

            // App Image
            $new_width = 250;
            $ratio = $new_width / $size[0];
            $new_height = $size[1] * $ratio;

            $image_p = imagecreatetruecolor($new_width, $new_height);
            $whiteBackground = imagecolorallocate($image_p, 255, 255, 255); 
            
            imagefill($image_p,0,0,$whiteBackground); // fill the background with white
            if ($path_parts['extension'] == 'jpg') {
                $image = imagecreatefromjpeg($destination);
            } elseif ($path_parts['extension'] == 'gif') {
                $image = imageCreateFromGif($destination);
            } elseif ($path_parts['extension'] == 'png') {
                $image = imageCreateFromPng($destination);
            }

            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            if ($path_parts['extension'] == 'jpg') {
                imagejpeg($image_p, $destination);
            } elseif ($path_parts['extension'] == 'gif') {
                imagegif($image_p, $destination);
            } elseif ($path_parts['extension'] == 'png') {
                imagepng($image_p, $destination);
            }

            echo json_encode($file_name);
        }
    }
}
