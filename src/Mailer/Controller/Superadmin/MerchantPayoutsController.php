<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;

/**
 * MerchantPayouts Controller
 *
 * @property \App\Model\Table\MerchantPayoutsTable $MerchantPayouts
 *
 * @method \App\Model\Entity\MerchantPayout[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantPayoutsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MerchantTransactions', 'Merchants', 'Orders'],
        ];
        $merchantPayouts = $this->paginate($this->MerchantPayouts);

        $this->set(compact('merchantPayouts'));
    }

    /**
     * View method
     *
     * @param string|null $id Merchant Payout id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchantPayout = $this->MerchantPayouts->get($id, [
            'contain' => ['MerchantTransactions', 'Merchants', 'Orders'],
        ]);

        $this->set('merchantPayout', $merchantPayout);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchantPayout = $this->MerchantPayouts->newEntity();
        if ($this->request->is('post')) {
            $merchantPayout = $this->MerchantPayouts->patchEntity($merchantPayout, $this->request->getData());
            if ($this->MerchantPayouts->save($merchantPayout)) {
                $this->Flash->success(__('The merchant payout has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant payout could not be saved. Please, try again.'));
        }
        $merchantTransactions = $this->MerchantPayouts->MerchantTransactions->find('list', ['limit' => 200]);
        $merchants = $this->MerchantPayouts->Merchants->find('list', ['limit' => 200]);
        $orders = $this->MerchantPayouts->Orders->find('list', ['limit' => 200]);
        $this->set(compact('merchantPayout', 'merchantTransactions', 'merchants', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchant Payout id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchantPayout = $this->MerchantPayouts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantPayout = $this->MerchantPayouts->patchEntity($merchantPayout, $this->request->getData());
            if ($this->MerchantPayouts->save($merchantPayout)) {
                $this->Flash->success(__('The merchant payout has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant payout could not be saved. Please, try again.'));
        }
        $merchantTransactions = $this->MerchantPayouts->MerchantTransactions->find('list', ['limit' => 200]);
        $merchants = $this->MerchantPayouts->Merchants->find('list', ['limit' => 200]);
        $orders = $this->MerchantPayouts->Orders->find('list', ['limit' => 200]);
        $this->set(compact('merchantPayout', 'merchantTransactions', 'merchants', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchant Payout id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchantPayout = $this->MerchantPayouts->get($id);
        if ($this->MerchantPayouts->delete($merchantPayout)) {
            $this->Flash->success(__('The merchant payout has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant payout could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
