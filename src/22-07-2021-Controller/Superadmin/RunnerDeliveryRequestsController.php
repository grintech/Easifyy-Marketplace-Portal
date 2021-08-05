<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;

/**
 * RunnerDeliveryRequests Controller
 *
 * @property \App\Model\Table\RunnerDeliveryRequestsTable $RunnerDeliveryRequests
 *
 * @method \App\Model\Entity\RunnerDeliveryRequest[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RunnerDeliveryRequestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Runners', 'Orders'],
        ];
        $runnerDeliveryRequests = $this->paginate($this->RunnerDeliveryRequests);

        $this->set(compact('runnerDeliveryRequests'));
    }

    /**
     * View method
     *
     * @param string|null $id Runner Delivery Request id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $runnerDeliveryRequest = $this->RunnerDeliveryRequests->get($id, [
            'contain' => ['Runners', 'Orders'],
        ]);

        $this->set('runnerDeliveryRequest', $runnerDeliveryRequest);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $runnerDeliveryRequest = $this->RunnerDeliveryRequests->newEntity();
        if ($this->request->is('post')) {
            $runnerDeliveryRequest = $this->RunnerDeliveryRequests->patchEntity($runnerDeliveryRequest, $this->request->getData());
            if ($this->RunnerDeliveryRequests->save($runnerDeliveryRequest)) {
                $this->Flash->success(__('The runner delivery request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The runner delivery request could not be saved. Please, try again.'));
        }
        $runners = $this->RunnerDeliveryRequests->Runners->find('list', ['limit' => 200]);
        $orders = $this->RunnerDeliveryRequests->Orders->find('list', ['limit' => 200]);
        $this->set(compact('runnerDeliveryRequest', 'runners', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Runner Delivery Request id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $runnerDeliveryRequest = $this->RunnerDeliveryRequests->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $runnerDeliveryRequest = $this->RunnerDeliveryRequests->patchEntity($runnerDeliveryRequest, $this->request->getData());
            if ($this->RunnerDeliveryRequests->save($runnerDeliveryRequest)) {
                $this->Flash->success(__('The runner delivery request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The runner delivery request could not be saved. Please, try again.'));
        }
        $runners = $this->RunnerDeliveryRequests->Runners->find('list', ['limit' => 200]);
        $orders = $this->RunnerDeliveryRequests->Orders->find('list', ['limit' => 200]);
        $this->set(compact('runnerDeliveryRequest', 'runners', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Runner Delivery Request id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $runnerDeliveryRequest = $this->RunnerDeliveryRequests->get($id);
        if ($this->RunnerDeliveryRequests->delete($runnerDeliveryRequest)) {
            $this->Flash->success(__('The runner delivery request has been deleted.'));
        } else {
            $this->Flash->error(__('The runner delivery request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
