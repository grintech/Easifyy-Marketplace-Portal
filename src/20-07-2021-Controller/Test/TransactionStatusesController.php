<?php
namespace App\Controller\Test;

use App\Controller\AppController;

/**
 * TransactionStatuses Controller
 *
 * @property \App\Model\Table\TransactionStatusesTable $TransactionStatuses
 *
 * @method \App\Model\Entity\TransactionStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $transactionStatuses = $this->paginate($this->TransactionStatuses);

        $this->set(compact('transactionStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Transaction Status id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transactionStatus = $this->TransactionStatuses->get($id, [
            'contain' => ['MerchantTransactions'],
        ]);

        $this->set('transactionStatus', $transactionStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transactionStatus = $this->TransactionStatuses->newEntity();
        if ($this->request->is('post')) {
            $transactionStatus = $this->TransactionStatuses->patchEntity($transactionStatus, $this->request->getData());
            if ($this->TransactionStatuses->save($transactionStatus)) {
                $this->Flash->success(__('The transaction status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction status could not be saved. Please, try again.'));
        }
        $this->set(compact('transactionStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transactionStatus = $this->TransactionStatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transactionStatus = $this->TransactionStatuses->patchEntity($transactionStatus, $this->request->getData());
            if ($this->TransactionStatuses->save($transactionStatus)) {
                $this->Flash->success(__('The transaction status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transaction status could not be saved. Please, try again.'));
        }
        $this->set(compact('transactionStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transactionStatus = $this->TransactionStatuses->get($id);
        if ($this->TransactionStatuses->delete($transactionStatus)) {
            $this->Flash->success(__('The transaction status has been deleted.'));
        } else {
            $this->Flash->error(__('The transaction status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
