<?php
namespace App\Controller\Test;

use App\Controller\AppController;

/**
 * MerchantProductGalleries Controller
 *
 * @property \App\Model\Table\MerchantProductGalleriesTable $MerchantProductGalleries
 *
 * @method \App\Model\Entity\MerchantProductGallery[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantProductGalleriesController extends AppController
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
        $merchantProductGalleries = $this->paginate($this->MerchantProductGalleries);

        $this->set(compact('merchantProductGalleries'));
    }

    /**
     * View method
     *
     * @param string|null $id Merchant Product Gallery id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchantProductGallery = $this->MerchantProductGalleries->get($id, [
            'contain' => ['MerchantProducts'],
        ]);

        $this->set('merchantProductGallery', $merchantProductGallery);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchantProductGallery = $this->MerchantProductGalleries->newEntity();
        if ($this->request->is('post')) {
            $merchantProductGallery = $this->MerchantProductGalleries->patchEntity($merchantProductGallery, $this->request->getData());
            if ($this->MerchantProductGalleries->save($merchantProductGallery)) {
                $this->Flash->success(__('The merchant product gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product gallery could not be saved. Please, try again.'));
        }
        $merchantProducts = $this->MerchantProductGalleries->MerchantProducts->find('list', ['limit' => 200]);
        $this->set(compact('merchantProductGallery', 'merchantProducts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchant Product Gallery id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchantProductGallery = $this->MerchantProductGalleries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantProductGallery = $this->MerchantProductGalleries->patchEntity($merchantProductGallery, $this->request->getData());
            if ($this->MerchantProductGalleries->save($merchantProductGallery)) {
                $this->Flash->success(__('The merchant product gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant product gallery could not be saved. Please, try again.'));
        }
        $merchantProducts = $this->MerchantProductGalleries->MerchantProducts->find('list', ['limit' => 200]);
        $this->set(compact('merchantProductGallery', 'merchantProducts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchant Product Gallery id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchantProductGallery = $this->MerchantProductGalleries->get($id);
        if ($this->MerchantProductGalleries->delete($merchantProductGallery)) {
            $this->Flash->success(__('The merchant product gallery has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant product gallery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
