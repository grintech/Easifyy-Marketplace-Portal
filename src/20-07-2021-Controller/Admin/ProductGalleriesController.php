<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ProductGalleries Controller
 *
 * @property \App\Model\Table\ProductGalleriesTable $ProductGalleries
 *
 * @method \App\Model\Entity\ProductGallery[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductGalleriesController extends AppController
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
        $productGalleries = $this->paginate($this->ProductGalleries);

        $this->set(compact('productGalleries'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Gallery id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productGallery = $this->ProductGalleries->get($id, [
            'contain' => ['Products'],
        ]);

        $this->set('productGallery', $productGallery);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productGallery = $this->ProductGalleries->newEntity();
        if ($this->request->is('post')) {
            $productGallery = $this->ProductGalleries->patchEntity($productGallery, $this->request->getData());
            if ($this->ProductGalleries->save($productGallery)) {
                $this->Flash->success(__('The product gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product gallery could not be saved. Please, try again.'));
        }
        $products = $this->ProductGalleries->Products->find('list', ['limit' => 200]);
        $this->set(compact('productGallery', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Gallery id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productGallery = $this->ProductGalleries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productGallery = $this->ProductGalleries->patchEntity($productGallery, $this->request->getData());
            if ($this->ProductGalleries->save($productGallery)) {
                $this->Flash->success(__('The product gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product gallery could not be saved. Please, try again.'));
        }
        $products = $this->ProductGalleries->Products->find('list', ['limit' => 200]);
        $this->set(compact('productGallery', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Gallery id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productGallery = $this->ProductGalleries->get($id);
        if ($this->ProductGalleries->delete($productGallery)) {
            $this->Flash->success(__('The product gallery has been deleted.'));
        } else {
            $this->Flash->error(__('The product gallery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
