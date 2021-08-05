<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;

/**
 * MerchantKycs Controller
 *
 * @property \App\Model\Table\MerchantKycsTable $MerchantKycs
 *
 * @method \App\Model\Entity\MerchantKyc[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantkycsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->loadModel('MerchantKycs');
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
        $this->loadModel('MerchantKycs');
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
        $this->loadModel('MerchantKycs');
        $merchantKyc = $this->MerchantKycs->newEntity();
        if ($this->request->is('post')) {
            $merchantKyc = $this->MerchantKycs->patchEntity($merchantKyc, $this->request->getData());
            if ($this->MerchantKycs->save($merchantKyc)) {
                $this->Flash->success(__('The merchant kyc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant kyc could not be saved. Please, try again.'));
        }
        $merchants = $this->MerchantKycs->Merchants->find('list', ['limit' => 200]);
        $this->set(compact('merchantKyc', 'merchants'));
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
        $this->loadModel('MerchantKycs');

        $merchantKyc = $this->MerchantKycs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantKyc = $this->MerchantKycs->patchEntity($merchantKyc, $this->request->getData());
            if ($this->MerchantKycs->save($merchantKyc)) {
                $this->Flash->success(__('The merchant kyc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant kyc could not be saved. Please, try again.'));
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
        $this->loadModel('MerchantKycs');
        $this->request->allowMethod(['post', 'delete']);
        $merchantKyc = $this->MerchantKycs->get($id);
        if ($this->MerchantKycs->delete($merchantKyc)) {
            $this->Flash->success(__('The merchant kyc has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant kyc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
