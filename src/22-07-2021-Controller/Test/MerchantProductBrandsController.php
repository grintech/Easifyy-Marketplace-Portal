<?php
namespace App\Controller\Test;

use App\Controller\AppController;

/**
 * MerchantProductBrands Controller
 *
 * @property \App\Model\Table\MerchantProductBrandsTable $MerchantProductBrands
 *
 * @method \App\Model\Entity\MerchantProductBrand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantProductBrandsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MerchantProducts', 'Brands'],
        ];
        $merchantProductBrands = $this->paginate($this->MerchantProductBrands);

        $this->set(compact('merchantProductBrands'));
    }

    /**
     * View method
     *
     * @param string|null $id Merchant Product Brand id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchantProductBrand = $this->MerchantProductBrands->get($id, [
            'contain' => ['MerchantProducts', 'Brands'],
        ]);

        $this->set('merchantProductBrand', $merchantProductBrand);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchantProductBrand = $this->MerchantProductBrands->newEntity();
        if ($this->request->is('post')) {
            $merchantProductBrand = $this->MerchantProductBrands->patchEntity($merchantProductBrand, $this->request->getData());
            if ($this->MerchantProductBrands->save($merchantProductBrand)) {
                $this->Flash->success(__('The merchant product brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product brand could not be saved. Please, try again.'));
        }
        $merchantProducts = $this->MerchantProductBrands->MerchantProducts->find('list', ['limit' => 200]);
        $brands = $this->MerchantProductBrands->Brands->find('list', ['limit' => 200]);
        $this->set(compact('merchantProductBrand', 'merchantProducts', 'brands'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchant Product Brand id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchantProductBrand = $this->MerchantProductBrands->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantProductBrand = $this->MerchantProductBrands->patchEntity($merchantProductBrand, $this->request->getData());
            if ($this->MerchantProductBrands->save($merchantProductBrand)) {
                $this->Flash->success(__('The merchant product brand has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product brand could not be saved. Please, try again.'));
        }
        $merchantProducts = $this->MerchantProductBrands->MerchantProducts->find('list', ['limit' => 200]);
        $brands = $this->MerchantProductBrands->Brands->find('list', ['limit' => 200]);
        $this->set(compact('merchantProductBrand', 'merchantProducts', 'brands'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchant Product Brand id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchantProductBrand = $this->MerchantProductBrands->get($id);
        if ($this->MerchantProductBrands->delete($merchantProductBrand)) {
            $this->Flash->success(__('The merchant product brand has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant product brand could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
