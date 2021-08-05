<?php
namespace App\Controller\Test;

use App\Controller\AppController;

/**
 * MerchantProductBundledItems Controller
 *
 * @property \App\Model\Table\MerchantProductBundledItemsTable $MerchantProductBundledItems
 *
 * @method \App\Model\Entity\MerchantProductBundledItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantProductBundledItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MerchantProducts'],
        ];
        $merchantProductBundledItems = $this->paginate($this->MerchantProductBundledItems);

        $this->set(compact('merchantProductBundledItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Merchant Product Bundled Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchantProductBundledItem = $this->MerchantProductBundledItems->get($id, [
            'contain' => ['MerchantProducts'],
        ]);

        $this->set('merchantProductBundledItem', $merchantProductBundledItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchantProductBundledItem = $this->MerchantProductBundledItems->newEntity();
        if ($this->request->is('post')) {
            $merchantProductBundledItem = $this->MerchantProductBundledItems->patchEntity($merchantProductBundledItem, $this->request->getData());
            if ($this->MerchantProductBundledItems->save($merchantProductBundledItem)) {
                $this->Flash->success(__('The merchant product bundled item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product bundled item could not be saved. Please, try again.'));
        }
        $merchantProducts = $this->MerchantProductBundledItems->MerchantProducts->find('list', ['limit' => 200]);
        $this->set(compact('merchantProductBundledItem', 'merchantProducts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchant Product Bundled Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchantProductBundledItem = $this->MerchantProductBundledItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantProductBundledItem = $this->MerchantProductBundledItems->patchEntity($merchantProductBundledItem, $this->request->getData());
            if ($this->MerchantProductBundledItems->save($merchantProductBundledItem)) {
                $this->Flash->success(__('The merchant product bundled item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product bundled item could not be saved. Please, try again.'));
        }
        $merchantProducts = $this->MerchantProductBundledItems->MerchantProducts->find('list', ['limit' => 200]);
        $this->set(compact('merchantProductBundledItem', 'merchantProducts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchant Product Bundled Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchantProductBundledItem = $this->MerchantProductBundledItems->get($id);
        if ($this->MerchantProductBundledItems->delete($merchantProductBundledItem)) {
            $this->Flash->success(__('The merchant product bundled item has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant product bundled item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
