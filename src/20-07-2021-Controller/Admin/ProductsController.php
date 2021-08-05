<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ProductTypes', 'ParentProducts'],
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }


    public function selectProduct() {
        $product_categories = '';
        $this->loadModel('Categories');
        $this->loadModel('ProductCategories');
       
            $product_categories = $this->ProductCategories->find()
            ->select([
                'Categories.id',
                'Categories.name',
                'Categories.image',
                'count' => $this->ProductCategories->find()->func()->count('Categories.id')
            ])
            ->contain('Categories') ->group(['Categories.id'])
            ->all();
       
        $this->set(compact('product_categories'));
    }


    public function selectProductByCategory($id=null) {
        $products_list ='';
        $this->loadModel('Categories');
        $this->loadModel('ProductCategories');
         if($id) {
            $products_list = $this->ProductCategories->find('all', 
                ['conditions' =>['category_id' =>$id]])
            ->contain(['Products','Products.ProductGalleries']);
         } 
           
        $this->set(compact('products_list'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $product = $this->Products->get($id, [
            'contain' => ['ProductTypes', 'ParentProducts', 'CartItems', 'MerchantProducts', 'OrderItems', 'ProductBrands', 'ProductCategories', 'ProductGalleries', 'ChildProducts'],
        ]);
        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
        $parentProducts = $this->Products->ParentProducts->find('list', ['limit' => 200]);
        $this->set(compact('product', 'productTypes', 'parentProducts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
        $parentProducts = $this->Products->ParentProducts->find('list', ['limit' => 200]);
        $this->set(compact('product', 'productTypes', 'parentProducts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
