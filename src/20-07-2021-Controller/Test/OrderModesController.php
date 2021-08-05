<?php
namespace App\Controller\Test;

use App\Controller\AppController;

/**
 * OrderModes Controller
 *
 * @property \App\Model\Table\OrderModesTable $OrderModes
 *
 * @method \App\Model\Entity\OrderMode[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderModesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $orderModes = $this->paginate($this->OrderModes);

        $this->set(compact('orderModes'));
    }

    /**
     * View method
     *
     * @param string|null $id Order Mode id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderMode = $this->OrderModes->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set('orderMode', $orderMode);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderMode = $this->OrderModes->newEntity();
        if ($this->request->is('post')) {
            $orderMode = $this->OrderModes->patchEntity($orderMode, $this->request->getData());
            if ($this->OrderModes->save($orderMode)) {
                $this->Flash->success(__('The order mode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order mode could not be saved. Please, try again.'));
        }
        $this->set(compact('orderMode'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Mode id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderMode = $this->OrderModes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderMode = $this->OrderModes->patchEntity($orderMode, $this->request->getData());
            if ($this->OrderModes->save($orderMode)) {
                $this->Flash->success(__('The order mode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order mode could not be saved. Please, try again.'));
        }
        $this->set(compact('orderMode'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Mode id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderMode = $this->OrderModes->get($id);
        if ($this->OrderModes->delete($orderMode)) {
            $this->Flash->success(__('The order mode has been deleted.'));
        } else {
            $this->Flash->error(__('The order mode could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
