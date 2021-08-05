<?php
namespace App\Controller\Test;

use App\Controller\AppController;

/**
 * OrderNotifications Controller
 *
 * @property \App\Model\Table\OrderNotificationsTable $OrderNotifications
 *
 * @method \App\Model\Entity\OrderNotification[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderNotificationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Orders'],
        ];
        $orderNotifications = $this->paginate($this->OrderNotifications);

        $this->set(compact('orderNotifications'));
    }

    /**
     * View method
     *
     * @param string|null $id Order Notification id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderNotification = $this->OrderNotifications->get($id, [
            'contain' => ['Users', 'Orders'],
        ]);

        $this->set('orderNotification', $orderNotification);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderNotification = $this->OrderNotifications->newEntity();
        if ($this->request->is('post')) {
            $orderNotification = $this->OrderNotifications->patchEntity($orderNotification, $this->request->getData());
            if ($this->OrderNotifications->save($orderNotification)) {
                $this->Flash->success(__('The order notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order notification could not be saved. Please, try again.'));
        }
        $users = $this->OrderNotifications->Users->find('list', ['limit' => 200]);
        $orders = $this->OrderNotifications->Orders->find('list', ['limit' => 200]);
        $this->set(compact('orderNotification', 'users', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Notification id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderNotification = $this->OrderNotifications->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderNotification = $this->OrderNotifications->patchEntity($orderNotification, $this->request->getData());
            if ($this->OrderNotifications->save($orderNotification)) {
                $this->Flash->success(__('The order notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order notification could not be saved. Please, try again.'));
        }
        $users = $this->OrderNotifications->Users->find('list', ['limit' => 200]);
        $orders = $this->OrderNotifications->Orders->find('list', ['limit' => 200]);
        $this->set(compact('orderNotification', 'users', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Notification id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderNotification = $this->OrderNotifications->get($id);
        if ($this->OrderNotifications->delete($orderNotification)) {
            $this->Flash->success(__('The order notification has been deleted.'));
        } else {
            $this->Flash->error(__('The order notification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
