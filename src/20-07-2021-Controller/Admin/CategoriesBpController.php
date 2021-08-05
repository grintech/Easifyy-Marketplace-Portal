<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * CategoriesBp Controller
 *
 * @property \App\Model\Table\CategoriesBpTable $CategoriesBp
 *
 * @method \App\Model\Entity\CategoriesBp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesBpController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentCategoriesBp'],
        ];
        $categoriesBp = $this->paginate($this->CategoriesBp);

        $this->set(compact('categoriesBp'));
    }

    /**
     * View method
     *
     * @param string|null $id Categories Bp id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoriesBp = $this->CategoriesBp->get($id, [
            'contain' => ['ParentCategoriesBp', 'ChildCategoriesBp'],
        ]);

        $this->set('categoriesBp', $categoriesBp);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoriesBp = $this->CategoriesBp->newEntity();
        if ($this->request->is('post')) {
            $categoriesBp = $this->CategoriesBp->patchEntity($categoriesBp, $this->request->getData());
            if ($this->CategoriesBp->save($categoriesBp)) {
                $this->Flash->success(__('The categories bp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categories bp could not be saved. Please, try again.'));
        }
        $parentCategoriesBp = $this->CategoriesBp->ParentCategoriesBp->find('list', ['limit' => 200]);
        $this->set(compact('categoriesBp', 'parentCategoriesBp'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Categories Bp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoriesBp = $this->CategoriesBp->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoriesBp = $this->CategoriesBp->patchEntity($categoriesBp, $this->request->getData());
            if ($this->CategoriesBp->save($categoriesBp)) {
                $this->Flash->success(__('The categories bp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categories bp could not be saved. Please, try again.'));
        }
        $parentCategoriesBp = $this->CategoriesBp->ParentCategoriesBp->find('list', ['limit' => 200]);
        $this->set(compact('categoriesBp', 'parentCategoriesBp'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Categories Bp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoriesBp = $this->CategoriesBp->get($id);
        if ($this->CategoriesBp->delete($categoriesBp)) {
            $this->Flash->success(__('The categories bp has been deleted.'));
        } else {
            $this->Flash->error(__('The categories bp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
