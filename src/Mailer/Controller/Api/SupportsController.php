<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Supports Controller
 *
 * @property \App\Model\Table\SupportsTable $Supports
 *
 * @method \App\Model\Entity\Support[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SupportsController extends AppController
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
        $supports = $this->paginate($this->Supports);

        $this->set(compact('supports'));
    }

    /**
     * View method
     *
     * @param string|null $id Support id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $support = $this->Supports->get($id, [
            'contain' => ['Users', 'Orders'],
        ]);

        $this->set('support', $support);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $support = $this->Supports->newEntity();
        if ($this->request->is('post')) {
            $support = $this->Supports->patchEntity($support, $this->request->getData());
            if ($this->Supports->save($support)) {
                $this->Flash->success(__('The support has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The support could not be saved. Please, try again.'));
        }
        $users = $this->Supports->Users->find('list', ['limit' => 200]);
        $orders = $this->Supports->Orders->find('list', ['limit' => 200]);
        $this->set(compact('support', 'users', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Support id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $support = $this->Supports->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $support = $this->Supports->patchEntity($support, $this->request->getData());
            if ($this->Supports->save($support)) {
                $this->Flash->success(__('The support has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The support could not be saved. Please, try again.'));
        }
        $users = $this->Supports->Users->find('list', ['limit' => 200]);
        $orders = $this->Supports->Orders->find('list', ['limit' => 200]);
        $this->set(compact('support', 'users', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Support id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $support = $this->Supports->get($id);
        if ($this->Supports->delete($support)) {
            $this->Flash->success(__('The support has been deleted.'));
        } else {
            $this->Flash->error(__('The support could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
