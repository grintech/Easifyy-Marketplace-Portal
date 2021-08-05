<?php
namespace App\Controller\Superadmin;

use App\Controller\AppController;

/**
 * MerchantGalleries Controller
 *
 * @property \App\Model\Table\MerchantGalleriesTable $MerchantGalleries
 *
 * @method \App\Model\Entity\MerchantGallery[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MerchantGalleriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Merchants'],
        ];
        $merchantGalleries = $this->paginate($this->MerchantGalleries);

        $this->set(compact('merchantGalleries'));
    }

    /**
     * View method
     *
     * @param string|null $id Merchant Gallery id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $merchantGallery = $this->MerchantGalleries->get($id, [
            'contain' => ['Merchants'],
        ]);

        $this->set('merchantGallery', $merchantGallery);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $merchantGallery = $this->MerchantGalleries->newEntity();
        if ($this->request->is('post')) {
            $merchantGallery = $this->MerchantGalleries->patchEntity($merchantGallery, $this->request->getData());
            if ($this->MerchantGalleries->save($merchantGallery)) {
                $this->Flash->success(__('The merchant gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant gallery could not be saved. Please, try again.'));
        }
        $merchants = $this->MerchantGalleries->Merchants->find('list', ['limit' => 200]);
        $this->set(compact('merchantGallery', 'merchants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Merchant Gallery id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $merchantGallery = $this->MerchantGalleries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merchantGallery = $this->MerchantGalleries->patchEntity($merchantGallery, $this->request->getData());
            if ($this->MerchantGalleries->save($merchantGallery)) {
                $this->Flash->success(__('The merchant gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merchant gallery could not be saved. Please, try again.'));
        }
        $merchants = $this->MerchantGalleries->Merchants->find('list', ['limit' => 200]);
        $this->set(compact('merchantGallery', 'merchants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merchant Gallery id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $merchantGallery = $this->MerchantGalleries->get($id);
        if ($this->MerchantGalleries->delete($merchantGallery)) {
            $this->Flash->success(__('The merchant gallery has been deleted.'));
        } else {
            $this->Flash->error(__('The merchant gallery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
