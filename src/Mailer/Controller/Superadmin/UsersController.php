<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'conditions' => [
                    'Users.delete_status'=>1,
                    'Users.role'=>'user'
                ],
        ];
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Addresses', 'CartItems', 'CouponRedeems', 'Merchants', 'OrderNotifications', 'OrderPayments', 'Orders', 'Reviews', 'RewardPoints', 'Runners', 'Supports', 'UserLogs', 'UserSocialProfiles'],
        ]);

        $this->set('user', $user);
    }

    public function dashboard()
    {
        $id = $user_id = $this->Auth->user('id');
        $user = $this->Users->get($id, [
            'contain' => ['Addresses', 'CartItems', 'CouponRedeems', 'Merchants', 'OrderNotifications', 'OrderPayments', 'Orders', 'Reviews', 'RewardPoints', 'Runners', 'Supports', 'UserLogs', 'UserSocialProfiles'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $mm_dir = new Folder(WWW_ROOT . 'upload_dir', true, 0755);
            $target_path = $mm_dir->pwd() . DS . $this->request->getData('user_profile_image.name');
            
            if(move_uploaded_file($this->request->getData('user_profile_image.tmp_name'), $target_path)) {
                $user->user_profile_image= $this->request->getData('user_profile_image.name');
                //die('here1');
            } else {
                //die('here');
                $user->user_profile_image= '';
            }
            $user->user_profile_image= $this->request->getData('user_profile_image.name');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $data=$user;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            if($this->request->getData('user_profile_image.name')) {
                $mm_dir = new Folder(WWW_ROOT . 'upload_dir', true, 0755);
                $target_path = $mm_dir->pwd() . DS . $this->request->getData('user_profile_image.name');
                move_uploaded_file($this->request->getData('user_profile_image.tmp_name'), $target_path);
                $user->user_profile_image= $this->request->getData('user_profile_image.name');
            } else {
                $user->user_profile_image=$data->user_profile_image;
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
      
        //$this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $user->delete_status = 0;
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleteuserimage($id = null) {
        
        $user = $this->Users->get($id);
        $user->user_profile_image = '';
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been updated.'));
        } else {
            $this->Flash->error(__('The user could not be updated. Please, try again.'));
        }    
        return $this->redirect(['action' => 'edit',$id]);   
    }
}
