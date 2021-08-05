<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * DeliveryAddresses Controller
 *
 * @property \App\Model\Table\DeliveryAddressesTable $DeliveryAddresses
 *
 * @method \App\Model\Entity\DeliveryAddress[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeliveryAddressesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Cities', 'States'],
        ];
        $deliveryAddresses = $this->paginate($this->DeliveryAddresses);

        $this->set(compact('deliveryAddresses'));
    }

    /**
     * View method
     *
     * @param string|null $id Delivery Address id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deliveryAddress = $this->DeliveryAddresses->get($id, [
            'contain' => ['Users', 'Cities', 'States'],
        ]);

        $this->set('deliveryAddress', $deliveryAddress);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deliveryAddress = $this->DeliveryAddresses->newEntity();
        if ($this->request->is('post')) {
            $deliveryAddress = $this->DeliveryAddresses->patchEntity($deliveryAddress, $this->request->getData());
            if ($this->DeliveryAddresses->save($deliveryAddress)) {
                $this->Flash->success(__('The delivery address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery address could not be saved. Please, try again.'));
        }
        $users = $this->DeliveryAddresses->Users->find('list', ['limit' => 200]);
        $cities = $this->DeliveryAddresses->Cities->find('list', ['limit' => 200]);
        $states = $this->DeliveryAddresses->States->find('list', ['limit' => 200]);
        $this->set(compact('deliveryAddress', 'users', 'cities', 'states'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivery Address id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deliveryAddress = $this->DeliveryAddresses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deliveryAddress = $this->DeliveryAddresses->patchEntity($deliveryAddress, $this->request->getData());
            if ($this->DeliveryAddresses->save($deliveryAddress)) {
                $this->Flash->success(__('The delivery address has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery address could not be saved. Please, try again.'));
        }
        $users = $this->DeliveryAddresses->Users->find('list', ['limit' => 200]);
        $cities = $this->DeliveryAddresses->Cities->find('list', ['limit' => 200]);
        $states = $this->DeliveryAddresses->States->find('list', ['limit' => 200]);
        $this->set(compact('deliveryAddress', 'users', 'cities', 'states'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivery Address id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deliveryAddress = $this->DeliveryAddresses->get($id);
        if ($this->DeliveryAddresses->delete($deliveryAddress)) {
            $this->Flash->success(__('The delivery address has been deleted.'));
        } else {
            $this->Flash->error(__('The delivery address could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
