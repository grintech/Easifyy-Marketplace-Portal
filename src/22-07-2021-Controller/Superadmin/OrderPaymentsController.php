<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;

/**
 * OrderPayments Controller
 *
 * @property \App\Model\Table\OrderPaymentsTable $OrderPayments
 *
 * @method \App\Model\Entity\OrderPayment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderPaymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'Users', 'Merchants'],
            'conditions' => [
                    'OrderPayments.delete_status'=>1,
                ],
        ];
        $orderPayments = $this->paginate($this->OrderPayments);
        //dd($orderPayments);
        $this->set(compact('orderPayments'));
    }

    /**
     * View method
     *
     * @param string|null $id Order Payment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderPayment = $this->OrderPayments->get($id, [
            'contain' => ['Orders', 'Users', 'Merchants'],
        ]);

        $this->set('orderPayment', $orderPayment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderPayment = $this->OrderPayments->newEntity();
        if ($this->request->is('post')) {
            $orderPayment = $this->OrderPayments->patchEntity($orderPayment, $this->request->getData());
            if ($this->OrderPayments->save($orderPayment)) {
                $this->Flash->success(__('The order payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order payment could not be saved. Please, try again.'));
        }
        $orders = $this->OrderPayments->Orders->find('list', ['limit' => 200]);
        $users = $this->OrderPayments->Users->find('list', ['limit' => 200]);
        $merchants = $this->OrderPayments->Merchants->find('list', ['limit' => 200]);
        $this->set(compact('orderPayment', 'orders', 'users', 'merchants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Payment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderPayment = $this->OrderPayments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderPayment = $this->OrderPayments->patchEntity($orderPayment, $this->request->getData());
            if ($this->OrderPayments->save($orderPayment)) {
                $this->Flash->success(__('The order payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order payment could not be saved. Please, try again.'));
        }
        $orders = $this->OrderPayments->Orders->find('list', ['limit' => 200]);
        $users = $this->OrderPayments->Users->find('list', ['limit' => 200]);
        $merchants = $this->OrderPayments->Merchants->find('list', ['limit' => 200]);
        $this->set(compact('orderPayment', 'orders', 'users', 'merchants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $orderPayment = $this->OrderPayments->get($id);
        $orderPayment->delete_status = 0;
        if ($this->OrderPayments->save($orderPayment)) {
            $this->Flash->success(__('The order payment has been deleted.'));
        } else {
            $this->Flash->error(__('The order payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
