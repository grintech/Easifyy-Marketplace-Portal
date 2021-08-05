<?php
namespace App\Controller\Test;

use App\Controller\AppController;

/**
 * ProductBundledItems Controller
 *
 * @property \App\Model\Table\ProductBundledItemsTable $ProductBundledItems
 *
 * @method \App\Model\Entity\ProductBundledItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductBundledItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products'],
        ];
        $productBundledItems = $this->paginate($this->ProductBundledItems);

        $this->set(compact('productBundledItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Bundled Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productBundledItem = $this->ProductBundledItems->get($id, [
            'contain' => ['Products'],
        ]);

        $this->set('productBundledItem', $productBundledItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productBundledItem = $this->ProductBundledItems->newEntity();
        if ($this->request->is('post')) {
            $productBundledItem = $this->ProductBundledItems->patchEntity($productBundledItem, $this->request->getData());
            if ($this->ProductBundledItems->save($productBundledItem)) {
                $this->Flash->success(__('The product bundled item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product bundled item could not be saved. Please, try again.'));
        }
        $products = $this->ProductBundledItems->Products->find('list', ['limit' => 200]);
        $this->set(compact('productBundledItem', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Bundled Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productBundledItem = $this->ProductBundledItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productBundledItem = $this->ProductBundledItems->patchEntity($productBundledItem, $this->request->getData());
            if ($this->ProductBundledItems->save($productBundledItem)) {
                $this->Flash->success(__('The product bundled item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product bundled item could not be saved. Please, try again.'));
        }
        $products = $this->ProductBundledItems->Products->find('list', ['limit' => 200]);
        $this->set(compact('productBundledItem', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Bundled Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productBundledItem = $this->ProductBundledItems->get($id);
        if ($this->ProductBundledItems->delete($productBundledItem)) {
            $this->Flash->success(__('The product bundled item has been deleted.'));
        } else {
            $this->Flash->error(__('The product bundled item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
