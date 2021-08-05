<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;

/**
 * ProductBrands Controller
 *
 * @property \App\Model\Table\ProductBrandsTable $ProductBrands
 *
 * @method \App\Model\Entity\ProductBrand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductBrandsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Brands'],
        ];
        $productBrands = $this->paginate($this->ProductBrands);

        $this->set(compact('productBrands'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Brand id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productBrand = $this->ProductBrands->get($id, [
            'contain' => ['Products', 'Brands'],
        ]);

        $this->set('productBrand', $productBrand);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productBrand = $this->ProductBrands->newEntity();
        if ($this->request->is('post')) {
            $productBrand = $this->ProductBrands->patchEntity($productBrand, $this->request->getData());
            if ($this->ProductBrands->save($productBrand)) {
                $this->Flash->success(__('The product brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product brand could not be saved. Please, try again.'));
        }
        $products = $this->ProductBrands->Products->find('list', ['limit' => 200]);
        $brands = $this->ProductBrands->Brands->find('list', ['limit' => 200]);
        $this->set(compact('productBrand', 'products', 'brands'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Brand id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productBrand = $this->ProductBrands->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productBrand = $this->ProductBrands->patchEntity($productBrand, $this->request->getData());
            if ($this->ProductBrands->save($productBrand)) {
                $this->Flash->success(__('The product brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product brand could not be saved. Please, try again.'));
        }
        $products = $this->ProductBrands->Products->find('list', ['limit' => 200]);
        $brands = $this->ProductBrands->Brands->find('list', ['limit' => 200]);
        $this->set(compact('productBrand', 'products', 'brands'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Brand id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productBrand = $this->ProductBrands->get($id);
        if ($this->ProductBrands->delete($productBrand)) {
            $this->Flash->success(__('The product brand has been deleted.'));
        } else {
            $this->Flash->error(__('The product brand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
