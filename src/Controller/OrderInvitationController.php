<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrderInvitation Controller
 *
 * @property \App\Model\Table\OrderInvitationTable $OrderInvitation
 *
 * @method \App\Model\Entity\OrderInvitation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderInvitationController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'Users'],
        ];
        $orderInvitation = $this->paginate($this->OrderInvitation);

        $this->set(compact('orderInvitation'));
    }

    /**
     * View method
     *
     * @param string|null $id Order Invitation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderInvitation = $this->OrderInvitation->get($id, [
            'contain' => ['Orders', 'Users'],
        ]);

        $this->set('orderInvitation', $orderInvitation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderInvitation = $this->OrderInvitation->newEntity();
        if ($this->request->is('post')) {
            $orderInvitation = $this->OrderInvitation->patchEntity($orderInvitation, $this->request->getData());
            if ($this->OrderInvitation->save($orderInvitation)) {
                $this->Flash->success(__('The order invitation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order invitation could not be saved. Please, try again.'));
        }
        $orders = $this->OrderInvitation->Orders->find('list', ['limit' => 200]);
        $users = $this->OrderInvitation->Users->find('list', ['limit' => 200]);
        $this->set(compact('orderInvitation', 'orders', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Invitation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderInvitation = $this->OrderInvitation->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderInvitation = $this->OrderInvitation->patchEntity($orderInvitation, $this->request->getData());
            if ($this->OrderInvitation->save($orderInvitation)) {
                $this->Flash->success(__('The order invitation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order invitation could not be saved. Please, try again.'));
        }
        $orders = $this->OrderInvitation->Orders->find('list', ['limit' => 200]);
        $users = $this->OrderInvitation->Users->find('list', ['limit' => 200]);
        $this->set(compact('orderInvitation', 'orders', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Invitation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderInvitation = $this->OrderInvitation->get($id);
        if ($this->OrderInvitation->delete($orderInvitation)) {
            $this->Flash->success(__('The order invitation has been deleted.'));
        } else {
            $this->Flash->error(__('The order invitation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
