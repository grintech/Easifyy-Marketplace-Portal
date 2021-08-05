<?php
namespace App\Controller\Test;

use App\Controller\AppController;

/**
 * MerchantProducts Controller
 *
 * @property \App\Model\Table\MerchantProductsTable $MerchantProducts
 *
 * @method \App\Model\Entity\MerchantProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Merchants', 'Products', 'ProductTypes', 'ParentMerchantProducts', 'ProductUnits'],
        ];
        $merchantProducts = $this->paginate($this->MerchantProducts);

        $this->set(compact('merchantProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Merchant Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchantProduct = $this->MerchantProducts->get($id, [
            'contain' => ['Merchants', 'Products', 'ProductTypes', 'ParentMerchantProducts', 'ProductUnits', 'CartItems', 'MerchantProductBrands', 'MerchantProductBundledItems', 'MerchantProductCategories', 'MerchantProductGalleries', 'ChildMerchantProducts', 'OrderItems', 'PurchaseItems', 'Wishlists'],
        ]);

        $this->set('merchantProduct', $merchantProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchantProduct = $this->MerchantProducts->newEntity();
        if ($this->request->is('post')) {
            $merchantProduct = $this->MerchantProducts->patchEntity($merchantProduct, $this->request->getData());
            if ($this->MerchantProducts->save($merchantProduct)) {
                $this->Flash->success(__('The merchant product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product could not be saved. Please, try again.'));
        }
        $merchants = $this->MerchantProducts->Merchants->find('list', ['limit' => 200]);
        $products = $this->MerchantProducts->Products->find('list', ['limit' => 200]);
        $productTypes = $this->MerchantProducts->ProductTypes->find('list', ['limit' => 200]);
        $parentMerchantProducts = $this->MerchantProducts->ParentMerchantProducts->find('list', ['limit' => 200]);
        $productUnits = $this->MerchantProducts->ProductUnits->find('list', ['limit' => 200]);
        $this->set(compact('merchantProduct', 'merchants', 'products', 'productTypes', 'parentMerchantProducts', 'productUnits'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchant Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchantProduct = $this->MerchantProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantProduct = $this->MerchantProducts->patchEntity($merchantProduct, $this->request->getData());
            if ($this->MerchantProducts->save($merchantProduct)) {
                $this->Flash->success(__('The merchant product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product could not be saved. Please, try again.'));
        }
        $merchants = $this->MerchantProducts->Merchants->find('list', ['limit' => 200]);
        $products = $this->MerchantProducts->Products->find('list', ['limit' => 200]);
        $productTypes = $this->MerchantProducts->ProductTypes->find('list', ['limit' => 200]);
        $parentMerchantProducts = $this->MerchantProducts->ParentMerchantProducts->find('list', ['limit' => 200]);
        $productUnits = $this->MerchantProducts->ProductUnits->find('list', ['limit' => 200]);
        $this->set(compact('merchantProduct', 'merchants', 'products', 'productTypes', 'parentMerchantProducts', 'productUnits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchant Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchantProduct = $this->MerchantProducts->get($id);
        if ($this->MerchantProducts->delete($merchantProduct)) {
            $this->Flash->success(__('The merchant product has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
