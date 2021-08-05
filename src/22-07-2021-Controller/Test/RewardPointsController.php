<?php
namespace App\Controller\Test;

use App\Controller\AppController;

/**
 * RewardPoints Controller
 *
 * @property \App\Model\Table\RewardPointsTable $RewardPoints
 *
 * @method \App\Model\Entity\RewardPoint[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RewardPointsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $rewardPoints = $this->paginate($this->RewardPoints);

        $this->set(compact('rewardPoints'));
    }

    /**
     * View method
     *
     * @param string|null $id Reward Point id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rewardPoint = $this->RewardPoints->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('rewardPoint', $rewardPoint);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rewardPoint = $this->RewardPoints->newEntity();
        if ($this->request->is('post')) {
            $rewardPoint = $this->RewardPoints->patchEntity($rewardPoint, $this->request->getData());
            if ($this->RewardPoints->save($rewardPoint)) {
                $this->Flash->success(__('The reward point has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reward point could not be saved. Please, try again.'));
        }
        $users = $this->RewardPoints->Users->find('list', ['limit' => 200]);
        $this->set(compact('rewardPoint', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reward Point id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rewardPoint = $this->RewardPoints->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rewardPoint = $this->RewardPoints->patchEntity($rewardPoint, $this->request->getData());
            if ($this->RewardPoints->save($rewardPoint)) {
                $this->Flash->success(__('The reward point has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reward point could not be saved. Please, try again.'));
        }
        $users = $this->RewardPoints->Users->find('list', ['limit' => 200]);
        $this->set(compact('rewardPoint', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reward Point id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rewardPoint = $this->RewardPoints->get($id);
        if ($this->RewardPoints->delete($rewardPoint)) {
            $this->Flash->success(__('The reward point has been deleted.'));
        } else {
            $this->Flash->error(__('The reward point could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
