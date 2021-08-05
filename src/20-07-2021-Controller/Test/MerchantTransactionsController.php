<?php
namespace App\Controller\Test;

use App\Controller\AppController;

/**
 * MerchantTransactions Controller
 *
 * @property \App\Model\Table\MerchantTransactionsTable $MerchantTransactions
 *
 * @method \App\Model\Entity\MerchantTransaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantTransactionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Merchants', 'BankAccounts', 'TransactionStatuses'],
        ];
        $merchantTransactions = $this->paginate($this->MerchantTransactions);

        $this->set(compact('merchantTransactions'));
    }

    /**
     * View method
     *
     * @param string|null $id Merchant Transaction id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchantTransaction = $this->MerchantTransactions->get($id, [
            'contain' => ['Merchants', 'BankAccounts', 'TransactionStatuses', 'MerchantPayouts'],
        ]);

        $this->set('merchantTransaction', $merchantTransaction);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchantTransaction = $this->MerchantTransactions->newEntity();
        if ($this->request->is('post')) {
            $merchantTransaction = $this->MerchantTransactions->patchEntity($merchantTransaction, $this->request->getData());
            if ($this->MerchantTransactions->save($merchantTransaction)) {
                $this->Flash->success(__('The merchant transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant transaction could not be saved. Please, try again.'));
        }
        $merchants = $this->MerchantTransactions->Merchants->find('list', ['limit' => 200]);
        $bankAccounts = $this->MerchantTransactions->BankAccounts->find('list', ['limit' => 200]);
        $transactionStatuses = $this->MerchantTransactions->TransactionStatuses->find('list', ['limit' => 200]);
        $this->set(compact('merchantTransaction', 'merchants', 'bankAccounts', 'transactionStatuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchant Transaction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchantTransaction = $this->MerchantTransactions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantTransaction = $this->MerchantTransactions->patchEntity($merchantTransaction, $this->request->getData());
            if ($this->MerchantTransactions->save($merchantTransaction)) {
                $this->Flash->success(__('The merchant transaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant transaction could not be saved. Please, try again.'));
        }
        $merchants = $this->MerchantTransactions->Merchants->find('list', ['limit' => 200]);
        $bankAccounts = $this->MerchantTransactions->BankAccounts->find('list', ['limit' => 200]);
        $transactionStatuses = $this->MerchantTransactions->TransactionStatuses->find('list', ['limit' => 200]);
        $this->set(compact('merchantTransaction', 'merchants', 'bankAccounts', 'transactionStatuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchant Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchantTransaction = $this->MerchantTransactions->get($id);
        if ($this->MerchantTransactions->delete($merchantTransaction)) {
            $this->Flash->success(__('The merchant transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant transaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
