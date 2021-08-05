<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * MerchantProductCategories Controller
 *
 * @property \App\Model\Table\MerchantProductCategoriesTable $MerchantProductCategories
 *
 * @method \App\Model\Entity\MerchantProductCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantProductCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MerchantProducts', 'Categories'],
        ];
        $merchantProductCategories = $this->paginate($this->MerchantProductCategories);

        $this->set(compact('merchantProductCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Merchant Product Category id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchantProductCategory = $this->MerchantProductCategories->get($id, [
            'contain' => ['MerchantProducts', 'Categories'],
        ]);

        $this->set('merchantProductCategory', $merchantProductCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchantProductCategory = $this->MerchantProductCategories->newEntity();
        if ($this->request->is('post')) {
            $merchantProductCategory = $this->MerchantProductCategories->patchEntity($merchantProductCategory, $this->request->getData());
            if ($this->MerchantProductCategories->save($merchantProductCategory)) {
                $this->Flash->success(__('The merchant product category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product category could not be saved. Please, try again.'));
        }
        $merchantProducts = $this->MerchantProductCategories->MerchantProducts->find('list', ['limit' => 200]);
        $categories = $this->MerchantProductCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('merchantProductCategory', 'merchantProducts', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchant Product Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchantProductCategory = $this->MerchantProductCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantProductCategory = $this->MerchantProductCategories->patchEntity($merchantProductCategory, $this->request->getData());
            if ($this->MerchantProductCategories->save($merchantProductCategory)) {
                $this->Flash->success(__('The merchant product category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product category could not be saved. Please, try again.'));
        }
        $merchantProducts = $this->MerchantProductCategories->MerchantProducts->find('list', ['limit' => 200]);
        $categories = $this->MerchantProductCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('merchantProductCategory', 'merchantProducts', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchant Product Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchantProductCategory = $this->MerchantProductCategories->get($id);
        if ($this->MerchantProductCategories->delete($merchantProductCategory)) {
            $this->Flash->success(__('The merchant product category has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant product category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
