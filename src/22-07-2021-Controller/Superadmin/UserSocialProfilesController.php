<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;

/**
 * UserSocialProfiles Controller
 *
 * @property \App\Model\Table\UserSocialProfilesTable $UserSocialProfiles
 *
 * @method \App\Model\Entity\UserSocialProfile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserSocialProfilesController extends AppController
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
        $userSocialProfiles = $this->paginate($this->UserSocialProfiles);

        $this->set(compact('userSocialProfiles'));
    }

    /**
     * View method
     *
     * @param string|null $id User Social Profile id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userSocialProfile = $this->UserSocialProfiles->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('userSocialProfile', $userSocialProfile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userSocialProfile = $this->UserSocialProfiles->newEntity();
        if ($this->request->is('post')) {
            $userSocialProfile = $this->UserSocialProfiles->patchEntity($userSocialProfile, $this->request->getData());
            if ($this->UserSocialProfiles->save($userSocialProfile)) {
                $this->Flash->success(__('The user social profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user social profile could not be saved. Please, try again.'));
        }
        $users = $this->UserSocialProfiles->Users->find('list', ['limit' => 200]);
        $this->set(compact('userSocialProfile', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Social Profile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userSocialProfile = $this->UserSocialProfiles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userSocialProfile = $this->UserSocialProfiles->patchEntity($userSocialProfile, $this->request->getData());
            if ($this->UserSocialProfiles->save($userSocialProfile)) {
                $this->Flash->success(__('The user social profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user social profile could not be saved. Please, try again.'));
        }
        $users = $this->UserSocialProfiles->Users->find('list', ['limit' => 200]);
        $this->set(compact('userSocialProfile', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Social Profile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userSocialProfile = $this->UserSocialProfiles->get($id);
        if ($this->UserSocialProfiles->delete($userSocialProfile)) {
            $this->Flash->success(__('The user social profile has been deleted.'));
        } else {
            $this->Flash->error(__('The user social profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
