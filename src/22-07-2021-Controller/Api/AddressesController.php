<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Addresses Controller
 *
 * @property \App\Model\Table\AddressesTable $Addresses
 *
 * @method \App\Model\Entity\Address[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AddressesController extends AppController
{
    /**
     * Api function to get all user's addresses
     *
     * @return \Cake\Http\Response|null
     */
    public function getAllAddressByUserId()
    {
        $this->request->allowMethod(['post', 'put']);
        $user_id = base64_decode($this->request->getData('user_id'));
        
        $addresses =$this->Addresses->find('all', [
                    'contain' => ['Cities', 'States'],
                    'conditions' => [ 'Addresses.user_id' => $user_id ]
                ]);

        $this->set([
            'status' => 1,
            'addresses' => $addresses, 
            '_serialize' => ['status','addresses','url']
        ]);
    }

    public function addAddress()
    {
        
        $this->request->allowMethod(['post', 'put']);
        $address = $this->Addresses->newEntity();
        
        if ($this->request->is('post')) {

            $user_id = base64_decode( $this->request->getData('user_id') );
            $address = $this->Addresses->patchEntity($address, $this->request->getData());
            $address->user_id = $user_id;

            if ($this->Addresses->save($address)) {
                $this->set([
                    'status' => 1,
                    'address' => $address, 
                    '_serialize' => ['status','address','url']
                ]);
            } else {
                $this->set([
                    'status' => 0,
                    'address' => $address, 
                    '_serialize' => ['status','address','url']
                ]);
            }

            
        }
    }

    public function deleteAddress()
    {
        $this->request->allowMethod(['post', 'put']);
        
        $id = base64_decode( $this->request->getData('id') );
        $user_id = base64_decode( $this->request->getData('user_id') );

        $address = $this->Addresses->find('all')
        ->where( ['id' => $id, 'user_id' => $user_id] )
        ->first();
        // print($address);
        if ($this->Addresses->delete($address)) {
            $this->set([
                'status' => 1,
                'address' => $address, 
                '_serialize' => ['status','address']
            ]);
        } else {
            $this->set([
                'status' => 0,
                'address' => $address, 
                '_serialize' => ['status','address']
            ]);
        }

        
    }

    
}
